<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class CommentController extends AbstractController
{
    public function commentVote(int $id, bool $isDirectionUp)
    {
        if ($isDirectionUp === true) {
            $currentVoteCount = rand(7, 20);
        } else {
            $currentVoteCount = rand(1, 5);
        }
        return $this->json([ 'votes'=> $currentVoteCount ]);
    }
}