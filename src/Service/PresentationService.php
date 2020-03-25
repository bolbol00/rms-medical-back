<?php


namespace App\Service;

use App\Entity\Presentation;
use App\Entity\Users; 
use App\Entity\Media;
use App\Entity\Referance;
use App\Entity\Project;
use App\Entity\Log;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\PresentationServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;
use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ArrayDenormalizer;
use Symfony\Component\Serializer\Normalizer\GetSetMethodNormalizer;



class PresentationService implements PresentationServiceInterface
{
    private $entityManager;
    private $propertyAccessor;
    private $serializer;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();

        $this->serializer = new Serializer(
            [new GetSetMethodNormalizer(), new ArrayDenormalizer()],
            [new JsonEncoder()]
        );
    }

    
    /**
     * @param Request $request
     * @return object[]
     */
    public function ConvertToArray(Request $request){

        // Getting Parameters from Json Request
        $parameters = [];
        if ($content = $request->getContent()) {
            $parameters = json_decode($content, true);
        }
        return $parameters;

    }

    /**
     * @return object[]
     */
    function getAllPresentation() {
        
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.territories , u.nom as presentationCreator , pro.titre as project ')
            ->from('App:Presentation', 'p')
            ->join('p.presentationCreator' , 'u')
            ->join('p.project' , 'pro')
            ->getQuery()->getResult();
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getPresentationById(int $id)
    {
        return $this->entityManager->createQueryBuilder()
            ->select('p.id , p.titre , p.territories , u.nom as presentationCreator , pro.titre as project ')
            ->from('App:Presentation', 'p')
            ->join('p.presentationCreator' , 'u')
            ->join('p.project' , 'pro')
            ->where('p.id = :id')
            ->setparameter('id' , $id)
            ->getQuery()->getResult();

        return $this->entityManager->getRepository(Presentation::class)->find($id);
    }

    /**
     * @param Request $request
     */
    public function SetPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($presentation){
            return 'this presentation already exist';
        }
        $presentation = new Presentation();
        $presentation->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
        $presentation->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));
        $presentation->setPresentationCreator($this->entityManager->getRepository(Users::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[presentation_creator]')));

        $projects[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]');
        foreach($projects[0] as $project){
            $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
        }

        
        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]')){
            $referances = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]');
            foreach ($referances[0] as $referance){
                $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
            }
        }
        if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]')){
            $medias[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]');
            foreach ( $medias[0] as $media){
                $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
            }
        }
        //Prepar and inject Presentation into database
        $this->entityManager->persist($presentation);
        $this->entityManager->flush();
        
        //add to Log 
        $log = new Log();
        $log->setDate(new \DateTime('now'));
        $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
        $log->setAction("Add Presentation");
        $log->setModule("Presentation");
        $log->setUrl('/presentation');
        $this->entityManager->persist($log);
        $this->entityManager->flush();

        return 'Presentation added successfully ';
    }


    /**
     * @param Request $request
     */
    public function ModifyPresentation(Request $request){

        $presentation = $this->entityManager->getRepository(Presentation::class)->findOneBy(['titre' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')]);
        if($presentation){

            $presentation->setTitre($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]'));
            $presentation->setTerritories($this->propertyAccessor->getValue($this->ConvertToArray($request), '[territories]'));

            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]')){

                //remove all old related Project
                $projects[] = $presentation->getProject();
                foreach($projects as $project){
                    $presentation->removeProject($project);
                }

                //adding new project
                $projects[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[project]');
                foreach($project[0] as $project){
                    $presentation->addProject($this->entityManager->getRepository(Project::class)->find($project));
                }
            }


            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]')){
                //remove all Old referances
                $referances[] = $this->getReferance();
                foreach($referance as $referance){
                    $this->removeReferance($referance);
                }
                //adding new referances
                $referances[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[referance]');
                foreach($referances[0] as $referance){
                    $presentation->addReferance($this->entityManager->getRepository(Referance::class)->find($referance));
                }

            }

            if($this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]')){
                //remove all old Media
                $medias[] = $this->getMedia();
                foreach($medias as $media){
                    $this->removeMedia($media);
                }
                //adding new media
                $medias[] = $this->propertyAccessor->getValue($this->ConvertToArray($request), '[media]');
                foreach($medias[0] as $media){
                    $presentation->addMedia($this->entityManager->getRepository(Media::class)->find($media));
                }

            }

            $this->entityManager->flush();
            
            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Modify Presentation");
            $log->setModule("Presentation");
            $log->setUrl('/presentation');
            $this->entityManager->persist($log);
            $this->entityManager->flush();
            return ' presentation '.$presentation->getTitre().' Modifed successfully ';
        }

        return 'presentation was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeletePresentation(Request $request){

        $presentationID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $presentation = $this->entityManager->getRepository(presentation::class)->find($presentationID);
        if($presentation){
            $this->entityManager->remove($presentation);
            $this->entityManager->flush();

            //add to Log 
            $log = new Log();
            $log->setDate(new \DateTime('now'));
            $log->setUser($this->entityManager->getRepository(Users::class)->find("10"));// after will get user id from session
            $log->setAction("Delete Presentation");
            $log->setModule("Presentation");
            $log->setUrl('/presentation');
            $this->entityManager->persist($log);
            $this->entityManager->flush();

            return 'presentation has been Deleted' ;
        }
            return 'presentation dosn\'t exist';
    }
    
}