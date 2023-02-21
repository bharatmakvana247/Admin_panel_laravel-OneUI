<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'google' => [
        'client_id' => env('GOOGLE_CLIENT_ID', '407512686161-ppjbu76h3st5ofmhu0n2er1m9asckkid.apps.googleusercontent.com'),
        'client_secret' => env('GOOGLE_CLIENT_SECRET', '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'),
        'redirect' => 'http://127.0.0.1:8000/admin/authorized/google/callback',
    ],

    'facebook' => [
        'client_id' => env('FACEBOOK_CLIENT_ID', '1152751592070349'),
        'client_secret' => env('FACEBOOK_CLIENT_SECRET', '1763fe82bb2baa6342b9b57ef13aa74d'),
        'redirect' => 'https://127.0.0.1:8000/admin/authorized/facebook/callback',
    ],

    'github' => [
        'client_id' =>  env('GITHUB_CLIENT_ID', 'a0550045595afd3e92cd'),
        'client_secret' =>  env('GITHUB_CLIENT_SECRET', '60a548d656ab0cfd2958d831de59ba687bebf7bc'),
        'redirect' => 'http://127.0.0.1:8000/admin/authorized/github/callback',
    ],

    'linkedin' => [
        'client_id' =>  env('LINKEDIN_CLIENT_ID', '78r0mx0vpknw2m'),
        'client_secret' => env('LINKEDIN_CLIENT_SECRET', 'XFHdBMbdk3RcRL5B'),
        'redirect' => 'http://127.0.0.1:8000/admin/authorized/linkedin/callback',
    ],
];
