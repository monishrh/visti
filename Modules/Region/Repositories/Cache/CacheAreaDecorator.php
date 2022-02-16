<?php

namespace Modules\Region\Repositories\Cache;

use Modules\Region\Repositories\AreaRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAreaDecorator extends BaseCacheDecorator implements AreaRepository
{
    public function __construct(AreaRepository $area)
    {
        parent::__construct();
        $this->entityName = 'region.areas';
        $this->repository = $area;
    }
}
