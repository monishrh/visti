<?php

namespace Modules\Vehiclem\Repositories\Cache;

use Modules\Vehiclem\Repositories\BrandRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBrandDecorator extends BaseCacheDecorator implements BrandRepository
{
    public function __construct(BrandRepository $brand)
    {
        parent::__construct();
        $this->entityName = 'vehiclem.brands';
        $this->repository = $brand;
    }
}
