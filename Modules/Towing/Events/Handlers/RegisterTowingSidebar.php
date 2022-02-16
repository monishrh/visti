<?php

namespace Modules\Towing\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterTowingSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Towing'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Setting'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(1);
                    $item->append('admin.towing.towingt.create');
                    $item->route('admin.towing.towingt.index');
                    $item->authorize(
                        $this->auth->hasAccess('towing.towingts.index')
                    );
                });
                $item->item(trans('New Bookings'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(2);
                      $id=0;
                    $item->route('admin.towing.tnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('towing.tnews.index')
                    );
                });
                  $item->item(trans('Assigned'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(3);
                     $id=1;
                    $item->route('admin.towing.tnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('towing.tongs.index')
                    );
                });
                $item->item(trans('Completed'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(3);
                     $id=2;
                    $item->route('admin.towing.tnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('towing.tongs.index')
                    );
                });
               
                $item->item(trans('Cancelled'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(5);
                     $id=4;
                    $item->route('admin.towing.tnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('towing.tcans.index')
                    );
                });
                $item->item(trans('Vendors'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $item->append('admin.towing.tvendors.create');
                    $item->route('admin.towing.tvendors.index');
                    $item->authorize(
                        $this->auth->hasAccess('towing.tvendors.index')
                    );
                });
// append






            });
        });

        return $menu;
    }
}
