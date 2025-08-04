<?php

namespace Plugin\Rental\Twig\Extension;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

class RentalExtension extends AbstractExtension
{
    /**
     * @return array
     */
    public function getFilters()
    {
        return [
            new TwigFilter('rental_json_decode', [$this, 'jsonDecode']),
        ];
    }

    /**
     * JSONデコード関数
     *
     * @param string $json
     * @return array
     */
    public function jsonDecode($json)
    {
        if (empty($json)) {
            return [];
        }
        
        $result = json_decode($json, true);
        if (json_last_error() !== JSON_ERROR_NONE) {
            return [];
        }
        
        return $result;
    }
    
    /**
     * @return string
     */
    public function getName()
    {
        return 'rental_extension';
    }
}