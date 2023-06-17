<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>

<body class="bg-whiteG w-full">
    <?= get_template_part('components/navigation/navBar') ?>
    <?= get_template_part('components/navigation/mobile', 'tabBar') ?>
    <?= get_template_part('components/navigation/mobile', 'sidebar') ?>
    <?php
    wp_body_open();
    ?>