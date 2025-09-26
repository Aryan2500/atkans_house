<?php

if (!function_exists('detectEmailOrPhone')) {
    /**
     * Detect whether the input string is an email or phone number
     *
     * @param string $input
     * @return string 'email' | 'phone' | 'invalid'
     */
    function detectEmailOrPhone(string $input): string
    {
        // Check if email
        if (filter_var($input, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }

        // Check if phone number (10-15 digits, optional +)
        if (preg_match('/^\+?\d{10,15}$/', $input)) {
            return 'phone';
        }

        return 'invalid';
    }
}
