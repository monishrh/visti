<?php

namespace Modules\Appusers\Repositories\Cache;

use Modules\Appusers\Repositories\walletRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CachewalletDecorator extends BaseCacheDecorator implements walletRepository
{
    public function __construct(walletRepository $wallet)
    {
        parent::__construct();
        $this->entityName = 'appusers.wallets';
        $this->repository = $wallet;
    }
}
