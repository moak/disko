<?php

namespace Disko\UserBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use FOS\UserBundle\Controller\RegistrationController as BaseController;
use Symfony\Component\HttpFoundation\Request;
use FOS\UserBundle\FOSUserEvents;
use FOS\UserBundle\Event\FormEvent;
use FOS\UserBundle\Event\GetResponseUserEvent;
use FOS\UserBundle\Event\FilterUserResponseEvent;


class UserController extends BaseController
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('UserBundle:User')->findAll();

        $movies = array();
        foreach( $users as $user)
        {
            array_push($movies , $user->getMovies());
        }

        return $this->render('UserBundle:User:index.html.twig', array('users' => $users, 'movies' => $movies));
    }

    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('UserBundle:User')->find($id);

        return $this->render('UserBundle:User:profile.html.twig', array('user' => $user));
    }
}