<?php

namespace Modules\Worktimings\Repositories\Cache;

use Modules\Worktimings\Repositories\TimingRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheTimingDecorator extends BaseCacheDecorator implements TimingRepository
{
    public function __construct(TimingRepository $timing)
    {
        parent::__construct();
        $this->entityName = 'worktimings.timings';
        $this->repository = $timing;
    }
}
