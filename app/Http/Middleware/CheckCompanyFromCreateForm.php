<?php

namespace App\Http\Middleware;

use Closure;

class CheckCompanyFromCreateForm
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $request['logo'] = $request->get('name') . '_logo.' . $request->file('logo')->getClientOriginalExtension();
        return $next($request);
    }
}
