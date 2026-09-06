<?php

// config/cors.php
return [
    'paths' => ['api/*', 'uploads/*', 'sanctum/csrf-cookie'], // uploads পাথটি এখানে দিন
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'], // অথবা আপনার ফ্রন্টএন্ড URL যেমন 'http://localhost:3000'
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => ['Content-Disposition'], // এটি ফাইল ডাউনলোডে সাহায্য করে
    'max_age' => 0,
    'supports_credentials' => true,
];
