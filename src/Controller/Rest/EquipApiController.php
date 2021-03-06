<?php

namespace App\Controller\Rest;

use App\Entity\Equip;
use App\Repository\EquipRepository;
use App\Service\interfaces\EquipServiceInterface;
use FOS\RestBundle\Controller\AbstractFOSRestController;
use FOS\RestBundle\View\View;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use FOS\RestBundle\Controller\Annotations as Rest;


class EquipApiController  extends AbstractFOSRestController
{
    private $EquipService;

    public function __construct(EquipServiceInterface $EquipService)
    {
        $this->EquipService = $EquipService;
    }

    /**
     * Retrieves All Equips.
     *
     * This call post modes data.
     *
     * @Rest\Get("/equips", name="get_all_equips")
     * @return View
     */
    public function findAllEquips(): View
    {
        $equip = $this->EquipService->getAllEquip();
        return View::create($equip, Response::HTTP_OK);

    }

    /**
     * Retrieves an equip resource
     * @Rest\Get("/equip/{id}")
     * @param int $id
     * @return View
     */
    public function findEquipById(int $id): View
    {
        $equip = $this->EquipService->getEquipById($id);
        if ($equip) {
            return View::create($equip, Response::HTTP_OK);
        }
        return View::create(null, Response::HTTP_NOT_FOUND);
    }

    /**
     * Add Equip.
     *
     * This call post modes data.
     *
     * @Rest\Post("/equip", name="add_equip")
     * @param Request $request
     * @return View
     */
    public function AddEquip(Request $request): View
    {
        $equip = $this->EquipService->setEquip($request);
        return View::create($equip, Response::HTTP_OK);

    }

    /**
     * Delete equip 
     * @Rest\Delete("/equip")
     * @param Request $request
     * @return View
     */
    public function DeleteEquip(Request $request): View
    {
        $equip = $this->EquipService->DeleteEquip($request);
        return View::create($equip, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Get("/equip/{id}/members")
     * @return View
     */
    public function showMembers(int $id): View
    {
        $members = $this->EquipService->ShowMembers($id);
        return View::create($members, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Post("/equip/{id}/addMembers")
     * @return View
     */
    public function addMembers(Request $request, int $id): View
    {
        $members = $this->EquipService->AddMembers($request , $id);
        return View::create($members, Response::HTTP_OK);
    }

    /**
     * Retrieves an equip resource
     * @Rest\Post("/equip/{id}/removeMembers")
     * @return View
     */
    public function removeMembers(Request $request, int $id): View
    {
        $members = $this->EquipService->RemoveMembers($request , $id);
        return View::create($members, Response::HTTP_OK);
    }


}