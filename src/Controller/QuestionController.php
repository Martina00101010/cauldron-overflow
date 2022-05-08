<?php

namespace App\Controller;

use Knp\Bundle\MarkdownBundle\MarkdownParserInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Cache\CacheInterface;

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

    public function show($question, MarkdownParserInterface $markdownParser, CacheInterface $cache): Response
    {
        $answers = [
            "Theoretically, it would take `just 45 hours` on a Boeing 747 to fly around the Earth's circumference",
            "The sun is white. It looks yellow because the Earth's atmosphere scatters blue light, 
            so that the Sun colour is white minus blue, i.e. red plus green = yellow",
            "Many species of trees that grow near the equator can grow several meters per year",
            "Virtual reality and Augmented reality are ones of the most evolving technologies"
        ];
//        dump($answers, $this); // to remember how to use dump
        $question = "What interesting facts **astonished** you most?";
        $parsedQuestion = $cache->get('markdown' . md5($question),
            function () use ($markdownParser, $question) {
                $markdownParser->transformMarkdown($question);
        });
        return $this->render(
            'question/show.html.twig',
            [
                'question' => ucwords(str_replace('-', ' ', $parsedQuestion)) . '?',
                'answers' => $answers
            ]
        );
    }
}
