<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'nama_customer' => ['required', 'string', 'max:255'],
            'email_customer' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Customer::class],
            'telp_customer' => ['required', 'string', 'max:15'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $name = $request->nama_customer;
        $email = $request->email_customer;
        $phone = $request->telp_customer;
        $password = Hash::make($request->password);

        DB::insert('insert into customer (nama_customer, email_customer, telp_customer, password) values (?, ?, ?, ?)', [$name, $email, $phone, $password]);

        $stdUser = DB::select('select * from customer where email_customer = ?', [$email])[0];

        $user = new Customer;
        $user->setRawAttributes((array)$stdUser);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
