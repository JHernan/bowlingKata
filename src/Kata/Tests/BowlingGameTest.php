<?php
namespace Kata\Tests;

use Kata\Game;

class BowlingGameTest extends \PHPUnit_Framework_TestCase
{
    private $game;

    public function setUp(){
        $this->game = new Game();
    }

    public function testGutterGame(){
        $n = 20;
        $pins = 0;
        $this->rollMany($n, $pins);
        $this->assertEquals(0, $this->game->score());
    }

    public function testAllOnes(){
        $n = 20;
        $pins = 1;
        $this->rollMany($n, $pins);
        $this->assertEquals(20, $this->game->score());
    }

    private function rollMany($n, $pins){
        for($i = 0; $i < $n; $i++){
            $this->game->roll($pins);
        }
    }
}