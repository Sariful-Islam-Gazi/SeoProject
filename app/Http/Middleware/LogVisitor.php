<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Visitor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Jenssegers\Agent\Agent;
use Stevebauman\Location\Facades\Location;

class LogVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $agent = new Agent();
        $location = Location::get($ip);
        // $pageName = $request->route() ? $request->route()->getName() : $request->path();
        $pageName = $request->fullUrl();

        if ($location) {
            if (!Visitor::where('ip', $ip)->whereDate('created_at', today())->exists()) {
                Visitor::create([
                    'ip'            => $ip,
                    'browser'       => $agent->browser(),
                    'device'        => $agent->device(),
                    'platform'      => $agent->platform(),
                    'page'          => $pageName,
                    'country_name'  => $location->countryName ?? null,
                    'country_code'  => $location->countryCode ?? null,
                    'region_name'   => $location->regionName ?? null,
                    'region_code'   => $location->regionCode ?? null,
                    'city'          => $location->cityName ?? null,
                    'pin_code'      => $location->postalCode ?? null,
                    'latitude'      => $location->latitude ?? null,
                    'longitude'     => $location->longitude ?? null,
                ]);
            }
        } else {
            if (!Visitor::where('ip', $ip)->whereDate('created_at', today())->exists()) {
                Visitor::create([
                    'ip'            => $ip,
                    'browser'       => $agent->browser(),
                    'device'        => $agent->device(),
                    'platform'      => $agent->platform(),
                    'page'          => $pageName,
                ]);
            }
        }
        return $next($request);
    }
}
