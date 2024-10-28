<?php
$plans = get_field('plans');
?>
<section class="plans">
    <div class="container">
        <p class="caption w-500 color-is-black"><?php echo $plans['tagline']; ?></p>
        <h2 class="plans__highlighted w-700 color-is-black hm-2"><?php echo $plans['punchline']; ?></h2>
        <?php if (!empty($plans['button']['url'])): ?>
            <a href="<?php echo esc_url($plans['button']['url']); ?>" class="primary-button medium icon-right">
                <?php echo esc_html($plans['button']['title']); ?>
            </a>
        <?php endif; ?>
    </div>
</section>