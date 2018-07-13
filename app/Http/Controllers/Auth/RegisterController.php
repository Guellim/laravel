<?php

namespace App\Http\Controllers\Auth;

use App\Repositories\UserRepository;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Mail\Welcome;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'firstName' => 'required|string',
            'lastName' => 'required|string',
            'mobile' => 'required|numeric|min:6',
            'birthday' => 'required|date',
            'gender' => 'required|in:male,female',
            'activation' => 'boolean',
        ]);
    }


    protected function create(array $data)
    {
        $user = new User();
        $user->fill($data);
        //dd($user);
        //dd($user->getAttribute('password'));
        $password = $user->getAttribute('password');
        \Mail::to($user)->send(new Welcome($password));

        $repository = new UserRepository($user);
        return $repository->create($data);
    }
}
