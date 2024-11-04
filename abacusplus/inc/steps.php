<?php
$steps = get_field('website_steps');
?>

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
                <button class="accordion-button <?php echo $index === 0 ? '' : 'collapsed'; ?> w-700" 
                        type="button" 
                        data-bs-toggle="collapse" 
                        data-bs-target="#collapse<?php echo $index; ?>" 
                        aria-expanded="<?php echo $index === 0 ? 'true' : 'false'; ?>" 
                        aria-controls="collapse<?php echo $index; ?>">
                    <span class="step-number">0<?php echo $br; ?>.</span> <?php echo $step['title']; ?>
                </button>
            </h2>
            <div id="collapse<?php echo $index; ?>" 
                 class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" 
                 aria-labelledby="heading<?php echo $index; ?>" 
                 data-bs-parent="#stepsAccordion">
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