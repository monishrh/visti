<?php

namespace Modules\Insurance\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterInsuranceSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('Insurance'), function (Item $item) {
                $item->icon('fa fa-copy');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('New Order'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                      $id=0;
                    $item->route('admin.insurance.newi.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('insurance.newis.index')
                    );
                });
                $item->item(trans('Ongoing'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                    $id=1;
                    $item->route('admin.insurance.newi.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('insurance.onis.index')
                    );
                });
                $item->item(trans('Completed'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                  $id=2;
                    $item->route('admin.insurance.newi.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('insurance.comis.index')
                    );
                });
                $item->item(trans('Cancelled'), function (Item $item) {
                    $item->icon('fa fa-copy');
                    $item->weight(0);
                   
                     $id=3;
                    $item->route('admin.insurance.newi.index',compact('id'));
                    $item->authorize(
                        $this->auth->hasAccess('insurance.canis.index')
                    );
                });
// append




            });
        });

        return $menu;
    }
}
