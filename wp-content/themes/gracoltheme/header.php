<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Google tag (gtag.js) -->
    <!-- <script async src="https://www.googletagmanager.com/gtag/js?id=G-CMB7GDF0VV"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-CMB7GDF0VV');
    </script> -->

    <!-- Facebook Pixel Code -->
    <!-- <script>
        ! function(f, b, e, v, n, t, s) {
            if (f.fbq) return;
            n = f.fbq = function() {
                n.callMethod ?
                    n.callMethod.apply(n, arguments) : n.queue.push(arguments)
            };
            if (!f._fbq) f._fbq = n;
            n.push = n;
            n.loaded = !0;
            n.version = '2.0';
            n.queue = [];
            t = b.createElement(e);
            t.async = !0;
            t.src = v;
            s = b.getElementsByTagName(e)[0];
            s.parentNode.insertBefore(t, s)
        }(window, document, 'script',
            'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '1267190214169542');
        fbq('track', 'PageView');
    </script>
    <noscript>
        <img height="1" width="1" src="https://www.facebook.com/tr?id=1267190214169542&ev=PageView
&noscript=1" />
    </noscript> -->
    <!-- End Facebook Pixel Code -->

    <?php wp_head(); ?>
</head>

<body class="w-full bg-whiteG">
    <?= get_template_part('components/navigation/navBar') ?>
    <?= get_template_part('components/navigation/mobile', 'tabBar') ?>
    <?= get_template_part('components/navigation/mobile', 'sidebar') ?>
    <?php
    wp_body_open();
    ?>