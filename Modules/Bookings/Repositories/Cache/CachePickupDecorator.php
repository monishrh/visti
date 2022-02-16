<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\PickupRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePickupDecorator extends BaseCacheDecorator implements PickupRepository
{
    public function __construct(PickupRepository $pickup)
    {
        parent::__construct();
        $this->entityName = 'bookings.pickups';
        $this->repository = $pickup;
    }
}
