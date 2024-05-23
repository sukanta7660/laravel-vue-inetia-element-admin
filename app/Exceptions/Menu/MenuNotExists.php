<?php

namespace App\Exceptions\Menu;

class MenuNotExists extends \InvalidArgumentException
{
    public static function create(string $machineName) : static
    {
        return new static("A menu with the machine name `{$machineName}` does not exist.");
    }
}
