<?php

namespace Modules\Banner\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterBannerSidebar implements \Maatwebsite\Sidebar\SidebarExtender
{
    /**
     * @var Authentication
     */
    protected $auth;

    /**
     * @param Authentication $auth
     *
     * @internal param Guard $guard
     */
    public function __construct(Authentication $auth)
    {
        $this->auth = $auth;
    }

    public function handle(BuildingSidebar $sidebar)
    {
        $sidebar->add($this->extendWith($sidebar->getMenu()));
    }

    /**
     * @param Menu $menu
     * @return Menu
     */
    public function extendWith(Menu $menu)
    {
        $menu->group(trans('core::sidebar.content'), function (Group $group) {
            $group->item(trans('banner::banners.title.banners'), function (Item $item) {
                $item->icon('fa fa-image');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('banner::banners.title.banners'), function (Item $item) {
                    $item->icon('fa fa-image');
                    $item->weight(0);
                    $item->append('admin.banner.banner.create');
                    $item->route('admin.banner.banner.index');
                    $item->authorize(
                        $this->auth->hasAccess('banner.banners.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
