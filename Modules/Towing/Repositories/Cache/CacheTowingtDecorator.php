<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\TowingtRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTowingtDecorator extends BaseCacheDecorator implements TowingtRepository
{
    public function __construct(TowingtRepository $towingt)
    {
        parent::__construct();
        $this->entityName = 'towing.towingts';
        $this->repository = $towingt;
    }
}
