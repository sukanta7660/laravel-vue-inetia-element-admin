<?php

namespace App\Exceptions\Menu;

class InvalidParent extends \InvalidArgumentException
{
    public static function create() : static
    {
        return new static("Invalid Parent");
    }
}
