<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Abacus_Plus
 */

$footer = get_field('footer', 'options');

?>

<footer class="footer">
    <div class="container">

        <div class="footer__heading">
            <h2 class="footer__title w-700 color-is-black"><?php echo $footer['heading']; ?></h2>
        </div>
        <div class="footer__wrapper">
            <div class="footer__left">
                <h5 class="footer__subtitle w-700 color-is-black">Explore</h5>
                <div class="footer__nav">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'footer',
                            'menu_id'        => 'footer_menu',
                            'menu_class'     => 'footer__menu',
                        )
                    );
                    ?>
                </div>
            </div>
            <div class="footer__middle">
                <h5 class="footer__subtitle w-700 color-is-black">Contact us</h5>
                <div class="footer__contact">
                    <?php foreach ($footer['contact_informations'] as $contact) : ?>
                        <div class="footer__contact-item">
                            <img src="<?php echo $contact['image']['url']; ?>" alt="<?php echo $contact['image']['alt']; ?>">
                            <a href="<?php echo $contact['link']; ?>" class="footer__contact-link w-500 color-is-black">
                                <p class="footer__contact-text w-500 color-is-black"><?php echo $contact['title']; ?></p>
                            </a>
                        </div>
                    <?php endforeach; ?>

                </div>

            </div>

            <div class="footer__right">
                <h5 class="footer__subtitle w-700 color-is-black">Explore</h5>
                <div class="footer__socials">
                    <?php foreach ($footer['useful_links'] as $social) : ?>
                        <a href="<?php echo $social['link']; ?>" target="_blank">
                            <img src="<?php echo $social['banner']['url']; ?>" alt="<?php echo $social['banner']['alt']; ?>">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="footer__copyright">
            <p class="w-400 color-is-black"><?php echo $footer['copyright']; ?></p>
            <a href="/" class="w-500 color-is-black">Privacy policy</a>
        </div>


        <?php wp_footer(); ?>


        </body>

        </html>