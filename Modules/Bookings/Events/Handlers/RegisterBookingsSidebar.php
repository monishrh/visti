<?php

namespace Modules\Bookings\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterBookingsSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Bookings'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('New Bookings'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.newbookings.create');
                    $id=0;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.newbookings.index')
                    );
                });
                $item->item(trans('Pick Up Assigned'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.accepted.create');
                      $id=1;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.accepteds.index')
                    );
                });
                $item->item(trans('Pickup Done'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.pickup.create');
                     $id=2;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.pickups.index')
                    );
                });
                $item->item(trans('Recieved at Store'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.pickupd.create');
                    $id=3;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.pickupds.index')
                    );
                });
                $item->item(trans('Ready for Delivery'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.rstore.create');
                    $id=4;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.rstores.index')
                    );
                });
                $item->item(trans('Delivery Assigned'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.rdel.create');
                     $id=5;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.rdels.index')
                    );
                });
                $item->item(trans('Out for delivery'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.delvrd.create');
                     $id=6;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.delvrds.index')
                    );
                });
                $item->item(trans('Delivered'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.canceled.create');
                    $id=7;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.canceleds.index')
                    );
                });
                 $item->item(trans('Cancelled'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    // $item->append('admin.bookings.canceled.create');
                    $id=8;
                    $item->route('admin.bookings.newbookings.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('bookings.canceleds.index')
                    );
                });
// append








            });
        });

        return $menu;
    }
}
