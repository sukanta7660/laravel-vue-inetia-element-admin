<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menuItems = [
            [
                'name'    => 'Dashboard',
                'uri'     => '<nolink>',
                'is_active' => 1,
                'sort'  => 0,
            ],
            [
                'name'    => 'Access Control',
                'uri'     => '<nolink>',
                'is_active' => 1,
                'sort'  => 1,
            ],
            [
                'name'    => 'Settings',
                'uri'     => '<nolink>',
                'is_active' => 1,
                'sort'  => 2,
            ]
        ];

        $menu = \App\Models\Menu::create([
            'name' => 'Admin',
            'machine_name' => 'admin',
            'description' => 'Admin Menu',
        ]);

        $menu->menuItems()->createMany($menuItems);
    }
}
