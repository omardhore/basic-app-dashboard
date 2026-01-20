<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Notifications\TwoFactorCode;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    public function index()
    {
        return view('auth.two_factor');
    }

    public function store(Request $request)
    {
        $request->validate([
            'two_factor_code' => 'required|integer',
        ]);

        $user = auth()->user();

        if ($request->input('two_factor_code') == $user->two_factor_code) {
            $user->resetTwoFactorCode();
            session(['user_2fa' => auth()->id()]);
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors(['two_factor_code' => 'The two factor code you have entered does not match']);
    }

    public function resend()
    {
        $user = auth()->user();
        $user->generateTwoFactorCode();
        // Since we are using Mailable in this plan, we should use Mail facade, but for now let's assume the notification logic is handled 
        // Wait, the plan said Mailable. I should align with that.
        // Let's stick to the plan: helper method generates code, middleware/controller sends it.

        \Mail::to($user)->send(new \App\Mail\TwoFactorCode($user->two_factor_code));

        return redirect()->back()->with('message', 'The two factor code has been sent again');
    }
    public function update(Request $request)
    {
        $user = auth()->user();
        $user->two_factor_enabled = !$user->two_factor_enabled;
        $user->save();

        return redirect()->back()->with('status', 'Two factor authentication status updated.');
    }
}
