<?php

namespace App\Http\Middleware;

use App\Services\UserService;
use Closure;
use Illuminate\Http\Request;

class RoutePermission
{
    protected $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $action = $request->route()->action;

        $this->service->checkPermission(
            $request->user(),
            $action['as'] ?? $this->getRouteName($action)
        );

        return $next($request);
    }

    protected function getRouteName(array $action):string
    {
        $name = $action['controller'] ?? $action['uses'];

        return substr($name, (strrpos($name, '@')+1));
    }
}
