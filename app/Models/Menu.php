<?php

namespace App\Models;

use App\Exceptions\Menu\MachineNameInvalidArgument;
use App\Exceptions\Menu\MenuAlreadyExists;
use App\Exceptions\Menu\MenuNotExists;

class Menu extends Model
{
    protected $table = 'menus';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    public static function create(array $attributes = []) : \Illuminate\Database\Eloquent\Model | \Illuminate\Database\Eloquent\Builder
    {
        if (!static::validateMachineName($attributes['machine_name'])) {
            throw MachineNameInvalidArgument::create();
        }

        $menu = Menu::query()->where('machine_name', $attributes['machine_name'])->first();

        if ($menu) {
            throw MenuAlreadyExists::create($attributes['machine_name']);
        }

        return static::query()->create($attributes);
    }

    public static function validateMachineName($machineName) : bool | int
    {
        return preg_match('/^[a-z0-9_-]+$/', $machineName);
    }

    protected static function getMenuTree($machine_name): array
    {
        $menu = Menu::query()->where('machine_name', $machine_name)->first();
        if(!$menu){
            throw MenuNotExists::create($machine_name);
        }
        return (new MenuItem)->toTree($menu->id);
    }

    /*----------------------------------------
     * Relationships
     *---------------------------------------*/
    public function menuItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(MenuItem::class);
    }
}
