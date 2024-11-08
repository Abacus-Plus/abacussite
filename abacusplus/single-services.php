<?php
$services = get_field('services');
$counter=get_field('counter_section');
$oservices=get_field('our_services');
$team=get_field('our_team');
$transformation=get_field('before_after');
get_header();
?>

<?php
get_template_part('inc/hero');
?>
<?php
get_template_part('inc/partners'); ?>

<?php get_template_part('inc/projects'); ?>

<?php
get_template_part('inc/plans'); ?>


<?php if (!empty($counter['heading']) && !empty($counter['tagline']) && !empty($counter['counters']) && is_array($counter['counters'])): ?>
<section class="numbers">
    <div class="container">
        <div class="numbers__title_wrapper">
            <p class="caption w-400 color-is-black"><?php echo $counter['tagline']; ?></p>
            <h2 class="numbers__title w-700 color-is-black hm-2"><?php echo $counter['heading']; ?></h2>
        </div>
        <div class="numbers__wrapper">
            <?php foreach ($counter['counters'] as $c): ?>
                <div class="numbers__card">
                    <span class="numbers__card-title w-700 color-is-black counter" data-target="<?php echo $c['number_border']; ?>">0%</span>
                    <h4 class="numbers__count w-700 color-is-black"><?php echo $c['description']; ?></h4>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>


<section class="services">
    <div class="container">
        <div class="services__title_wrapper">
            <p class="caption w-400 color-is-black"><?php echo $services['tagline']; ?></p>
            <h2 class="services__title w-700 color-is-black hm-2"><?php echo $services['title']; ?></h2>
        </div>
        <div class="services__heading_wrapper">
            <h3 class="services__heading w-700 color-is-black hm-3"><?php echo $services['heading']; ?></h3>
            <p class="services__text w-500 color-is-black p-big"><?php echo $services['description']; ?></p>
        </div>
        <div class="services__wrapper">
            <?php foreach ($services['sevices_icons'] as $s): ?>

                <div class="services__card">
                    <div class="services__innerwrapper">
                        <img class="services__icon" src="<?php echo $s['sevices_icon']['url']; ?>" alt="<?php echo $s['sevices_icon']['alt']; ?>">
                        <h4 class="services__card-title w-700 color-is-black hm-4"><?php echo $s['sertitle']; ?></h4>
                    </div>
                    <ul class="services__list w-500 color-is-black p-big">
                        <?php
                        $services2 = explode('.', $s['services_list']);
                        foreach ($services2 as $service2): ?>
                            <li class="services__list-item"><?php echo trim($service2); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<?php 
// Check if any of the transformation fields are not empty
if (
    !empty($transformation['tagline']) || 
    !empty($transformation['heading']) || 
    !empty($transformation['paragraph']) || 
    !empty($transformation['image_before']['url']) || 
    !empty($transformation['image_after']['url']) || 
    !empty($transformation['title']) || 
    !empty($transformation['subtitle'])
) : 
?>
<section class="transformation">
    <div class="container">
        <div class="transformation__title_wrapper">
            <?php if (!empty($transformation['tagline'])) : ?>
                <p class="caption w-400 color-is-black"><?php echo $transformation['tagline']; ?></p>
            <?php endif; ?>

            <?php if (!empty($transformation['heading'])) : ?>
                <h2 class="transformation__title w-700 color-is-black hm-2"><?php echo $transformation['heading']; ?></h2>
            <?php endif; ?>

            <?php if (!empty($transformation['paragraph'])) : ?>
                <p class="transformation__text w-400 color-is-black p-big"><?php echo $transformation['paragraph']; ?></p>
            <?php endif; ?>
        </div>

        <div class="transformation__card">
            <div class="before-wrapper">
                <h4 class="transformation__before w-700 color-is-black hm-4">Before</h4>
                <h4 class="transformation__before w-700 color-is-black hm-4">After</h4>
            </div>

            <div class="before-after-slider">
                <?php if (!empty($transformation['image_before']['url'])) : ?>
                    <img class="transformation__image" src="<?php echo $transformation['image_before']['url']; ?>" alt="<?php echo $transformation['image_before']['alt']; ?>">
                <?php endif; ?>

                <div class="after-image-wrapper">
                    <?php if (!empty($transformation['image_after']['url'])) : ?>
                        <img class="transformation__image after-image" src="<?php echo $transformation['image_after']['url']; ?>" alt="<?php echo $transformation['image_after']['alt']; ?>">
                    <?php endif; ?>
                </div>

                <div class="slider-handle">
                    <div class="arrow-wrapper">
                        <img src="/wp-content/uploads/2024/11/Icons1.svg" alt="arrow-left"/>
                        <img src="/wp-content/uploads/2024/11/Icons.svg" alt="arrow-right"/>
                    </div>
                </div>
            </div>

            <div class="transformation__content">
                <?php if (!empty($transformation['title'])) : ?>
                    <h3 class="transformation__card-title w-700 color-is-black hm-3"><?php echo $transformation['title']; ?></h3>
                <?php endif; ?>

                <?php if (!empty($transformation['subtitle'])) : ?>
                    <p class="transformation__description w-400 color-is-black"><?php echo $transformation['subtitle']; ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>



