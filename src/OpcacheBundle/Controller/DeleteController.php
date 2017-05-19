<?php

namespace OpcacheBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use OpcacheBundle\Controller\OpcacheController;

class DeleteController extends OpCacheController
{
    
    /**
     * @Route("/opcache/delete", name="opcache_delete")
     */
    public function deleteAction()
    {
        if (function_exists("opcache_reset")) {
            opcache_reset();
        }
        return $this->redirectToRoute("opcache");
    }
    
    
    
}