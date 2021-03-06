<?php


namespace App\Service\interfaces;

use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

interface ProductServiceInterface
{
    function getAllProduct();
    function getProductById(int $id);
    function SetProduct(Request $request);
    function DeleteProduct(Request $request);
    function ModifyProduct(Request $request);
    
}