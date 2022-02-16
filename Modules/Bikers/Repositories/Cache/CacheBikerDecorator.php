<?php

namespace Modules\Bikers\Repositories\Cache;

use Modules\Bikers\Repositories\BikerRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBikerDecorator extends BaseCacheDecorator implements BikerRepository
{
    public function __construct(BikerRepository $biker)
    {
        parent::__construct();
        $this->entityName = 'bikers.bikers';
        $this->repository = $biker;
    }
}
