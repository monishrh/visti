<?php

namespace Modules\Vehiclem\Repositories\Cache;

use Modules\Vehiclem\Repositories\BmodelRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheBmodelDecorator extends BaseCacheDecorator implements BmodelRepository
{
    public function __construct(BmodelRepository $bmodel)
    {
        parent::__construct();
        $this->entityName = 'vehiclem.bmodels';
        $this->repository = $bmodel;
    }
}
