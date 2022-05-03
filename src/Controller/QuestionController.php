<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    public function homepage(): Response
    {
        // indirect use of twig
        return $this->render('question/homepage.html.twig');

        /* direct use of twig */
        // first, declare Twig\Environment $twigEnvironment in function params, then:
        // $htmlPage = $twigEnvironment->render('question/homepage.html.twig');
        // return (new Response($htmlPage));
    }

    public function show($question): Response
    {
        $answers = [
            "Theoretically, it would take just 45 hours on a Boeing 747 to fly around the Earth's circumference",
            "The sun is white. It looks yellow because the Earth's atmosphere scatters blue light, 
            so that the Sun colour is white minus blue, i.e. red plus green = yellow",
            "Many species of trees that grow near the equator can grow several meters per year",
            "Virtual reality and Augmented reality are ones of the most evolving technologies"
        ];
        dump($answers, $this); // to remember how to use dump
        return $this->render(
            'question/show.html.twig',
            [
                'question' => ucwords(str_replace('-', ' ', $question)) . '?',
                'answers' => $answers
            ]
        );
    }
}
