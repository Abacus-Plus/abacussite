<?php
//Template Name: Homepage
$hero_section = get_field('hero_section');
$partners = get_field('partners');
$plans = get_field('plans');
$solutions = get_field('solutions');
$projects = get_field('projects');
get_header();
?>
<section class="hero">
    <div class="container">
        <div class="hero__wrapper">
            <div class="hero__content">
                <h1 class="hero__title w-700 color-is-black"><?php echo $hero_section['heading']; ?></h1>
                <p class="hero__text w-400 color-is-black p-big"><?php echo $hero_section['description']; ?></p>
                <div class="hero__buttons">
                    <a href="<?php echo $hero_section['first_button']['url']; ?>" class="primary-button medium"><?php echo $hero_section['first_button']['title']; ?></a>
                    <a href="<?php echo $hero_section['second_button']['url']; ?>" class="secondary-button medium"><?php echo $hero_section['second_button']['title']; ?></a>
                </div>
            </div>
            <img class="hero__image" src="<?php echo $hero_section['hero_image']['url']; ?>" alt="<?php echo $hero_section['hero_image']['alt']; ?>">
        </div>
    </div>
</section>
<section class="partners">
    <div class="container">
        <p class="caption w-700 color-is-black"><?php echo $partners['tagline']; ?></p>
        <div class="partners__logos">
            <?php foreach ($partners['choose_partners'] as $logo) : ?>
                <img src="<?php echo get_the_post_thumbnail_url($logo->ID); ?>" alt="Partners logo" />
            <?php endforeach; ?>
        </div>
    </div>
</section>
<section class="plans">
    <div class="container">
        <p class="caption w-500 color-is-black"><?php echo $plans['tagline']; ?></p>
        <h2 class="plans__highlighted w-700 color-is-black"><?php echo $plans['punchline']; ?></h2>
    </div>
</section>
<section class="solutions">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $solutions['tagline']; ?></p>
        <h2 class="solutions__title w-700 color-is-black"><?php echo $solutions['heading']; ?></h2>
        <div class="solutions__cards">
            <?php
            $br = 0;
            // Reverse the order of posts so oldest is first
            $reversed_solutions = array_reverse($solutions['choose_services']);
            // Loop through the reversed array
            foreach ($reversed_solutions as $solution) :
                $br++; ?>
                <div class="solutions__card">
                    <div class="solutions__content">
                        <h3 class="solutions__card-title w-700 color-is-black"><?php echo $solution->post_title; ?></h3>
                        <p class="solutions__card-text w-500 color-is-black p-big">
                            <?php
                            // Manually clean up unwanted <p> tags
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
<?php get_footer(); ?>