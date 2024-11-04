<?php
// Template Name: Contact
$hero_section = get_field('hero_section');
get_header(); ?>


<section class="hero">
    <div class="container">
        <div class="hero__wrapper">
            <div class="hero__content">
                <h1 class="hero__title w-700 color-is-black hm-1"><?php echo $hero_section['heading']; ?></h1>
                <p class="hero__text w-400 color-is-black p-big"><?php echo $hero_section['description']; ?></p>
                <img class="hero__image" src="<?php echo $hero_section['hero_image']['url']; ?>" alt="<?php echo $hero_section['hero_image']['alt']; ?>">
            </div>
            <div class="hero__form">
                <div class="hero__form__content">
                    <h3 class="hero__form-title w-700 color-is-black hm-2">Send a Message</h3>
                    <p class="hero__text w-400 color-is-black p-big">Fill out this form to contact Abacus Plus. We'll respond to your inquiry as soon as possible.</p>
                </div>
                <?php echo do_shortcode('[contact-form-7 id="f85054d" title="Contact form 1"]'); ?>
            </div>
        </div>
    </div>
</section>


<?php
get_template_part('inc/testimonials'); ?>


<?php get_footer(); ?>