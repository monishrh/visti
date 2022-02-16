<?php

namespace Modules\Appusers\Repositories\Cache;

use Modules\Appusers\Repositories\uservehiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheuservehiDecorator extends BaseCacheDecorator implements uservehiRepository
{
    public function __construct(uservehiRepository $uservehi)
    {
        parent::__construct();
        $this->entityName = 'appusers.uservehis';
        $this->repository = $uservehi;
    }
}
