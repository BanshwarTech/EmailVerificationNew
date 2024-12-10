<?php

namespace App\Services;

use GuzzleHttp\Client;

class CurrencyService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function getExchangeRates($baseCurrency = 'USD')
    {
        $url = config('services.exchange_rate.url');
        $apiKey = config('services.exchange_rate.key');

        try {
            $response = $this->client->get($url, [
                'query' => [
                    'base' => $baseCurrency,
                    'apikey' => $apiKey,
                ]
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            return [
                'error' => $e->getMessage(),
            ];
        }
    }

    public function convertAmount($amount, $fromCurrency, $toCurrency)
    {
        $rates = $this->getExchangeRates($fromCurrency);

        if (isset($rates['error'])) {
            return ['error' => $rates['error']];
        }

        if (!isset($rates['rates'][$toCurrency])) {
            return ['error' => 'Target currency rate not found.'];
        }

        $rate = $rates['rates'][$toCurrency];
        $convertedAmount = $amount * $rate;

        return [
            'rate' => $rate,
            'convertedAmount' => $convertedAmount,
        ];
    }
}
