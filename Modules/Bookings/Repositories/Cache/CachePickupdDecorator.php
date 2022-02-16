<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\PickupdRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachePickupdDecorator extends BaseCacheDecorator implements PickupdRepository
{
    public function __construct(PickupdRepository $pickupd)
    {
        parent::__construct();
        $this->entityName = 'bookings.pickupds';
        $this->repository = $pickupd;
    }
}
