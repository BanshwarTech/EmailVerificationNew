<?php

namespace App\Http\Controllers;

use App\Services\CurrencyService;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    protected $currencyService;

    public function __construct(CurrencyService $currencyService)
    {
        $this->currencyService = $currencyService;
    }
    public function showRates()
    {
        return view('convert');
    }
    public function convert(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0',
            'from_currency' => 'required|string|size:3',
            'to_currency' => 'required|string|size:3',
        ]);

        $amount = $request->input('amount');
        $fromCurrency = $request->input('from_currency');
        $toCurrency = $request->input('to_currency');

        $conversion = $this->currencyService->convertAmount($amount, $fromCurrency, $toCurrency);

        if (isset($conversion['error'])) {
            return view('convert', ['error' => $conversion['error']]);
        }

        return view('convert', [
            'amount' => $amount,
            'from_currency' => $fromCurrency,
            'to_currency' => $toCurrency,
            'convertedAmount' => $conversion['convertedAmount'],
            'rate' => $conversion['rate']
        ]);
    }
}
