<?php

namespace App\Http\Responses;

use Laravel\Fortify\Contracts\LogoutResponse as LogoutResponseContract;

class LogoutResponse implements LogoutResponseContract
{

    /**
     * toResponse
     *
     * @param  mixed $request
     * @return void
     */
    public function toResponse($request)
    {
        if ($request->role == 'admin') { // Assuming you want to check for 'admin' role or adjust as needed
            return redirect('/login');
        } else {
            return redirect('/user/login');
        }

    }
}
