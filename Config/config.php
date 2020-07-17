<?php

return [
    'name' => 'Core',
    'page_name' => env('PAGINATION_PAGE_NAME', 'page'),
    'per_page_name' => env('PAGINATION_PER_PAGE_NAME', 'per_page'),
    'per_page_number' => env('PAGINATION_PER_PAGE_NUM', 10),
    'session_success' => 'success',
    'session_error' => 'error',
    'session_locale' => 'applocale',
];
