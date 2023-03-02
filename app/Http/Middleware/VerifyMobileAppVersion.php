<?php

namespace App\Http\Middleware;


use Closure;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpKernel\Exception\HttpException;

class VerifyMobileAppVersion
{

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     * @throws
     */
    public function handle($request, Closure $next)
    {
        $minimumAllowedVersion = 2;
        $versionBranch = $request->header("Version-Branch");
        $versionNumber = $request->header("Version-Number");
        $NativeMobile = $request->header("Native-Mobile");
        $platform = $request->header("Platform");
            if ($versionBranch < $minimumAllowedVersion ){
                abort(403, "Obsolete version");

//            throw new HttpException(403, "Obsolete version");
            }



        return $next($request);
    }
}
