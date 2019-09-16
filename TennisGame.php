<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:20 PM
 */
const ZERO_POINT = 0;
const ONE_POINT = 1;
const TWO_POINT = 2;
const THREE_POINT = 3;
const FOUR_POINT = 4;
class TennisGame
{
    public $score = '';
    public $player1Name;
    public $player2Name;
    public $scorePlayer1;
    public $scorePlayer2;

    public function __construct($player1Name, $player2Name, $scorePlayer1, $scorePlayer2)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
        $this->scorePlayer1 = $scorePlayer1;
        $this->scorePlayer2 = $scorePlayer2;
    }

    public function getPlayer1Name()
    {
        return $this->player1Name;
    }

    public function getPlayer2Name()
    {
        return $this->player2Name;
    }

    public function calculateScore()
    {
        if ($this->scorePlayer1 == $this->scorePlayer2) {
            $this->equalScore();
        } elseif ($this->scorePlayer1 >= FOUR_POINT || $this->scorePlayer2 >= FOUR_POINT) {
            $this->advantage();
        }else{
            $this->gameScore();
        }
    }

    public function equalScore()
    {
        switch ($this->scorePlayer1) {
            case ZERO_POINT:
                $this->score = "Love-All";
                break;
            case ONE_POINT:
                $this->score = "Fifteen-All";
                break;
            case TWO_POINT:
                $this->score = "Thirty-All";
                break;
            case THREE_POINT:
                $this->score = "Forty-All";
                break;
            default:
                $this->score = "Deuce";
                break;
        }
    }

    public function advantage()
    {
        $differenceScore = $this->scorePlayer1 - $this->scorePlayer2;
        if ($differenceScore == 1) $this->score = "Advantage" . $this->getPlayer1Name();
        elseif ($differenceScore == -1) $this->score = "Advantage" . $this->getPlayer2Name();
        elseif ($differenceScore >= 2) $this->score = $this->getPlayer1Name() . ' ' . 'Win the Game';
        else $this->score = $this->getPlayer2Name().' '."Win the Game";
    }

    public function gameScore()
    {
        $tempScore = 0;
        for ($i = 1; $i < 3; $i++) {
            if ($i == 1) $tempScore = $this->scorePlayer1;
            else {
                $this->score .= "-";
                $tempScore = $this->scorePlayer2;
            }
        }
        switch ($tempScore) {
            case ZERO_POINT:
                $this->score .= "Love";
                break;
            case ONE_POINT:
                $this->score .= "Fifteen";
                break;
            case TWO_POINT:
                $this->score .= "Thirty";
                break;
            case THREE_POINT:
                $this->score .= "Forty";
                break;
        }
    }
    public function getScore(){
        return $this->score;
    }
    public function __toString()
    {
        return 'result: '. $this->getScore();
    }
}