<?php

namespace Modules\Towing\Repositories\Cache;

use Modules\Towing\Repositories\tvendorsRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachetvendorsDecorator extends BaseCacheDecorator implements tvendorsRepository
{
    public function __construct(tvendorsRepository $tvendors)
    {
        parent::__construct();
        $this->entityName = 'towing.tvendors';
        $this->repository = $tvendors;
    }
}
