<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\Constants\ExchangeCode;

class CommentController extends AbstractController
{
    public function commentVote(int $id, int $isDirectionUp)
    {
        if ($isDirectionUp === 1) {
            $currentVoteCount = rand(7, 20);
        } elseif ($isDirectionUp === 0) {
            $currentVoteCount = rand(1, 5);
        } else {
            // create event listener to return bad-request code error?
            throw new \Exception('Non valid direction received', ExchangeCode::BAD_REQUEST);
        }
        return $this->json([ 'votes'=> $currentVoteCount ]);
    }
}
