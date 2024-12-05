<?php

namespace Database\Seeders;

use App\Models\AppSupport\Menu;
use App\Traits\HasMenuPermission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Cache;

class TempMenuDasboardSeeder extends Seeder
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
        $mm = Menu::firstOrCreate(['url' => 'dashboards'], ['name' => 'Dashboards', 'category' => 'MAIN MENU', 'icon' => 'dashboard']);
        $this->attachMenupermission($mm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Analytics', 'url' => $mm->url . '/dashboard_analytics', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'CRM', 'url' => $mm->url . '/dashboard_crm', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Ecommerce', 'url' => $mm->url . '/dashboard_ecommerce', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Crypto', 'url' => $mm->url . '/dashboard_crypto', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Projects', 'url' => $mm->url . '/dashboard_projects', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'NFT', 'url' => $mm->url . '/dashboard_nft', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);

        $sm = $mm->subMenus()->create(['name' => 'Job', 'url' => $mm->url . '/dashboard_job', 'category' => $mm->category]);
        $this->attachMenupermission($sm, ['read'], ['admin']);
    }
}
