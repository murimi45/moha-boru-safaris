<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Company Contact Details
    |--------------------------------------------------------------------------
    |
    | Single source for the details shown on the contact page, in the footer
    | and on the "ask a question" buttons across the site. Update them here
    | once rather than hunting through Blade files.
    |
    */

    'phone_display' => '+254 712 840 452',
    'phone_link' => '+254712840452',

    // Digits only, international format, no plus sign — required by wa.me
    'whatsapp' => '254712840452',

    'email' => 'info@mohaborusafaris.co.ke',

    'address' => [
        'line1' => 'Moha Boru Safaris Limited',
        'line2' => 'Nairobi',
        'line3' => 'Kenya',
    ],

    'hours' => [
        ['days' => 'Monday – Friday', 'time' => '8:00am – 6:00pm'],
        ['days' => 'Saturday', 'time' => '9:00am – 2:00pm'],
        ['days' => 'Sunday & public holidays', 'time' => 'On call for travelling guests'],
    ],

    'socials' => [
        ['label' => 'Instagram', 'icon' => 'bi-instagram', 'url' => 'https://www.instagram.com/mohaborusafaris'],
        ['label' => 'Facebook', 'icon' => 'bi-facebook', 'url' => 'https://www.facebook.com/boru.moha.2025'],
        ['label' => 'TikTok', 'icon' => 'bi-tiktok', 'url' => 'https://www.tiktok.com/@mohaborusafaris'],
        ['label' => 'Xiaohongshu', 'icon' => 'bi-bookmark-heart', 'url' => 'https://xhslink.cn/m/4tolu5kmgIp'],
    ],

    // Working Google Maps embed for Nairobi (open embed — no API key required)
    'map_embed' => 'https://maps.google.com/maps?q=Nairobi%2C%20Kenya&hl=en&z=13&output=embed',

];
