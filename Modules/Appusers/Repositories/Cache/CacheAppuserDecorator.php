<?php

namespace Modules\Appusers\Repositories\Cache;

use Modules\Appusers\Repositories\AppuserRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheAppuserDecorator extends BaseCacheDecorator implements AppuserRepository
{
    public function __construct(AppuserRepository $appuser)
    {
        parent::__construct();
        $this->entityName = 'appusers.appusers';
        $this->repository = $appuser;
    }
}
