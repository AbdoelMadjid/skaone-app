<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class TempMenuAppsSeeder extends Seeder
{
    use HasMenuPermission;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cache::forget('menus');
        /**
         * @var Menu $mm
         */

        // Menu Level (Apps)
        $mm = Menu::firstOrCreate(
            ['url' => 'apps'],
            ['name' => 'Apps', 'category' => 'MAIN MENU', 'icon' => 'apps']
        );
        $this->attachMenupermission($mm, ['read'], ['admin']);

        // SubMenu Level (Calendar & Chat under Apps)
        $sm = $mm->subMenus()->create(['name' => 'Calendar', 'url' => $mm->url . '/apps_calendar', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Chat', 'url' => $mm->url . '/apps_chat', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        // SubMenu Level (Email under Apps)
        $sm = $mm->subMenus()->create(['name' => 'Email', 'url' => $mm->url . '/email', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        // ChildSubMenu Level (Mailbox & Email Template under Email)
        $csm = $sm->subMenus()->create(['name' => 'Mailbox', 'url' => $sm->url . '/apps_email_mailbox', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['read'], ['admin']);

        $csm = $sm->subMenus()->create(['name' => 'Email Templates', 'url' => $sm->url . '/email-templates', 'category' => $sm->category]);
        $this->attachMenupermission($csm, ['read'], ['admin']);

        // ChildSubMenu Level (Basic Action & Ecommerce Action under Email Template)
        $ccsm = $csm->subMenus()->create(['name' => 'Basic Action', 'url' => $csm->url . '/apps_email_template_basic', 'category' => $csm->category]);
        $this->attachMenupermission($ccsm, ['read'], ['admin']);

        $ccsm = $csm->subMenus()->create(['name' => 'Ecommerce Action', 'url' => $csm->url . '/apps_email_template_ecommerce', 'category' => $csm->category]);
        $this->attachMenupermission($ccsm, ['read'], ['admin']);
    }
}
