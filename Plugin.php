<?php namespace Mercator\SecretPage;

use Backend;
use System\Classes\PluginBase;
use Exception;

/**
 * SecretPage Plugin Information File
 */
class Plugin extends PluginBase
{
    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'Secret Page',
            'description' => 'Make pages only acessible with a secret key.',
            'author'      => 'Helmut Kaufmann',
            'homepage'	  => 'https://mercator.li',
            'icon'        => 'icon-leaf'
        ];
    }

    /**
     * Register method, called when the plugin is first registered.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Boot method, called right before the request route.
     *
     * @return array
     */
    public function boot()
    {

    }

    /**
     * Registers any front-end components implemented in this plugin.
     *
     * @return array
     */
    public function registerComponents()
    {

        return [
            'Mercator\SecretPage\Components\SecretPage' => 'SecretPage',
        ];
    }

    /**
     * Registers any back-end permissions used by this plugin.
     *
     * @return array
     */
    public function registerPermissions()
    {
        return []; // Remove this line to activate

        return [
            'mercator.secretpage.some_permission' => [
                'tab' => 'SecretPage',
                'label' => 'Some permission'
            ],
        ];
    }
    
    public function registerPageSnippets()
	{
    return [
       'Mercator\SecretPage\Components\SecretPage' => 'SecretPage',
    ];
}

    /**
     * Registers back-end navigation items for this plugin.
     *
     * @return array
     */
    public function registerNavigation()
    {
        return []; // Remove this line to activate

        return [
            'secretpage' => [
                'label'       => 'SecretPage',
                'url'         => Backend::url('mercator/secretpage/mycontroller'),
                'icon'        => 'icon-leaf',
                'permissions' => ['mercator.secretpage.*'],
                'order'       => 500,
            ],
        ];
    }
}
