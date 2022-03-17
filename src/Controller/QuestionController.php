<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;

class QuestionController
{
    public function homepage(): Response
    {
        return new Response("Ask your question!");
    }

    public function show($question): Response
    {
        return new Response(
            ucwords(str_replace('-', ' ', $question))
            . "? There could be your answer"
        );
    }
}