<?php
$hero_section = get_field('hero_section');
?>

<section class="hero">
    <div class="container">
        <div class="hero__wrapper">
            <div class="hero__content">
                <h1 class="hero__title w-700 color-is-black hm-1"><?php echo $hero_section['heading']; ?></h1>
                <p class="hero__text w-400 color-is-black p-big"><?php echo $hero_section['description']; ?></p>
                <?php if (!empty($hero_section['first_button']['url']) || !empty($hero_section['second_button']['url'])): ?>
                    <div class="hero__buttons">
                        <a href="<?php echo ($hero_section['first_button']['url']); ?>" class="primary-button medium">
                            <?php echo ($hero_section['first_button']['title']); ?>
                        </a>
                        <a href="<?php echo ($hero_section['second_button']['url']); ?>" class="secondary-button medium">
                            <?php echo ($hero_section['second_button']['title']); ?>
                        </a>

                    </div>
                <?php endif; ?>

            </div>
            <img class="hero__image" src="<?php echo $hero_section['hero_image']['url']; ?>" alt="<?php echo $hero_section['hero_image']['alt']; ?>">
        </div>
    </div>
</section>