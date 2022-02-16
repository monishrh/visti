<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\TcomRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTcomDecorator extends BaseCacheDecorator implements TcomRepository
{
    public function __construct(TcomRepository $tcom)
    {
        parent::__construct();
        $this->entityName = 'towing.tcoms';
        $this->repository = $tcom;
    }
}
