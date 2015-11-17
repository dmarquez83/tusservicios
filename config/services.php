<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => '',
        'secret' => '',
    ],

    'mandrill' => [
        'secret' => '',
    ],

    'ses' => [
        'key' => '',
        'secret' => '',
        'region' => 'us-east-1',
    ],

    'stripe' => [
        'model'  => App\User::class,
        'key' => '',
        'secret' => '',
    ],

   'facebook' => [
        'client_id' => '930009043742121',
        'client_secret' => 'eb093737d05fa783de7e03186c6ce97c',
        'redirect' => 'http://backservicios.com/login/facebook',
   ],

   'twitter' => [
        'client_id' => '9y7rYZDPeNPkdAHMYqPlIADoC',
        'client_secret' => 'huqbEmRGClaXtFesvVwEIB7WwPOj1QRtPRarPromc7YR1UmqVN',
        'redirect' => 'http://backservicios.com/login/twitter',
   ],

   'google' => [
        'client_id' => '457551230680-e3vfbqh2olinvaicqbgdp1tnc191dg66.apps.googleusercontent.com ',
        'client_secret' => 'ryWQhrC9da22mYzdwBAv-zLo',
        'redirect' => 'http://backservicios.com/login/google',
   ],

];
