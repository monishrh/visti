<?php

namespace Modules\Insurance\Repositories\Cache;

use Modules\Insurance\Repositories\OniRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheOniDecorator extends BaseCacheDecorator implements OniRepository
{
    public function __construct(OniRepository $oni)
    {
        parent::__construct();
        $this->entityName = 'insurance.onis';
        $this->repository = $oni;
    }
}
