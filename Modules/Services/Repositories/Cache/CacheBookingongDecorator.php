<?php

namespace Modules\Services\Repositories\Cache;

use Modules\Services\Repositories\BookingongRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBookingongDecorator extends BaseCacheDecorator implements BookingongRepository
{
    public function __construct(BookingongRepository $bookingong)
    {
        parent::__construct();
        $this->entityName = 'services.bookingongs';
        $this->repository = $bookingong;
    }
}
