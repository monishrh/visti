<?php

namespace Modules\Appusers\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterAppusersSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('appusers::appusers.title.appusers'), function (Item $item) {
                $item->icon('fa fa-users');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('appusers::appusers.title.appusers'), function (Item $item) {
                    $item->icon('fa fa-users');
                    $item->weight(0);
                    // $item->append('admin.appusers.appuser.create');
                    $item->route('admin.appusers.appuser.index');
                    $item->authorize(
                        $this->auth->hasAccess('appusers.appusers.index')
                    );
                });
                $item->item(trans('User Vehicles'), function (Item $item) {
                    $item->icon('fa fa-motorcycle');
                    $item->weight(0);
                    // $item->append('admin.appusers.uservehi.create');
                    $item->route('admin.appusers.uservehi.index');
                    $item->authorize(
                        $this->auth->hasAccess('appusers.uservehis.index')
                    );
                });
                $item->item(trans('Wallet Transaction'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                   $item->route('admin.appusers.wallet.index');
                    $item->authorize(
                        $this->auth->hasAccess('appusers.wallets.index')
                    );
                });
// append



            });
        });

        return $menu;
    }
}
