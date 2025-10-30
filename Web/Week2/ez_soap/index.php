<?php
highlight_file(__FILE__);
error_reporting(0);

//hint: Redis20251206

class pure{
    public $web;
    public $misc;
    public $crypto;
    public $pwn;

    public function __construct($web, $misc, $crypto, $pwn){
        $this->web = $web;
        $this->misc = $misc;
        $this->crypto = $crypto;
        $this->pwn = $pwn;
    }

    public function reverse(){
        $this->pwn = new $this->web($this->misc, $this->crypto);
    }

    public function osint(){
        $this->pwn->play_0xGame();
    }

    public function __destruct(){
        $this->reverse();
        $this->osint();
    }
}

$AI = $_GET['ai'];

$ctf = unserialize($AI);

?>