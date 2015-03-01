<?php
namespace Kata;

/**
 * Class Game
 * @package Kata
 */
class Game
{
    private $score = 0;

    public function roll($pins){
        $this->score += $pins;
    }

    public function score(){
        return $this->score;
    }
}