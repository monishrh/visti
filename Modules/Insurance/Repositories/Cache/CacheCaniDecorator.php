<?php

namespace Modules\Insurance\Repositories\Cache;

use Modules\Insurance\Repositories\CaniRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCaniDecorator extends BaseCacheDecorator implements CaniRepository
{
    public function __construct(CaniRepository $cani)
    {
        parent::__construct();
        $this->entityName = 'insurance.canis';
        $this->repository = $cani;
    }
}
