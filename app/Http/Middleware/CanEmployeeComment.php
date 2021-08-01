<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Form;

class CanEmployeeComment
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
        $user = $request->user();

        if ($user && $user->hasRole('customer') && $request->form_id) {

            $form = $user->forms()->select('user_id', 'comment_disable_time')->find($request->form_id);

            if (now()->gt($form->comment_disable_time)) {

                flashMessage('Your Comments time is over.');

                return redirect()->back();
            }
        }
        return $next($request);
    }
}
