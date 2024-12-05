<?php

namespace App\Traits;

use Illuminate\Support\Arr;

trait HasPermission
{
    protected $abilities = [
        'show' => 'read',
        'index' => 'read',
        'edit' => 'update',
        'update' => 'update',
        'create' => 'create',
        'store' => 'create',
        'destroy' => 'delete',
    ];

    public function callAction($method, $parameters)
    {
        $action = Arr::get($this->abilities, $method);
        if (!$action) {
            return parent::callAction($method, $parameters);
        }
        $staticPath = request()->route()->getCompiled()->getStaticPrefix();

        $urlMenu = urlMenu();
        $staticPath = substr($staticPath, 1);

        if (!in_array($staticPath, $urlMenu)) {
            foreach (array_reverse(explode('/', $staticPath)) as $path) {
                $staticPath = str_replace("/$path", "", $staticPath);
                if (in_array($staticPath, $urlMenu)) {
                    break;
                }
            }
        }

        if (in_array($staticPath, $urlMenu)) {
            $this->authorize("$action $staticPath");
        }
        return parent::callAction($method, $parameters);
    }
}