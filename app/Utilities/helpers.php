
<?php

use Carbon\Carbon;

if (!function_exists('parse_date')) {
    function parse_date($date, $format)
    {
        return Carbon::parse($date)->format($format); 
    }
}
