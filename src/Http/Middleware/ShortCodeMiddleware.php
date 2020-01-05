<?php

namespace DesignByCode\Admin\Http\Middleware;

use Closure;
use Illuminate\Database\Eloquent\Model;

class ShortCodeMiddleware
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
        $response =  $next($request);

        if(!method_exists($response, 'content')) {
            return $response;
        }
        $content = str_replace('<!--[short_hello]-->', 'Hello world', $response->content() );
        $response->setContent($content);
        return $response;

    }

    protected function galleryReplace(Gallery $gallery)
    {

    }
}
