<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\NewbookingsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNewbookingsDecorator extends BaseCacheDecorator implements NewbookingsRepository
{
    public function __construct(NewbookingsRepository $newbookings)
    {
        parent::__construct();
        $this->entityName = 'bookings.newbookings';
        $this->repository = $newbookings;
    }
}
