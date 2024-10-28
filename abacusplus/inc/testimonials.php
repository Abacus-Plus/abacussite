<?php
$testimonials = get_field('testimonials');

?>

<section class="testimonials">
    <div class="container">
        <div class="testimonials__title">
            <p class="caption w-400 color-is-black"><?php echo $testimonials['tagline']; ?></p>
            <h2 class="testimonials__title w-700 color-is-black hm-2"><?php echo $testimonials['heading']; ?></h2>
        </div>
        <div class="testimonials__slider">
            <?php
            $index = 0;
            foreach ($testimonials['choose_testimonials'] as $testimonial) : ?>
                <?php
                $testimonial_id = $testimonial->ID;
                $name = get_field('name', $testimonial_id);
                $position = get_field('position', $testimonial_id);
                $testimonial_content = get_field('testimonial_content', $testimonial_id);
                $client_image = get_field('client_image', $testimonial_id);
                $choose_partner = get_field('choose_partner', $testimonial_id);
                $index++;
                $class = '';
                if ($index % 3 == 0) {
                    $class = 'first';
                } elseif ($index % 3 == 1) {
                    $class = 'second';
                } elseif ($index % 3 == 2) {
                    $class = 'third';
                }
                ?>

                <div class="testimonials__card <?php echo $class; ?>">
                    <div class="testimonials__logos-wrapper">
                        <?php foreach ($choose_partner as $partner): ?>
                            <?php
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
                            <h5 class="testimonials__author w-700 color-is-black"><?php echo $name; ?></h5>
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