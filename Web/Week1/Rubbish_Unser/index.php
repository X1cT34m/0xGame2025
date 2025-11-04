<?php
error_reporting(0);
highlight_file(__FILE__);

class ZZZ
{
    public $yuzuha;
    function __construct($yuzuha)
    {
        $this -> yuzuha = $yuzuha;
    }
    function __destruct()
    {
        echo "破绽，在这里！" . $this -> yuzuha;
    }
}

class HSR
{
    public $robin;
    function __get($robin)
    {
        $castorice = $this -> robin;
        eval($castorice);
    }
}

class HI3rd
{
    public $RaidenMei;
    public $kiana;
    public $guanxing;
    function __invoke()
    {
        if($this -> kiana !== $this -> RaidenMei && md5($this -> kiana) === md5($this -> RaidenMei) && sha1($this -> kiana) === sha1($this -> RaidenMei))
            return $this -> guanxing -> Elysia;
    }
}

class GI
{
    public $furina; 
    function __call($arg1, $arg2)
    {
        $Charlotte = $this -> furina;
        return $Charlotte();
    }
}

class Mi
{
    public $game;
    function __toString()
    {
        $game1 = @$this -> game -> tks();
        return $game1;
    }
}

if (isset($_GET['0xGame'])) {
    $web = unserialize($_GET['0xGame']);
    throw new Exception("Rubbish_Unser");
}
?>