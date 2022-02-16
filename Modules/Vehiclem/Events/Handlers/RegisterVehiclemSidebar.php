<?php

namespace Modules\Vehiclem\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterVehiclemSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Vehicle Master'), function (Item $item) {
                $item->icon('fa fa-motorcycle');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('vehiclem::brands.title.brands'), function (Item $item) {
                    $item->icon('fa fa-gear');
                    $item->weight(0);
                    $item->append('admin.vehiclem.brand.create');
                    $item->route('admin.vehiclem.brand.index');
                    $item->authorize(
                        $this->auth->hasAccess('vehiclem.brands.index')
                    );
                });
                $item->item(trans('Model'), function (Item $item) {
                    $item->icon('fa fa-gears');
                    $item->weight(0);
                    $item->append('admin.vehiclem.bmodel.create');
                    $item->route('admin.vehiclem.bmodel.index');
                    $item->authorize(
                        $this->auth->hasAccess('vehiclem.bmodels.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
