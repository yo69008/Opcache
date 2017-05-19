<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Session\Session;

abstract class AbstractAppController extends Controller
{
    protected $session;
    /**
     * 
     * construct
     * 
     */
    public function __construct()
    {
        $this->session = new Session();
    }
    
    
}