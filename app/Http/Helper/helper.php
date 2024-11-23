<?php

use Illuminate\Support\Str;

if (!function_exists('generateEmployeeId')) {
    function generateEmployeeId($name)
    {
        // Step 1: Generate a random digit (0-9)
        $randomDigit = mt_rand(0, 9);

        // Step 2: Extract the first letter of the name and make it uppercase
        $firstLetter = strtoupper(substr($name, 0, 1));

        // Step 3: Get the current month in two digits (e.g., 01 for January)
        $month = date('m');

        // Step 4: Get the current year (e.g., 2024)
        $year = date('Y');

        // Step 5: Generate two random digits (00-99)
        $randomTwoDigits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);

        // Step 6: Combine all parts to form the employee ID
        $employeeId = $randomDigit . $firstLetter . $month . $year . $randomTwoDigits;

        // Return the generated employee ID
        return $employeeId;
    }
}

if (!function_exists('generatePassword')) {
    function generatePassword($length = 8)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $password = '';
        $charactersLength = strlen($characters);

        for ($i = 0; $i < $length; $i++) {
            $password .= $characters[rand(0, $charactersLength - 1)];
        }

        return $password;
    }

}

if (!function_exists('generateClientId')) {
    function generateClientId($name)
    {
        // Step 1: Generate a random digit (0-9)
        $randomDigit = mt_rand(0, 9);

        // Step 2: Extract the first letter of the name and make it uppercase
        $firstLetter = strtoupper(substr($name, 0, 1));

        // Step 3: Get the current month in two digits (e.g., 01 for January)
        $month = date('m');

        // Step 4: Get the current year (e.g., 2024)
        $year = date('Y');

        // Step 5: Generate two random digits (00-99)
        $randomTwoDigits = str_pad(mt_rand(0, 99), 2, '0', STR_PAD_LEFT);

        // Step 6: Combine all parts to form the employee ID
        $employeeId = $randomDigit . $firstLetter . $month . $year . $randomTwoDigits;

        // Return the generated employee ID
        return $employeeId;
    }
}
