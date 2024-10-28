<?php
//Template Name: Services
$services = get_field('services');
$steps = get_field('website_steps');
get_header();
?>

<?php
get_template_part('inc/hero');
?>
<?php
get_template_part('inc/partners'); ?>

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
                        $services2 = explode(',', $s['services_list']);
                        foreach ($services2 as $service2): ?>
                            <li class="services__list-item"><?php echo trim($service2); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>

        <div class="services__heading_wrapper two">
            <h3 class="services__heading w-700 color-is-black hm-3"><?php echo $services['heading_2']; ?></h3>
            <p class="services__text w-500 color-is-black p-big"><?php echo $services['description_2']; ?></p>
        </div>
        <div class="services__wrapper">
            <?php foreach ($services['sevices_icons_2'] as $s2): ?>
                <div class="services__card">
                    <div class="services__innerwrapper">
                        <img class="services__icon" src="<?php echo $s2['sevices_icon']['url']; ?>" alt="<?php echo $s2['sevices_icon']['alt']; ?>">
                        <h4 class="services__card-title w-700 color-is-black hm-4"><?php echo $s2['sertitle']; ?></h4>
                    </div>
                    <ul class="services__list w-500 color-is-black p-big">
                        <?php
                        $services2 = explode(',', $s2['services_list']);
                        foreach ($services2 as $service2): ?>
                            <li class="services__list-item"><?php echo trim($service2); ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


</section>

<?php get_template_part('inc/projects'); ?>

<section class="steps">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $steps['tagline']; ?></p>
        <h2 class="steps__title w-700 color-is-black hm-2"><?php echo $steps['heading']; ?></h2>
        <div class="accordion" id="stepsAccordion">
            <?php $br = 0;
            foreach ($steps['steps'] as $index => $step): ?>
                <?php $br++; ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="heading<?php echo $index; ?>">
                        <button class="accordion-button collapsed w-700" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse<?php echo $index; ?>">
                            <span class="step-number">0<?php echo $br; ?>.</span> <?php echo $step['title']; ?>
                        </button>
                    </h2>
                    <div id="collapse<?php echo $index; ?>" class="accordion-collapse collapse" aria-labelledby="heading<?php echo $index; ?>" data-bs-parent="#stepsAccordion">
                        <div class="accordion-body">
                            <p class="w-500 color-is-black p-big"><?php echo $step['description']; ?></p>
                            <div class="steps_iconwrapper">
                                <img class="steps__icon" src="<?php echo $step['open_step_icon']['url']; ?>" alt="Icon img" />
                                <h5 class="w-700 color-is-black hm-5"><?php echo $step['subtitle']; ?></h5>
                            </div>
                            <p class="w-500 color-is-black"><?php echo $step['paragraph']; ?></p>
                            <div class="steps__deliverableswrapper">
                                <span class="steps_deliverables"><?php echo $step['delivarables']; ?></span>
                                <p class="w-500 color-is-black p-small"><?php echo $step['delivarables_text']; ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<?php
get_template_part('inc/plans'); ?>

<?php
get_template_part('inc/testimonials'); ?>


<?php get_template_part('inc/faq'); ?>

<?php
get_footer();
