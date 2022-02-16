<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\TongRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTongDecorator extends BaseCacheDecorator implements TongRepository
{
    public function __construct(TongRepository $tong)
    {
        parent::__construct();
        $this->entityName = 'towing.tongs';
        $this->repository = $tong;
    }
}
