<?php

if ( ! function_exists('currency_format')) {
    function currency_format($amount)
    {
        return number_format($amount, 0, '', ',');
    }
}

if ( ! function_exists('format_date_time')) {
    function format_date_time($date)
    {
        $format = 'Y-m-d h:i a';

        return date($format, strtotime($date));
    }
}

if ( ! function_exists('wrap_long_text')) {
    function wrap_long_text($text)
    {
        return wordwrap($text, 100, "<br>");
    }
}
