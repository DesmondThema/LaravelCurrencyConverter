<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use AmrShawky\LaravelCurrency\Facade\Currency;
use App\Models\CurrencyConversionHistory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CurrencyController extends Controller
{
    public function index()
    {
        $currencies = Currency::rates()
            ->latest()
            ->get();

        return view('index', [
            'currencies' => $currencies
        ]);
    }

    /**
     * Convert choosen currency
     *
     * @param Request $request
     * @return void
     */
    public function convert(Request $request)
    {
        $request->validate([
            'amount' => 'numeric|min:0',
            'from' => 'required',
            'to' => 'required'
        ]);

        $convertedCurrency = Currency::convert()
            ->from($request->from)
            ->to($request->to)
            ->amount($request->amount)
            ->round(2)
            ->get();

        CurrencyConversionHistory::create([
            'user_id' => Auth::user()->id ?? null,
            'from' => $request->from,
            'to' => $request->to,
            'amount' => $request->amount,
            'conversion_rate' => $convertedCurrency
        ]);

        $converted = $request->amount . ' ' . $request->from . ' '. ' = ' . $convertedCurrency . ' ' . $request->to;

        return back()->with([
            'converted_rate' => $converted,
            'amount' => $request->amount,
            'from' => $request->from,
            'to' => $request->to,
        ]);   
    }
}
