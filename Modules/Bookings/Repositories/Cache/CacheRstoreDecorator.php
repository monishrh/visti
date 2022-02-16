<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\RstoreRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRstoreDecorator extends BaseCacheDecorator implements RstoreRepository
{
    public function __construct(RstoreRepository $rstore)
    {
        parent::__construct();
        $this->entityName = 'bookings.rstores';
        $this->repository = $rstore;
    }
}
