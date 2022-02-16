<?php

namespace Modules\Bookings\Repositories\Cache;

use Modules\Bookings\Repositories\CanceledRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCanceledDecorator extends BaseCacheDecorator implements CanceledRepository
{
    public function __construct(CanceledRepository $canceled)
    {
        parent::__construct();
        $this->entityName = 'bookings.canceleds';
        $this->repository = $canceled;
    }
}
