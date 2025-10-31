<?php
return [
    'frontend' => 'https://test-shop.local/',
    'backend' => 'https://admin.test-shop.local/',

    'images_dir' => '/frontend/web/uploads/images/',
    'images_url' => '/uploads/images/',

    'uploads_dir' => '/frontend/web/uploads/',
    'uploads_url' => '/uploads/',

    'large_image' => [
        'width' => 1900,
        'height' => 1080
    ],
    'medium_image'  => [
        'width' => 300,
        'height' => 0
    ],
    'small_image'  => [
        'width' => 100,
        'height' => 100
    ],

    'adminEmail' => 'admin@example.com',
    'supportEmail' => 'support@example.com',
    'senderEmail' => 'noreply@example.com',
    'senderName' => 'Example.com mailer',
    'user.passwordResetTokenExpire' => 3600,
    'user.passwordMinLength' => 8,

    'telegram' => [
        'botToken' => '8346965907:AAGluL2lMlNYGvzv9yfFexiqzQkBKAhJ6sQ',
        'chatId' => '7253897723',
    ],
];
