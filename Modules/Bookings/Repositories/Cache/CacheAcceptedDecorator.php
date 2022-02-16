<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\AcceptedRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAcceptedDecorator extends BaseCacheDecorator implements AcceptedRepository
{
    public function __construct(AcceptedRepository $accepted)
    {
        parent::__construct();
        $this->entityName = 'bookings.accepteds';
        $this->repository = $accepted;
    }
}
