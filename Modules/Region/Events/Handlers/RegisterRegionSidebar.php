<?php

namespace Modules\Region\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterRegionSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Region'), function (Item $item) {
                $item->icon('fa fa-feed');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('region::cities.title.cities'), function (Item $item) {
                    $item->icon('fa fa-feed');
                    $item->weight(0);
                    $item->append('admin.region.city.create');
                    $item->route('admin.region.city.index');
                    $item->authorize(
                        $this->auth->hasAccess('region.cities.index')
                    );
                });
                $item->item(trans('region::areas.title.areas'), function (Item $item) {
                    $item->icon('fa fa-feed');
                    $item->weight(0);
                    $item->append('admin.region.area.create');
                    $item->route('admin.region.area.index');
                    $item->authorize(
                        $this->auth->hasAccess('region.areas.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
