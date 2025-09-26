<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Otp extends Model
{
    use HasFactory;

    protected $fillable = [
        'contact',
        'otp',
        'type',
        'expires_at',
        'verified',
    ];

    protected $casts = [
        'expires_at' => 'datetime',
        'verified' => 'boolean',
    ];

    /**
     * Generate and store a new OTP
     */
    public static function generate(string $contact, string $type = 'email', int $length = 6, int $validMinutes = 10): self
    {
        $otpCode = str_pad(rand(0, pow(10, $length) - 1), $length, '0', STR_PAD_LEFT);

        return self::create([
            'contact' => $contact,
            'otp' => $otpCode,
            'type' => $type,
            'expires_at' => Carbon::now()->addMinutes($validMinutes),
            'verified' => false,
        ]);
    }

    /**
     * Verify the OTP
     */
    public static function verify(string $contact, string $otp): bool
    {
        $record = self::where('contact', $contact)
            ->where('otp', $otp)
            ->where('verified', false)
            ->where('expires_at', '>', Carbon::now())
            ->latest()
            ->first();

        if ($record) {
            $record->update(['verified' => true]);
            return true;
        }

        return false;
    }
}