<section class="ourServices">
    <div class="container">
        <div class="ourServices__title_wrapper">
            <p class="caption w-400 color-is-black"><?php echo $services['tagline']; ?></p>
            <h2 class="ourServices__title w-700 color-is-black hm-2"><?php echo $services['heading']; ?></h2>
        </div>

        <div class="ourServices__wrapper">
            <?php foreach($oservices['two_services'] as $os):?>
                <div class="ourServices__card">
                    <div class="ourServices__contentwrapper">
                 <img class="ourServices__icon" src="<?php echo $os['icon']['url']; ?>" alt="<?php echo $os['icon']['alt']; ?>">
                    <div class="ourServices__content">
                        <h3 class="ourServices__card-title w-700 color-is-black hm-3"><?php echo $os['title']; ?></h3>
                        <p class="ourServices__description w-400 color-is-black p-big"><?php echo $os['subtitle']; ?></p>
                    </div>
                    </div>
                    <p class="ourServices__text w-400 color-is-black"><?php echo $os['description']; ?></p>

                    <a href="<?php echo $os['button']['url']; ?>" class="secondary-button medium icon-right ourServices__button"><?php echo $os['button']['title']; ?></a>
                </div>
                  <?php endforeach; ?>
         </div>
    </div>
</section>

<?php
get_template_part('inc/testimonials'); ?>

<!-- <?php
get_template_part('inc/steps'); ?> -->

<section class="team">
    <div class="container">
        <div class="team__title_wrapper">
            <p class="caption w-400 color-is-black"><?php echo $team['tagline']; ?></p>
            <h2 class="team__title w-700 color-is-black hm-2"><?php echo $team['heading']; ?></h2>
        </div>
        <div class="team__wrapper">
            <?php foreach ($team['our_team_pictures'] as $member): ?>
                <div class="team__card">
                    <img class="team__image" src="<?php echo $member['image']['url']; ?>" alt="<?php echo $member['image']['alt']; ?>">
                    <div class="team__content">
                    <h3 class="team__name w-700 color-is-black hm-3"><?php echo $member['heading']; ?></h3>
                    <p class="team__position w-400 color-is-black p-big"><?php echo $member['position']; ?></p>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
</section>

<script>
    document.addEventListener("DOMContentLoaded", function() {
    const slider = document.querySelector(".before-after-slider");
    const afterImageWrapper = document.querySelector(".after-image-wrapper");
    const sliderHandle = document.querySelector(".slider-handle");

    let isDragging = false;

    sliderHandle.addEventListener("mousedown", function(e) {
        isDragging = true;
        e.preventDefault(); // Prevents text selection while dragging
    });

    document.addEventListener("mouseup", function() {
        isDragging = false;
    });

    document.addEventListener("mousemove", function(e) {
        if (!isDragging) return;
        
        const rect = slider.getBoundingClientRect();
        const offsetX = e.clientX - rect.left;
        const width = rect.width;

        // Set the width of the after image wrapper
        afterImageWrapper.style.width = `${offsetX}px`;

        // Center the handle on the current mouse position
        sliderHandle.style.left = `${offsetX}px`;
    });

    // Touch support for mobile devices
    sliderHandle.addEventListener("touchstart", function(e) {
        isDragging = true;
    });

    document.addEventListener("touchend", function() {
        isDragging = false;
    });

    document.addEventListener("touchmove", function(e) {
        if (!isDragging) return;
        
        const touch = e.touches[0];
        const rect = slider.getBoundingClientRect();
        const offsetX = touch.clientX - rect.left;
        
        // Set the width of the after image wrapper
        afterImageWrapper.style.width = `${offsetX}px`;
        
        // Center the handle on the current touch position
        sliderHandle.style.left = `${offsetX}px`;
    });
});
</script>


<?php
get_footer(); ?>