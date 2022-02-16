<?php

namespace Modules\Services\Repositories\Cache;

use Modules\Services\Repositories\BookingcomRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBookingcomDecorator extends BaseCacheDecorator implements BookingcomRepository
{
    public function __construct(BookingcomRepository $bookingcom)
    {
        parent::__construct();
        $this->entityName = 'services.bookingcoms';
        $this->repository = $bookingcom;
    }
}
