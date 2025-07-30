<?php
namespace Grav\Plugin;

use Composer\Autoload\ClassLoader;
use Grav\Common\Grav;
use Grav\Common\Plugin;
use RocketTheme\Toolbox\Event\Event;

/**
 * Class ModuleReusePlugin
 * @package Grav\Plugin
 */
class ModuleReusePlugin extends Plugin
{
    /**
     * @return array
     *
     * The getSubscribedEvents() gives the core a list of events
     *     that the plugin wants to listen to. The key of each
     *     array section is the event that the plugin listens to
     *     and the value (in the form of an array) contains the
     *     callable (or function) as well as the priority. The
     *     higher the number the higher the priority.
     */
    public static function getSubscribedEvents(): array
    {
        return [
            'onPluginsInitialized' => [
                ['onPluginsInitialized', 0]
            ]
        ];
    }

    /**
     * Composer autoload
     *
     * @return ClassLoader
     */
    public function autoload(): ClassLoader
    {
        return require __DIR__ . '/vendor/autoload.php';
    }

    /**
     * Initialize the plugin
     */
    public function onPluginsInitialized(): void
    {
        if ($this->isAdmin()) {
            $this->enable(
                [
//                    'onAdminSave'         => ['onAdminSave', 0],
                    'onGetPageTemplates'  => ['onGetPageTemplates', 0],
                    'onGetPageBlueprints' => ['onGetPageBlueprints', 0],
                ]
            );

            return;
        }

        $this->enable([
                'onTwigTemplatePaths' => ['onTwigTemplatePaths', 0],
        ]);
    }

    /**
     * Add blueprint directory to page templates.
     */
    public function onGetPageTemplates(Event $event)
    {
        $locator = Grav::instance()['locator'];
        $event->types->scanTemplates($locator->findResource('plugin://' . $this->name . '/templates'));
    }

    /**
     * Extend page blueprints with additional configuration options.
     *
     * @param Event $event
     */
    public function onGetPageBlueprints($event)
    {
        $locator = Grav::instance()['locator'];
        $event->types->scanBlueprints($locator->findResource('plugin://' . $this->name . '/blueprints'));
    }

    /**
     * Register templates
     *
     * @return void
     */
    public function onTwigTemplatePaths()
    {
        $this->grav['twig']->twig_paths[] = __DIR__ . '/templates';
    }
}
