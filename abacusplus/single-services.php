<?php
$services = get_field('services');
$counter=get_field('counter_section');
$oservices=get_field('our_services');
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

<section class="ourServices">
    <div class="container">
        <div class="ourServices__title_wrapper">
            <p class="caption w-400 color-is-black"><?php echo $services['tagline']; ?></p>
            <h2 class="ourServices__title w-700 color-is-black hm-2"><?php echo $services['heading']; ?></h2>
        </div>

        <div class="ourServices__wrapper">
            <?php foreach($oservices['two_services'] as $os):?>
                <a href="<?php echo $os['link']; ?>" class="ourServices__link">
                <div class="ourServices__card">
                    <div class="ourServices__contentwrapper">
                 <img class="ourServices__icon" src="<?php echo $os['icon']['url']; ?>" alt="<?php echo $os['icon']['alt']; ?>">
                    <div class="ourServices__content">
                        <h3 class="ourServices__card-title w-700 color-is-black hm-3"><?php echo $os['title']; ?></h3>
                        <p class="ourServices__description w-400 color-is-black p-big"><?php echo $os['subtitle']; ?></p>
                    </div>
                    </div>
                    <p class="ourServices__text w-400 color-is-black"><?php echo $os['description']; ?></p>
                </div>
                </a>
                  <?php endforeach; ?>
         </div>
    </div>
</section>

<?php
get_template_part('inc/testimonials'); ?>

<?php
get_template_part('inc/steps'); ?>

<?php
get_footer(); ?>