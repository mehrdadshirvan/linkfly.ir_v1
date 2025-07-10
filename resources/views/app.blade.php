<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title inertia>{{ config('app.name', 'LinkFly') }}</title>

        <link rel="icon" href="{{ asset('/assets/images/linkfly-logo-1x1-64.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('/assets/images/linkfly-logo-1x1-64.png') }}">
        <link rel="apple-touch-icon-precomposed" href="{{ asset('/assets/images/linkfly-logo-1x1-64.png') }}">
        <meta name="description" content="سرویس رایگان کوتاه‌کننده لینک با قابلیت ساخت لینک‌های سفارشی،QrCode رایگان و  بدون تبلیغ. لینک‌های بلند را به لینک‌های ساده و سریع تبدیل کن و راحت به اشتراک بگذار! مناسب شبکه‌های اجتماعی، پیام‌رسان‌ها و وب‌سایت‌ها." class="">
        <link rel="canonical" href="{{ url()->current() }}">
        <meta name="robots" content="index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1">
        <meta name="twitter:card" content="summary_large_image">
        <meta property="og:site_name" content="LinkFly" class="yoast-seo-meta-tag">


        <!-- Scripts -->
        @routes
        @viteReactRefresh
        @vite(['resources/js/app.tsx', "resources/js/Pages/{$page['component']}.tsx"])
        @inertiaHead
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
</html>
