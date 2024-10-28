<?php
//Template Name: Homepage

$solutions = get_field('solutions');
$cards = get_field('cards');
get_header();
?>
<?php
get_template_part('inc/hero'); ?>
<?php
get_template_part('inc/partners'); ?>
<?php
get_template_part('inc/plans'); ?>
<section class="solutions">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $solutions['tagline']; ?></p>
        <h2 class="solutions__title w-700 color-is-black hm-2"><?php echo $solutions['heading']; ?></h2>
        <div class="solutions__cards">
            <?php
            $br = 0;
            $reversed_solutions = array_reverse($solutions['choose_services']);
            foreach ($reversed_solutions as $solution) :
                $br++; ?>
                <div class="solutions__card">
                    <div class="solutions__content">
                        <h3 class="solutions__card-title w-700 color-is-black hm-3"><?php echo $solution->post_title; ?></h3>
                        <p class="solutions__card-text w-500 color-is-black p-big">
                            <?php
                            echo str_replace(array('<p>', '</p>'), '', $solution->post_content);
                            ?>
                        </p>
                    </div>
                    <div class="solutions__button">
                        <span class="solutions__button-number w-700 color-is-black"><?php echo $br; ?></span>
                        <a href="<?php echo get_the_permalink($solution->ID); ?>" class="primary-button medium icon-right">Find out more</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php get_template_part('inc/projects'); ?>


<?php get_template_part('inc/faq'); ?>


<?php
get_template_part('inc/testimonials'); ?>

<section class="cards">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $cards['tagline']; ?></p>
        <h2 class="cards__title w-700 color-is-black hm-2"><?php echo $cards['heading']; ?></h2>
        <div class="cards__wrapper">
            <?php foreach ($cards['cards_repeater'] as $card): ?>
                <div class="cards__insidewrapper">
                    <div class="cards__content">
                        <h3 class="cards__card-title w-700 color-is-black hm-3"><?php echo $card['text']; ?></h3>
                        <a href="<?php echo $card['button']['url']; ?>" class="primary-button medium icon-right"><?php echo $card['button']['title']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<?php get_footer(); ?>