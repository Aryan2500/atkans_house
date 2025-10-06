<?php

use Illuminate\Support\Facades\Http;

if (!function_exists('generateUpiQrBase64')) {
    /**
     * Generate Base64 encoded UPI payment QR code.
     *
     * @param  string  $upiId  Receiver's UPI ID (e.g. arun@ybl)
     * @param  string  $name   Payee name (optional)
     * @param  float|null  $amount  Payment amount (optional)
     * @param  string|null  $note  Payment note (optional)
     * @return string  Base64 encoded QR code image
     */
    function generateUpiQrBase64($upiId, $amount = null)
    {
        $params = [
            'pa' => $upiId,
            'pn' => 'Atkans House',
            'cu' => 'INR',
        ];

        if ($amount) {
            $params['am'] = $amount;
        }



        // Build UPI URL
        $upiUrl = 'upi://pay?' . http_build_query($params);

        $response = Http::post('http://localhost:5000/generate-qr', [
            'upiId' => $upiId,
            'name' => 'Atkans House',
            'amount' => $amount,

        ]);

        if ($response->successful()) {
            $data = $response->json();
            $qrBase64 = $data['base64']; // Base64 string
            $upiUrl = $data['upi_url'];

            return [
                'base64' => $qrBase64,
                'upi_url' => $upiUrl,
            ];
        }

        return [
            'base64' => null,
            'upi_url' => null,
        ];
    }
}
