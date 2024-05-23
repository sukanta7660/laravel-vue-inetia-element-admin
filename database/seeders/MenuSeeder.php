<?php

namespace Database\Seeders;

use App\Models\MenuItem;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run() : void
    {
        $menuItems = [
            [
                'name'      => 'Dashboard',
                'uri'       => '/admin',
                'icon'      => 'HomeFilled',
                'is_active' => 1,
                'sort'      => 0,
            ],
            [
                'name'      => 'Access Control',
                'uri'       => '<nolink>',
                'icon'      => 'mdiShield',
                'is_active' => 1,
                'sort'      => 1,
            ],
            [
                'name'      => 'Settings',
                'uri'       => '<nolink>',
                'icon'      => 'Setting',
                'is_active' => 1,
                'sort'      => 2,
            ]
        ];

        $menu = \App\Models\Menu::create([
            'name'         => 'Admin',
            'machine_name' => 'admin',
            'description'  => 'Admin Menu',
        ]);

        $menu->menuItems()->createMany($menuItems);

        /*
         * menu item for Settings
         */
        $settingMenuItems = [
            [
                'name'      => 'General',
                'uri'       => '<nolink>',
                'is_active' => 1,
                'sort'      => 0,
                'menu_id'   => $menu->id,
            ],
            [
                'name'      => 'Email',
                'uri'       => '<nolink>',
                'is_active' => 1,
                'sort'      => 1,
                'menu_id'   => $menu->id,
            ]
        ];

        $settingMenu = $menu->menuItems()->where('name', 'Settings')->first();
        $settingMenu->children()->createMany($settingMenuItems);

        /*
         * Menu Items for ACL
         */

        $aclMenuItems = [
            [
                'name'      => 'Roles',
                'uri'       => '/<admin>/acl/roles',
                'is_active' => 1,
                'sort'      => 0,
                'menu_id'   => $menu->id,
            ],
            [
                'name'      => 'Permissions',
                'uri'       => '/<admin>/acl/permissions',
                'is_active' => 1,
                'sort'      => 1,
                'menu_id'   => $menu->id,
            ],
            [
                'name'      => 'Users',
                'uri'       => '/<admin>/acl/users',
                'is_active' => 1,
                'sort'      => 2,
                'menu_id'   => $menu->id,
            ]
        ];

        $aclMenu = $menu->menuItems()->where('name', 'Access Control')->first();
        $aclMenu->children()->createMany($aclMenuItems);
    }
}
