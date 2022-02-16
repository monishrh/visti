<?php

namespace Modules\Stores\Repositories\Cache;

use Modules\Stores\Repositories\StoresRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheStoresDecorator extends BaseCacheDecorator implements StoresRepository
{
    public function __construct(StoresRepository $stores)
    {
        parent::__construct();
        $this->entityName = 'stores.stores';
        $this->repository = $stores;
    }
}
