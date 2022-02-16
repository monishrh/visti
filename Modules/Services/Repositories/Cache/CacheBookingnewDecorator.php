<?php

namespace Modules\Services\Repositories\Cache;

use Modules\Services\Repositories\BookingnewRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBookingnewDecorator extends BaseCacheDecorator implements BookingnewRepository
{
    public function __construct(BookingnewRepository $bookingnew)
    {
        parent::__construct();
        $this->entityName = 'services.bookingnews';
        $this->repository = $bookingnew;
    }
}
