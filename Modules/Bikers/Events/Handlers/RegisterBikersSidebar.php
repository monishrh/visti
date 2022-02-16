<?php

namespace Modules\Bikers\Events\Handlers;

use Maatwebsite\Sidebar\Group;
use Maatwebsite\Sidebar\Item;
use Maatwebsite\Sidebar\Menu;
use Modules\Core\Events\BuildingSidebar;
use Modules\User\Contracts\Authentication;

class RegisterBikersSidebar implements \Maatwebsite\Sidebar\SidebarExtender
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
            $group->item(trans('bikers::bikers.title.bikers'), function (Item $item) {
                $item->icon('fa fa-bicycle');
                $item->weight(10);
                $item->authorize(
                     /* append */
                );
                $item->item(trans('bikers::bikers.title.bikers'), function (Item $item) {
                    $item->icon('fa fa-bicycle');
                    $item->weight(0);
                    $item->append('admin.bikers.biker.create');
                    $item->route('admin.bikers.biker.index');
                    $item->authorize(
                        $this->auth->hasAccess('bikers.bikers.index')
                    );
                });
// append

            });
        });

        return $menu;
    }
}
