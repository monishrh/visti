<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\TcanRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTcanDecorator extends BaseCacheDecorator implements TcanRepository
{
    public function __construct(TcanRepository $tcan)
    {
        parent::__construct();
        $this->entityName = 'towing.tcans';
        $this->repository = $tcan;
    }
}
