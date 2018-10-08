<?php

namespace CfourCeresFashionAdvanced\Providers;

use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\ServiceProvider;
use Plenty\Plugin\Events\Dispatcher;
use IO\Helper\TemplateContainer;
use IO\Helper\ResourceContainer;
use IO\Extensions\Functions\Partial;

/**
 * Class CfourCeresFashionAdvancedServiceProvider
 * @package CfourCeresFashionAdvanced\Providers
 */
class CfourCeresFashionAdvancedServiceProvider extends ServiceProvider
{

    const EVENT_LISTENER_PRIORITY = 99;

    /**
    * Register the route service provider
    */
    public function register(){}

    /**
     * @param Twig $twig
     * @param Dispatcher $eventDispatcher
     * @return bool
     */
    public function boot(Twig $twig, Dispatcher $eventDispatcher) {

        $eventDispatcher->listen('IO.Resources.Import', function (ResourceContainer $container) {
            $container->addScriptTemplate('CfourCeresFashionAdvanced::includeJS');
            $container->addStyleTemplate('CfourCeresFashionAdvanced::includeCSS');
        }, 99);

        $eventDispatcher->listen('IO.tpl.item', function(TemplateContainer $container, $templateData = [])
        {
            $container->setTemplate('CfourCeresFashionAdvanced::Item.SingleItemWrapper');
            return false;
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.tpl.category.item', function(TemplateContainer $container, $templateData= [])
        {
            $container->setTemplate('CfourCeresFashionAdvanced::Category.Item.CategoryItem');
            return false;
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.tpl.home', function(TemplateContainer $container, $templateData= [])
        {
            $container->setTemplate('CfourCeresFashionAdvanced::Homepage.Homepage');
            return false;
        }, self::EVENT_LISTENER_PRIORITY);

        $eventDispatcher->listen('IO.init.templates', function (Partial $partial) {
            $partial->set('header', 'CfourCeresFashionAdvanced::PageDesign.Partials.Header.Header');
            $partial->set('footer', 'CfourCeresFashionAdvanced::PageDesign.Partials.Footer');
            $partial->set('page-design', 'CfourCeresFashionAdvanced::PageDesign.PageDesign');
        }, self::EVENT_LISTENER_PRIORITY);
        return false;

    }
}