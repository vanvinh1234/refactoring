<?php
/**
 * Created by PhpStorm.
 * User: dungduong
 * Date: 10/27/2018
 * Time: 6:29 PM
 */

include ('TennisGame.php');

$tennisGame = new TennisGame('player1','player2',6,8);
$tennisGame->calculateScore();
echo $tennisGame;