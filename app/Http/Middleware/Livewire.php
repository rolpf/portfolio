<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Livewire
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if ($request->has('serverMemo')) {
            $serverMemo = $request->get('serverMemo');
            if (isset($serverMemo['data']['query'])) {
                $mountQuery = ! is_array($serverMemo['data']['query']) ? json_decode($serverMemo['data']['query'], true) : $serverMemo['data']['query'];
                if (empty($mountQuery)) {
                    $mountQuery = [
                        'post_type' => 'page',
                        'page_id' => get_option('page_on_front'),
                    ];
                }
                $GLOBALS['wp_query'] = new \WP_Query((array) $mountQuery);
            } else {
                throw new \Exception('Query args not found in component data');
            }
        }

        return $next($request);
    }
}

