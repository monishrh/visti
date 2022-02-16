<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\DelvrdRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheDelvrdDecorator extends BaseCacheDecorator implements DelvrdRepository
{
    public function __construct(DelvrdRepository $delvrd)
    {
        parent::__construct();
        $this->entityName = 'bookings.delvrds';
        $this->repository = $delvrd;
    }
}
