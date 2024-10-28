<?php
$faq = get_field('here_to_stay');
?>


<section class="faq">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo $faq['tagline']; ?></p>
        <div class="faq__titlebutton">
            <h2 class="faq__title w-700 color-is-black hm-2"><?php echo $faq['heading']; ?></h2>
            <a href="<?php echo $faq['button']['url']; ?>" class="secondary-button medium"><?php echo $faq['button']['title']; ?></a>
        </div>
        <div class="faq__wrapper">
            <div class="faq__questions">
                <?php foreach ($faq['faqs'] as $index => $faq_item) : ?>
                    <div class="faq__question-wrapper">
                        <h5 class="faq__question w-700 color-is-black" data-bs-toggle="collapse" data-bs-target="#answer-<?php echo $index; ?>" aria-expanded="false" aria-controls="answer-<?php echo $index; ?>">
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

        <div class="faq__wrapper_mobile">
            <div class="accordion" id="faqAccordion">
                <?php foreach ($faq['faqs'] as $index => $faq_item) : ?>
                    <div class="accordion-item faq__item">
                        <div class="faq__question-wrapper accordion-header" id="heading-<?php echo $index; ?>">
                            <h5 w-700 class="faq__question w-700 color-is-black" data-bs-toggle="collapse" data-bs-target="#collapse-<?php echo $index; ?>" aria-expanded="false" aria-controls="collapse-<?php echo $index; ?>">
                                <?php echo $faq_item['question']; ?>
                            </h5>
                            <img src="/wp-content/uploads/2024/10/Icons-3.svg" />
                        </div>
                        <div id="collapse-<?php echo $index; ?>" class="accordion-collapse collapse <?php echo $index === 0 ? 'show' : ''; ?>" aria-labelledby="heading-<?php echo $index; ?>" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                <p class="w-400 color-is-black p-big"><?php echo $faq_item['answer']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>