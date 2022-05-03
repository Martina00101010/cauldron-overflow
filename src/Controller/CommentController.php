<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Controller\Constants\ExchangeCode;
use Psr\Log\LoggerInterface;

class CommentController extends AbstractController
{
    public function commentVote(int $id, int $isDirectionUp, LoggerInterface $logger)
    {
        if ($isDirectionUp === 1) {
            $currentVoteCount = rand(7, 20);
        } elseif ($isDirectionUp === 0) {
            $currentVoteCount = rand(1, 5);
        } else {
            // create event listener to return bad-request code error?
            $logger->info("Received weird vote direction: " . $isDirectionUp);
            throw new \Exception('Non valid direction received', ExchangeCode::BAD_REQUEST);
        }
        return $this->json([ 'votes'=> $currentVoteCount ]);
    }
}
