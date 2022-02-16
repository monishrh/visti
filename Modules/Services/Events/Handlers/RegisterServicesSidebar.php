<?php

namespace Modules\Services\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterServicesSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Fuel'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('Fuel'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.services.service.create');
                    $item->route('admin.services.service.index');
                    $item->authorize(
                        $this->auth->hasAccess('services.services.index')
                    );
                });
                $item->item(trans('NewBookings'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                      $id=0;
                    // $item->append('admin.services.bookingnew.create');
                    $item->route('admin.services.bookingnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('services.bookingnews.index')
                    );
                });
                  $item->item(trans('Assigned'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                     $id=1;
                    // $item->append('admin.services.bookingong.create');
                    $item->route('admin.services.bookingnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('services.bookingongs.index')
                    );
                });
                $item->item(trans('Ongoing'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                     $id=2;
                    // $item->append('admin.services.bookingong.create');
                    $item->route('admin.services.bookingnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('services.bookingongs.index')
                    );
                });
                $item->item(trans('Completed'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                     $id=3;
                    // $item->append('admin.services.bookingcom.create');
                    $item->route('admin.services.bookingnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('services.bookingcoms.index')
                    );
                });
                  $item->item(trans('Cancelled'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                     $id=4;
                    // $item->append('admin.services.bookingcom.create');
                    $item->route('admin.services.bookingnew.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('services.bookingcoms.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
