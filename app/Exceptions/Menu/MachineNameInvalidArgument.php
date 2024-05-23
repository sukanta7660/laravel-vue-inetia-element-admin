<?php

namespace App\Exceptions\Menu;

class MachineNameInvalidArgument extends \InvalidArgumentException
{
    public static function create() : static
    {
        return new static('The machine name must only contain lowercase letters, numbers, dashes and underscores.');
    }
}
