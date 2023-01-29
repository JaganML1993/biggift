<?php

namespace App\Http\Controllers;

use App\Models\microsite\Micro;
use App\Models\microsite\MicroCompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class MicroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('microsite.index');
    }

    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $check_fail = array_merge($credentials, ['active' => 0]);
        $check_success = array_merge($credentials, ['active' => 1]);

        if (Auth::guard('micro_users')->attempt($check_fail)) {
            return back()->withErrors([
                'other' => 'Your status in In Active',
            ]);
        }

        $email_array = explode('@', $request->email);
        $domain = $email_array[1];
        $domain_exists = 0;
        if($domain){
            $domain_exists = MicroCompany::select('*')->where('domain', $domain)->where('approval', 1)->where('status', 1)->first();
        }

        if(empty($domain_exists)){
            return back()->withErrors([
                'other' => 'Please enter your email with valid domain.',
            ]);
        }
 
        if (Auth::guard('micro_users')->attempt($check_success)) {
            $request->session()->regenerate();

            $company =  strtolower(str_replace(' ', '-', $domain_exists->company));
            $company = preg_replace('/[^A-Za-z0-9\-]/', '', $company);
            $products_url = $company.'/gifts/'.$domain_exists->id;
            return redirect()->intended($products_url);
        }
 
        return back()->withErrors([
            'other' => 'The provided credentials do not match our records.',
        ]);
    }

    public function products($id){
        dd($id);
        return view('microsite.products');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Micro  $micro
     * @return \Illuminate\Http\Response
     */
    public function show(Micro $micro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Micro  $micro
     * @return \Illuminate\Http\Response
     */
    public function edit(Micro $micro)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Micro  $micro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Micro $micro)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Micro  $micro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Micro $micro)
    {
        //
    }


}
