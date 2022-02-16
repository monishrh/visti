<?php

namespace Modules\Insurance\Repositories\Cache;

use Modules\Insurance\Repositories\ComiRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheComiDecorator extends BaseCacheDecorator implements ComiRepository
{
    public function __construct(ComiRepository $comi)
    {
        parent::__construct();
        $this->entityName = 'insurance.comis';
        $this->repository = $comi;
    }
}
