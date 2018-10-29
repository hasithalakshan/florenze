<?php

/*
 * |--------------------------------------------------------------------------
 * | florenze HIS
 * |--------------------------------------------------------------------------
 * |
 * | This is a proud development of ceynocta(pvt) Ltd.
 * | 
 * | Original sources of this product are property of ceynocta(pvt) Ltd
 * | and please maintain this licence header when modify or further develop
 * | this product.
 * 
 */

namespace Modules\User\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Redirect;
use Modules\User\Entities\User;
use Modules\General\Entities\Role;

class AuthController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @return Response
     * @author chamidhu
     */
    public function authenticate(Request $request)
    {

        
        
        $email=  \Modules\General\Entities\Email::find($request->email);
        $password=$request->password;
        if (Auth::attempt(array('user_id' => $email['user_id'], 'password' => $request->password))) {
            // Authentication passed...
            if (Auth::check() && (Auth::user()->disabled == 0)) {
                // The user is logged in...
                $user=User::find(Auth::user()->user_id);
                $roles=Role::all();
                foreach($roles as $role){
                    if(strcmp($user->role,$role->id)==0){
                        return Redirect::route($role->id);
                    }
                }
            }
            Auth::logout();
            \Illuminate\Support\Facades\Session::flash('message','attempt to login with disabled user');
            return redirect('/');
            
        }else{
            Auth::logout();
            \Illuminate\Support\Facades\Session::flash('message','Invalid credentials. Please check & Try again.');
            return redirect('/');
        }
    }
}