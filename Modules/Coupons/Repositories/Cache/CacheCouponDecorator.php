<?php

namespace Modules\Coupons\Repositories\Cache;

use Modules\Coupons\Repositories\CouponRepository;
use Modules\Core\Repositories\Cache\BaseCacheDecorator;

class CacheCouponDecorator extends BaseCacheDecorator implements CouponRepository
{
    public function __construct(CouponRepository $coupon)
    {
        parent::__construct();
        $this->entityName = 'coupons.coupons';
        $this->repository = $coupon;
    }
}
