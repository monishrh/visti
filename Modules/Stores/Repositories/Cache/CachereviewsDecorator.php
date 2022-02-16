<?php

namespace Modules\Stores\Repositories\Cache;

use Modules\Stores\Repositories\reviewsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachereviewsDecorator extends BaseCacheDecorator implements reviewsRepository
{
    public function __construct(reviewsRepository $reviews)
    {
        parent::__construct();
        $this->entityName = 'stores.reviews';
        $this->repository = $reviews;
    }
}
