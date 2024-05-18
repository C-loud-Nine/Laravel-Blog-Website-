<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User; // Import the User model

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Retrieve user ID from session
        $userId = session()->get('id');
        
        // Check if user ID exists
        if ($userId) {
            // Retrieve user from the database based on user ID
            $user = User::find($userId);
            
            // Check if the user exists and has the admin role
            if ( $user->type == 'Admin') {
                return $next($request);
            }

            abort(401);
        }

        // If user is not authenticated or is not an admin, abort with 401 Unauthorized
        abort(401);
    }
}
