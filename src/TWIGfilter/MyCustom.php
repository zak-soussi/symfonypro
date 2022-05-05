<?php

namespace App\TWIGfilter;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;

class MyCustom extends AbstractExtension
{
    public function getFunctions()
    {
        return [
            new TwigFunction("defaultImage",[$this,'defaultImage'])
        ];
    }
    public function defaultImage($path){

    }
}