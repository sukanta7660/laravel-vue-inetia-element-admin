<?php

namespace App\Models;

use App\Traits\MenuTree;
use Illuminate\Database\Eloquent\Casts\Attribute;

class MenuItem extends Model
{
    use MenuTree {
        MenuTree::boot as treeBoot;
    }

    protected $table = 'menu_items';

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    protected $casts = [
        'is_active' => 'boolean',
        'sort' => 'integer',
    ];

    public function menu(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->BelongsTo(Menu::class);
    }

    /*----------------------------------------
     * Attributes
     *---------------------------------------*/

    public function sort(): Attribute
    {
        return new Attribute(
            fn($value) => $value,
            fn($value) => $value ?? 0
        );
    }
}
