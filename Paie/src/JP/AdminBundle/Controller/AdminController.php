<?php

namespace JP\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AdminController extends Controller
{

/*
	public function indexAction(){
        return $this->render('JPAdminBundle:Admin:index.html.twig', array(
            // ...
        ));
    }

*/
    	//get all users
    public function indexAction() {
        //access user manager services 

      //  $userManager = $container->get('fos_user.user_manager');
        $userManager = $this->get('fos_user.user_manager');
        $users = $userManager->findUsers();

        return $this->render('JPAdminBundle:Admin:index.html.twig', array('users' =>   $users));
    }

   
}
