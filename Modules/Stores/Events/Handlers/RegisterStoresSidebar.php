<?php

namespace Modules\Stores\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterStoresSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('stores::stores.title.stores'), function (Item $item) {
                $item->icon('fa fa-wrench');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('stores::stores.title.stores'), function (Item $item) {
                    $item->icon('fa fa-wrench');
                    $item->weight(0);
                    $item->append('admin.stores.stores.create');
                    $item->route('admin.stores.stores.index');
                    $item->authorize(
                        $this->auth->hasAccess('stores.stores.index')
                    );
                });
                $item->item(trans('stores::reviews.title.reviews'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.stores.reviews.create');
                    $item->route('admin.stores.reviews.index');
                    $item->authorize(
                        $this->auth->hasAccess('stores.reviews.index')
                    );
                });
// append


            });
        });

        return $menu;
    }
}
