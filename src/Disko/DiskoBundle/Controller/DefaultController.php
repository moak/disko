<?php

namespace Disko\DiskoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Disko\DiskoBundle\Form\Type\VoteMovieType;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $movies = $em->getRepository('DiskoBundle:Movie')->findAll();

        $form = $this->get('form.factory')->create(new VoteMovieType(), null);

        for ($i = 0; $i < 3;  $i++) {
            $forms[] = $this->get('form.factory')->create(new VoteMovieType(), null)->createView();
        }

        if ($form->handleRequest($request)->isValid()) {
            return $this->redirectToRoute('movies');

        }

        return $this->render('DiskoBundle:Default:index.html.twig', array('movies' => $movies,  'forms'    =>  $forms));
    }
}
