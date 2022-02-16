<?php

namespace Modules\Region\Repositories\Cache;

use Modules\Region\Repositories\CityRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCityDecorator extends BaseCacheDecorator implements CityRepository
{
    public function __construct(CityRepository $city)
    {
        parent::__construct();
        $this->entityName = 'region.cities';
        $this->repository = $city;
    }
}
