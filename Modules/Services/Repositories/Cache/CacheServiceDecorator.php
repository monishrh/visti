<?php

namespace Modules\Services\Repositories\Cache;

use Modules\Services\Repositories\ServiceRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheServiceDecorator extends BaseCacheDecorator implements ServiceRepository
{
    public function __construct(ServiceRepository $service)
    {
        parent::__construct();
        $this->entityName = 'services.services';
        $this->repository = $service;
    }
}
