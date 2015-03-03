<?php
namespace Kata;

/**
 * Class Game
 * @package Kata
 */
class Game
{
    private $rolls = array();
    private $currentRoll = 0;

    public function roll($pins){
        $this->rolls[$this->currentRoll++] = $pins;
    }

    public function score(){
        $score = 0;
        $frameIndex = 0;
        for($frame = 0; $frame < 10; $frame++){
            if($this->isStrike($frame)){
                $score += 10 + $this->strikeBonus($frameIndex);
                $frameIndex ++;
            }
            else if($this->isSpare($frameIndex)){
                $score += 10 + $this->spareBonus($frameIndex);
                $frameIndex += 2;
            }else{
                $score += $this->sumPinsOnFrame($frameIndex);
                $frameIndex += 2;
            }
        }
        return $score;
    }

    private function isStrike($frame){
        return ($this->rolls[$frame] == 10) ? true: false;
    }

    private function isSpare($frameIndex){
        return ($this->rolls[$frameIndex] + $this->rolls[$frameIndex+1] == 10) ? true : false;
    }

    private function sumPinsOnFrame($frameIndex){
        return $this->rolls[$frameIndex] + $this->rolls[$frameIndex+1];
    }

    private function strikeBonus($frameIndex){
        return $this->rolls[$frameIndex+1] + $this->rolls[$frameIndex+2];
    }

    private function spareBonus($frameIndex){
        return $this->rolls[$frameIndex+2];
    }
}