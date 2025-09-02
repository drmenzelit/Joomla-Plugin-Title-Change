<?php

/**
 * System Plugin for Joomla! - Title change
 *
 * @author     Viviana Menzel <vivianamenzel@dr-menzel-it.de>
 * @copyright  Copyright 2015 Viviana Menzel
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 * @link       http://www.dr-menzel-it.de/
 */

\defined('_JEXEC') or die;

use Joomla\CMS\Extension\PluginInterface;
use Joomla\CMS\Factory;
use Joomla\CMS\Plugin\PluginHelper;
use Joomla\DI\Container;
use Joomla\DI\ServiceProviderInterface;
use Drmenzelit\Plugin\System\Titlechange\Extension\Titlechange;

return new class () implements ServiceProviderInterface {
    /**
     * Registers the service provider with a DI container.
     *
     * @param   Container  $container  The DI container.
     *
     * @return  void
     *
     * @since   4.4.0
     */
    public function register(Container $container): void
    {
        $container->set(
            PluginInterface::class,
            function (Container $container) {
                $plugin     = new Titlechange(
                    (array) PluginHelper::getPlugin('system', 'titlechange')
                );
                $plugin->setApplication(Factory::getApplication());

                return $plugin;
            }
        );
    }
};
