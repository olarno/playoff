<?php

class player
{
    public $cotation;

    public function __construct($cotation)
    {
        $this->cotation = $cotation;
    }

    public function getCotation()
    {
        return $this->cotation;
    }

    public function setCotation($cotation)
    {
        $this->cotation = $cotation;
        return $this;
    }
}
