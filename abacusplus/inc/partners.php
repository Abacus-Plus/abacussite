<?php
$partners = get_field('partners'); ?>

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