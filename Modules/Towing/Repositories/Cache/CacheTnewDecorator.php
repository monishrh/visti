<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\TnewRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTnewDecorator extends BaseCacheDecorator implements TnewRepository
{
    public function __construct(TnewRepository $tnew)
    {
        parent::__construct();
        $this->entityName = 'towing.tnews';
        $this->repository = $tnew;
    }
}
