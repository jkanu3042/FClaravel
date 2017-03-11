<?php

namespace App\Http\Middleware;

use Closure;

class CheckHasFile
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
     public function handle($request, Closure $next, $field)
       {
          if ( ! $request->hasFile($field) || ! $request->file($field)->isValid())
          {
              return back()->withInput()->with('flash_message','파일이 첨부되지 않았다.');
          }

          return $next($request);
       }
}
