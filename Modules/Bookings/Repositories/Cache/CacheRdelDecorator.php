<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\RdelRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheRdelDecorator extends BaseCacheDecorator implements RdelRepository
{
    public function __construct(RdelRepository $rdel)
    {
        parent::__construct();
        $this->entityName = 'bookings.rdels';
        $this->repository = $rdel;
    }
}
