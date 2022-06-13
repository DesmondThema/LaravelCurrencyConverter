<?php

namespace App\Http\Controllers;

use App\Models\CurrencyConversionHistory;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $userRates = CurrencyConversionHistory::latest()
            ->where('user_id', $userId)
            ->get();

        return view('historical_rates', [
            'rates' => $userRates,
        ]);
    }
}
