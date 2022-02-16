<?php

namespace Modules\Insurance\Repositories\Cache;

use Modules\Insurance\Repositories\NewiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheNewiDecorator extends BaseCacheDecorator implements NewiRepository
{
    public function __construct(NewiRepository $newi)
    {
        parent::__construct();
        $this->entityName = 'insurance.newis';
        $this->repository = $newi;
    }
}
