<?php


namespace App\Service;

use App\Entity\Media;
use Doctrine\ORM\EntityManagerInterface;
use App\Service\interfaces\MediaServiceInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\PropertyAccess\PropertyAccess;

class MediaService implements MediaServiceInterface
{
    private $entityManager;
    private $propertyAccessor;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
        $this->propertyAccessor = PropertyAccess::createPropertyAccessor();
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
    function getAllMedia() {
        $media = $this->entityManager->getRepository(Media::class)->findAll();
        return $media;
    }



    /**
     * @param int $id
     * @return object|null
     */
    function getMediaById(int $id)
    {
        return $this->entityManager->getRepository(Media::class)->find($id);
    }

    /**
     * @param Request $request
     */
    public function SetMedia(Request $request){

        $media = $this->entityManager->getRepository(Media::class)->findOneBy(['lien' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]')]);
        if($media){
            return 'this file already exist';
        }
        $media = new Media();
        $media->setTitre($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')));
        $media->setDescription($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[description]')));
        $media->setLien($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]')));
        $media->setType($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[type]')));
        
        //Prepar and inject media into database
        $this->entityManager->persist($media);
        $this->entityManager->flush();

        return 'Media added successfully ';
    }


    /**
     * @param Request $request
     */
    public function ModifyMedia(Request $request){

        $media = $this->entityManager->getRepository(Media::class)->findOneBy(['id' => $this->propertyAccessor->getValue($this->ConvertToArray($request), '[id]')]);
        if($media){

            $media->setTitre($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[titre]')));
            $media->setDescription($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[Description]')));
            $media->setLien($this->entityManager->getRepository(Media::class)->find($this->propertyAccessor->getValue($this->ConvertToArray($request), '[lien]')));
        
            $this->entityManager->flush();

            return 'Media Modifed successfully ';
        }

        return 'Media was not found ';
    }

    
    /**
     * @param Request $request
     */
    public function DeleteMedia(Request $request){

        $mediaID = $this->propertyAccessor->getValue($this->ConvertToArray($request),'[id]');
        $media = $this->entityManager->getRepository(Media::class)->find($companyID);
        if($media){
            $this->entityManager->remove($media);
            $this->entityManager->flush();
            return 'media has been Deleted' ;
        }
            return 'media dosn\'t exist';

    }
    
}