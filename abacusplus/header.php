<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Abacus_Plus
 */
$header = get_field('header', 'option');
$taglines = $header['taglines'];
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <?php wp_head(); ?>
</head>
<header class="header">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-12 header__menuwrapper">
                <div class="header__logo">
                    <?php
                    $logo = $header['logo'];
                    if ($logo) : ?>
                        <img src="<?php echo esc_url($logo['url']); ?>" alt="<?php echo esc_attr($logo['alt']); ?>" class="header__logo-img img-fluid">
                    <?php endif; ?>
                </div>
                <!-- Hamburger Menu for Mobile -->
                <div class="hamburger-menu">
                    <svg width="24px" height="24px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" clip-rule="evenodd" d="M4 5C3.44772 5 3 5.44772 3 6C3 6.55228 3.44772 7 4 7H20C20.5523 7 21 6.55228 21 6C21 5.44772 20.5523 5 20 5H4ZM7 12C7 11.4477 7.44772 11 8 11H20C20.5523 11 21 11.4477 21 12C21 12.5523 20.5523 13 20 13H8C7.44772 13 7 12.5523 7 12ZM13 18C13 17.4477 13.4477 17 14 17H20C20.5523 17 21 17.4477 21 18C21 18.5523 20.5523 19 20 19H14C13.4477 19 13 18.5523 13 18Z" fill="#000000" />
                    </svg>
                </div>
                <div class="close-menu" style="display: none;">&times;</div>
                <nav class="header__nav">
                    <?php
                    wp_nav_menu(array(
                        'theme_location' => 'menu-1',
                        'menu_id'        => 'primary-menu',
                        'menu_class'     => 'header__menu',
                    ));
                    ?>
                    <div class="header__ctawrapper d-lg-none d-md-none">
                        <?php
                        $cta = $header['cta'];
                        if ($cta) : ?>
                            <a href="<?php echo esc_url($cta['url']); ?>" class="primary-button medium"><?php echo esc_html($cta['title']); ?></a>
                        <?php endif; ?>
                    </div>
                </nav>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-dn header__cta">
                <div class="header__ctawrapper">
                    <?php
                    $cta = $header['cta'];
                    if ($cta) : ?>
                        <a href="<?php echo esc_url($cta['url']); ?>" class="primary-button medium"><?php echo esc_html($cta['title']); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</header>
<body <?php body_class(); ?>>
    <?php wp_body_open(); ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const hamburger = document.querySelector('.hamburger-menu');
            const closeMenu = document.querySelector('.close-menu');
            const header = document.querySelector('.header');
            hamburger.addEventListener('click', function() {
                header.classList.toggle('menu-open');
                closeMenu.style.display = header.classList.contains('menu-open') ? 'block' : 'none'; // Show close icon if menu is open
            });
            closeMenu.addEventListener('click', function() {
                header.classList.remove('menu-open'); // Close the menu
                closeMenu.style.display = 'none'; // Hide the close icon
            });
        });
    </script>