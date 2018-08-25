<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Spatie\Menu\Laravel\Link;
use Spatie\Menu\Laravel\Menu;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Menu::macro('sidebar', function () {
            $menu = Menu::new()
                    ->addClass('nav')
                    ->setActiveClassOnLink()
                    ->add(Link::toUrl('/', 'Dashboard')->addParentClass('nav-item')->addClass('nav-link'))
                    ->submenu('<a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-users"></i> Users</a>', function (Menu $menu) {
                        $menu
                            ->addParentClass('nav-dropdown')
                            ->addClass('nav-dropdown-items')
                            ->addItemClass('nav-link')
                            ->addItemParentClass('nav-item')
                            ->route('admin.users.index', 'View Users')
                            ->route('admin.roles.index', 'View Roles');
                    })
                    ->submenu('<a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-building"></i> Championships</a>', function (Menu $menu) {
                        $menu->addParentClass('nav-dropdown')
                                ->addClass('nav-dropdown-items')
                                ->addItemClass('nav-link')
                                ->addItemParentClass('nav-item')
                                ->route('admin.championships.index', 'View Events')
                                ->route('admin.categories.index', 'View Categories');
                    })
                    ->submenu('<a class="nav-link nav-dropdown-toggle" href="#"><i class="fas fa-building"></i> Academies</a>', function (Menu $menu) {
                        $menu->addParentClass('nav-dropdown')
                                ->addClass('nav-dropdown-items')
                                ->addItemClass('nav-link')
                                ->addItemParentClass('nav-item')
                                ->route('admin.academies.index', 'View Academies');
                    });

            return $menu;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
