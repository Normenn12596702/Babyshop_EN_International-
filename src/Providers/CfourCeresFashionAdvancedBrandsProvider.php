<?php

namespace CfourCeresFashionAdvanced\Providers;

use Plenty\Modules\Item\Manufacturer\Contracts\ManufacturerRepositoryContract;
use Plenty\Modules\Plugin\DataBase\Contracts\DataBase;
use Plenty\Plugin\ConfigRepository;
use Plenty\Plugin\Templates\Twig;
use Plenty\Plugin\ServiceProvider;

/**
 * Class CfourCeresFashionAdvancedServiceProvider
 * @package CfourCeresFashionAdvanced\Providers
 */
class CfourCeresFashionAdvancedBrandsProvider extends ServiceProvider {

    /**
     * @param Twig $twig
     * @param ManufacturerRepositoryContract $manufacturerRepository
     * @param ConfigRepository $config
     * @return string
     */
    public function  call(Twig $twig, ManufacturerRepositoryContract $manufacturerRepository, ConfigRepository $config):string {
        $brands = $manufacturerRepository->all();
        $array =  $brands->toArray();
        $entries = [];
        foreach ($array['entries'] as $entry){
            if (!empty($entry['logo'])){
                $temp['logo'] = $entry['logo'];
                if (!empty($entry['url'])){
                    if (strpos($entry['url'], '://') === false) {
                        $entry['url'] = 'http://'.$entry['url'];
                    }
                }
                $temp['url'] = $entry['url'];
                $temp['name'] = $entry['name'];
                $entries[] = $temp;
            }
        }
        return $twig->render('CfourCeresFashionAdvanced::Homepage.BrandImages', [
            'brands' => $entries
        ]);
    }

}