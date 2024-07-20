<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

$CI = &get_instance();

if (!function_exists('decode_form_data')) {
    function decode_form_data($param)
    {
        // Your custom functionality here
        $decodedData = urldecode($param);
        $pairs = explode('&', $decodedData);

        $formData = [];
        foreach ($pairs as $pair) {
            list($key, $value) = explode('=', $pair);
            $formData[$key] = $value;
        }
        return $formData;
    }
}

if (!function_exists('generate_unique_id')) {
    function generate_unique_id()
    {
        return md5(microtime() . rand());
    }
}

if (!function_exists('generate_random_code')) {
    function generate_random_code($length = 3): string
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        $randomCode = '';
        for ($i = 0; $i < $length; $i++) {
            $randomCode .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randomCode;
    }
}

if (!function_exists('server_date')) {
    function server_date()
    {
        global $CI;
        $res = $CI->db->query('SELECT NOW() as s_date;');
        if ($res) {
            return $res->row()->s_date;
        }
        return date('Y-m-d H:i:s');
    }
}

if (!function_exists('is_contact_number_valid')) {
    function is_contact_number_valid($phone)
    {
        // Define a regular expression for a simple 10-digit phone number
        $pattern = '/^9\d{9}$/';

        // Use preg_match to test if the number matches the pattern
        if (preg_match($pattern, $phone)) {
            return true; // Valid number
        } else {
            return false; // Invalid number
        }
    }
}

if (!function_exists('status_list')) {
    function status_list($str='')
    {
        $status = [
            'Pending',
            'Approved',
            'Disapproved',
            'Check-In',
            'Check-Out',
        ];
        return isset($status[$str])?$status[$str]:$status;
    }
}

if (!function_exists('status_badge')) {
    function status_badge($str)
    {
        $badge = [
            'Pending' => 'badge-warning',
            'Approved' => 'badge-success',
            'Disapproved' => 'badge-danger',
            'Check-In' => 'badge-info',
            'Check-Out' => 'badge-danger',
        ];
        return $badge[$str];
    }
}
