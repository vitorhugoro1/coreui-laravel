<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Routing\Route;
use Symfony\Component\Console\Input\InputOption;

class RouteSummaryCommand extends RouteListCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'route:summary';
    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Summary of all registered routes';
    /**
     * The table headers for the command.
     *
     * @var array
     */
    protected $headers = ['Method', 'URI', 'Name'];
    /**
     * Get the route information for a given route.
     *
     * @param  \Illuminate\Routing\Route  $route
     * @return array
     */
    protected function getRouteInformation(Route $route)
    {
        return $this->filterRoute([
            'method' => implode('|', $route->methods()),
            'uri'    => $route->uri(),
            'name'   => $route->getName(),
        ]);
    }
}
