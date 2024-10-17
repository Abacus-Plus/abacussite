<?php
//Template Name: Homepage
$hero_section = get_field('hero_section');
$partners = get_field('partners');
$plans = get_field('plans');
$solutions = get_field('solutions');
$projects = get_field('projects');
$faq = get_field('here_to_stay');
$testimonials = get_field('testimonials');
$cards = get_field('cards');
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
            $reversed_solutions = array_reverse($solutions['choose_services']);
            foreach ($reversed_solutions as $solution) :
                $br++; ?>
                <div class="solutions__card">
                    <div class="solutions__content">
                        <h3 class="solutions__card-title w-700 color-is-black"><?php echo $solution->post_title; ?></h3>
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

<section class="projects">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo esc_html($projects['tagline']); ?></p>
        <h2 class="projects__title w-700 color-is-black"><?php echo esc_html($projects['title']); ?></h2>
        <div class="projects__cards">
            <?php foreach ($projects['projects_repeater'] as $project) : ?>
                <div class="projects__wrapper">
                    <div class="projects__content">
                        <h3 class="projects__card-title w-800 color-is-black"><?php echo $project['heading']; ?></h3>
                        <p class="projects__description w-400 color-is-black p-big"><?php echo $project['description']; ?></p>
                        <a href="<?php echo $project['button']['url']; ?>" class="primary-button medium icon-right"><?php echo $project['button']['title']; ?></a>

                    </div>
                    <div class="projects__images-wrapper">
                        <?php foreach ($project['choose_projects'] as $related_project_id): ?>
                            <?php
                            $background_select = get_field('background_select', $related_project_id);
                            $background_colors = get_field('background_colors', 'option');
                            $related_project = get_post($related_project_id);
                            $thumbnail_id = get_post_thumbnail_id($related_project->ID);
                            $thumbnail_url = wp_get_attachment_url($thumbnail_id);
                            $background_color = $background_colors[$background_select];
                            $hover_image = get_field('hover_image', $related_project->ID);

                            // Fetch the tags (taxonomy terms) for this project
                            $tags = get_the_terms($related_project->ID, 'post_tag');
                            ?>
                            <div class="projects__image-item" data-hover-image="<?php echo esc_url($hover_image); ?>"
                                style=" background-image: url('<?php echo $thumbnail_url; ?>'); background-color: <?php echo $background_color; ?>">
                                <h5 class="projects__image-title color-is-black w-700"><?php echo get_the_title($related_project->ID); ?></h5>

                                <div class="projects__tags">
                                    <?php if ($tags && !is_wp_error($tags)): ?>
                                        <?php foreach ($tags as $tag): ?>
                                            <span class="projects__tag"><?php echo esc_html($tag->name); ?></span>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>


<section class="faq">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $faq['tagline']; ?></p>
        <div class="faq__titlebutton">
            <h2 class="faq__title w-700 color-is-black"><?php echo $faq['heading']; ?></h2>
            <a href="<?php echo $faq['button']['url']; ?>" class="secondary-button medium"><?php echo $faq['button']['title']; ?></a>
        </div>
        <div class="faq__wrapper">
            <div class="faq__questions">
                <?php foreach ($faq['faqs'] as $index => $faq_item) : ?>
                    <div class="faq__question-wrapper">
                        <h5 w-700 class="faq__question w-700 color-is-black" data-bs-toggle="collapse" data-bs-target="#answer-<?php echo $index; ?>" aria-expanded="false" aria-controls="answer-<?php echo $index; ?>">
                            <?php echo $faq_item['question']; ?>
                        </h5>
                        <img src="/wp-content/uploads/2024/10/Icons-3.svg" />
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="faq__answers">
                <?php foreach ($faq['faqs'] as $index => $faq_item) : ?>
                    <div id="answer-<?php echo $index; ?>" class="collapse faq__answer <?php echo $index === 0 ? 'show' : ''; ?>" data-bs-parent=".faq__answers">
                        <p class="w-400 color-is-black p-big"><?php echo $faq_item['answer']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>



    </div>

</section>

<section class="testimonials">
    <div class="container">
        <div class="testimonials__title">
            <p class="caption w-400 color-is-black"><?php echo $testimonials['tagline']; ?></p>
            <h2 class="testimonials__title w-700 color-is-black"><?php echo $testimonials['heading']; ?></h2>
        </div>
        <div class="testimonials__slider">
            <?php foreach ($testimonials['choose_testimonials'] as $testimonial) : ?>
                <?php
                // Retrieve the testimonial post ACF fields
                $testimonial_id = $testimonial->ID; // Assuming this is the related post object
                $name = get_field('name', $testimonial_id); // ACF field 'name'
                $position = get_field('position', $testimonial_id); // ACF field 'position'
                $testimonial_content = get_field('testimonial_content', $testimonial_id); // ACF field 'testimonial_content'
                $client_image = get_field('client_image', $testimonial_id); // ACF field 'client_image'
                $choose_partner = get_field('choose_partner', $testimonial_id); // Relationship field 'choose_partner'
                ?>

                <div class="testimonials__card">
                    <div class="testimonials__logos-wrapper">
                        <?php foreach ($choose_partner as $partner): ?>
                            <?php
                            // Get the featured image of the related partner post
                            $partner_image = get_the_post_thumbnail_url($partner->ID, 'full');
                            ?>
                            <?php if ($partner_image): ?>
                                <img class="testimonials__images" src="<?php echo $partner_image; ?>" alt="<?php echo get_the_title($partner->ID); ?>">
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </div>
                    <p class="testimonials__text w-400 color-is-black"><?php echo $testimonial_content; ?></p>

                    <div class="testimonials__authorwrapper">
                        <img class="testimonials__image" src="<?php echo $client_image['url']; ?>" alt="<?php echo $client_image['alt']; ?>">
                        <div class="testimonials__insidewrapper">
                            <h6 class="testimonials__author w-700 color-is-black"><?php echo $name; ?></h5>
                                <p class="testimonials__position w-400 color-is-black p-small"><?php echo $position; ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="testimonials__arrows">
            <button class="testimonials__arrow testimonials__arrow--left">
                <img src="/wp-content/uploads/2024/10/Icons-5.svg" />
            </button>
            <button class="testimonials__arrow testimonials__arrow--right">
                <img src="/wp-content/uploads/2024/10/Icons-6.svg" />
            </button>
        </div>

    </div>

</section>

<section class="cards">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $cards['tagline']; ?></p>
        <h2 class="cards__title w-700 color-is-black"><?php echo $cards['heading']; ?></h2>
        <div class="cards__wrapper">
            <?php foreach ($cards['cards_repeater'] as $card): ?>
                <div class="cards__insidewrapper">
                    <div class="cards__content">
                        <h3 class="cards__card-title w-700 color-is-black"><?php echo $card['text']; ?></h3>
                        <a href="<?php echo $card['button']['url']; ?>" class="primary-button medium icon-right"><?php echo $card['button']['title']; ?></a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>


<?php get_footer(); ?>