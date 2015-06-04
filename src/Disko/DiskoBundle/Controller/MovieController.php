<?php

namespace Disko\DiskoBundle\Controller;

use Disko\DiskoBundle\Form\Type\MovieType;
use Disko\DiskoBundle\Form\Type\VoteMovieType;
use Symfony\Component\HttpFoundation\Request;
use Disko\DiskoBundle\Entity\Movie;
use Disko\DiskoBundle\Entity\Vote;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class MovieController extends Controller
{
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $movies = $em->getRepository('DiskoBundle:Movie')->findAll();
        $my_movies = null;

        if ( $this->get('security.context')->isGranted('ROLE_USER'))
        {
            $my_movies = $em->getRepository('DiskoBundle:Movie')->findByUser($this->getUser());
        }


        return $this->render('DiskoBundle:Movie:index.html.twig', array( 'movies' => $movies, 'my_movies' => $my_movies ));
    }

    public function movieAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();
        $movie = $em->getRepository('DiskoBundle:Movie')->find($id);
        $vote = new Vote();
        if ( ! $movie)
            throw $this->createNotFoundException('This page does not exist.');

        $form = $this->get('form.factory')->create(new VoteMovieType(), $vote);

        if ($form->handleRequest($request)->isValid())
        {
            $vote->setUser($this->get('security.context')->getToken()->getUser());
            $vote->setMovie($movie);
            $em->persist($vote);
            $em->flush();

            return $this->redirect($this->generateUrl('movies'));

        }
        return $this->render('DiskoBundle:Movie:movie.html.twig', array( 'movie' => $movie, 'form'      =>  $form->createView() ));
    }

    public function addAction(Request $request)
    {
        $movie = new Movie();
        $em = $this->getDoctrine()->getManager();
        $form = $this->get('form.factory')->create(new MovieType(), $movie);

        if ($form->handleRequest($request)->isValid())
        {
            if ($movie->getImage()->getFile() == null)
            {
                $movie->setImage(null);
            }

            $movie->setUser($this->get('security.context')->getToken()->getUser());

            $em->persist($movie);
            $em->flush();

            return $this->redirect($this->generateUrl('movies'));
        }
        return $this->render('DiskoBundle:Movie:add.html.twig', array('form'      =>  $form->createView()));
    }

    public function editAction($id, Request $request)
    {
        $em = $this->getDoctrine()->getManager();
        $movie = $em->getRepository('DiskoBundle:Movie')->find($id);

        $form = $this->get('form.factory')->create(new MovieType(), $movie);

        if ($form->handleRequest($request)->isValid())
        {
            $em->persist($movie);
            $em->flush();

            return $this->redirect($this->generateUrl('movies'));
        }
        return $this->render('DiskoBundle:Movie:edit.html.twig', array('movie' =>  $movie , 'form'    =>  $form->createView()));
    }

    public function deleteAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $movie = $em->getRepository('DiskoBundle:Movie')->find($id);

        if(!$movie)
        {
            throw $this->createNotFoundException('Film introuvable');
        }

        $em->remove($movie);
        $em->flush();

        return $this->redirect($this->generateUrl('movies'));
    }


    public function getMovieAction($name)
    {

    }
}
