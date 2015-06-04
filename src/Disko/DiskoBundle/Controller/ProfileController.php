<?php

namespace Disko\DiskoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Disko\DiskoBundle\Form\Type\VoteMovieType;
use Symfony\Component\HttpFoundation\Request;

class ProfileController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $users = $em->getRepository('DiskoBundle:User')->findAll();

        return $this->render('DiskoBundle:Profile:index.html.twig', array('users' => $users));
    }

    public function userAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $user = $em->getRepository('DiskoBundle:User')->find($id);

        return $this->render('DiskoBundle:Profile:profile.html.twig', array('user' => $user));
    }


}
