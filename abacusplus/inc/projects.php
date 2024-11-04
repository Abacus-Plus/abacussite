<?php
$projects = get_field('projects'); ?>

<section class="projects">
    <div class="container">
        <p class="caption w-400 color-is-black"><?php echo esc_html($projects['tagline']); ?></p>
        <h2 class="projects__title w-700 color-is-black hm-2"><?php echo esc_html($projects['title']); ?></h2>
        <div class="projects__cards">
            <?php foreach ($projects['projects_repeater'] as $project) : ?>
                <div class="projects__wrapper">
                    <div class="projects__content">
                        <h3 class="projects__card-title w-800 color-is-black hm-3"><?php echo $project['heading']; ?></h3>
                        <p class="projects__description w-400 color-is-black p-big"><?php echo $project['description']; ?></p>
                        <a href="<?php echo $project['button']['url']; ?>" 
                        class="<?php echo (is_singular('services') ? 'secondary-button' : 'primary-button'); ?> medium icon-right">
                        <?php echo $project['button']['title']; ?>
                        </a>

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

                            $tags = get_the_terms($related_project->ID, 'post_tag');
                            ?>
                            <a href="<?php echo get_the_permalink($related_project->ID); ?>" class="projects__linkwrapper">
                            <div class="projects__image-item"
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
                            </a>
                        <?php endforeach; ?>
                    </div>

                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>