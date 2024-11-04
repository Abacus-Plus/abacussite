<?php
//Template Name: Projects template
get_header(); ?>

<?php get_template_part('inc/hero'); ?>


<section class="projects">
    <div class="container">
        <!-- Dynamically generate tabs from services post type -->
        <ul class="nav nav-tabs" id="projectTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-projects-tab" data-toggle="tab" href="#all" role="tab" aria-controls="all" aria-selected="true">All Projects</a>
            </li>
            <?php
            // Fetch all services posts to create tabs
            $services_query = new WP_Query([
                'post_type' => 'services',
                'posts_per_page' => -1
            ]);

            if ($services_query->have_posts()):
                while ($services_query->have_posts()): $services_query->the_post();
                    $service_slug = sanitize_title(get_the_title()); // Create a slug from service title for tab linking
            ?>
                    <li class="nav-item">
                        <a class="nav-link" id="<?php echo $service_slug; ?>-tab" data-toggle="tab" href="#<?php echo $service_slug; ?>" role="tab" aria-controls="<?php echo $service_slug; ?>" aria-selected="false"><?php echo esc_html(get_the_title()); ?></a>
                    </li>
            <?php
                endwhile;
                wp_reset_postdata();
            endif;
            ?>
        </ul>

        <div class="projects__images-wrapper tab-content" id="projects-container">
            <?php
            // Fetch projects and assign classes based on related services
            $projects_query = new WP_Query([
                'post_type' => 'projects',
                'posts_per_page' => 6,
                'paged' => 1
            ]);

            if ($projects_query->have_posts()) :
                while ($projects_query->have_posts()) : $projects_query->the_post();
                    // Retrieve related services from 'koristene_usluge' relationship field
                    $related_services = get_field('koristene_usluge');

                    // Build a list of classes for this project based on related services
                    $service_classes = [];
                    if ($related_services) {
                        foreach ($related_services as $service) {
                            $service_classes[] = sanitize_title(get_the_title($service->ID)); // Convert service title to slug and use as class
                        }
                    }
                    $service_classes = implode(' ', $service_classes);

                    // Project fields and data
                    $background_select = get_field('background_select');
                    $background_colors = get_field('background_colors', 'option');
                    $thumbnail_url = get_the_post_thumbnail_url(get_the_ID());
                    $background_color = $background_colors[$background_select] ?? '';
                    $tags = get_the_terms(get_the_ID(), 'post_tag');
            ?>

                    <div class="project__image__wrapper">
                        <a href="<?php echo esc_url(get_permalink()); ?>" class="projects__image-link">
                            <div class="projects__image-item <?php echo esc_attr($service_classes); ?>" style="background-image: url('<?php echo esc_url($thumbnail_url); ?>'); background-color: <?php echo esc_attr($background_color); ?>;">
                                <h5 class="projects__image-title color-is-black w-700">
                                    <?php echo esc_html(get_the_title()); ?>
                                </h5>
                            </div>
                            <?php if ($tags && !is_wp_error($tags)): ?>
                                <div class="projects__tags">
                                    <?php foreach ($tags as $tag): ?>
                                        <span class="projects__tag"><?php echo esc_html($tag->name); ?></span>
                                    <?php endforeach; ?>
                                </div>
                            <?php endif; ?>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p>No projects found.</p>';
            endif;
            ?>
        </div>

        <button id="load-more-projects" data-page="1" data-max-pages="<?php echo $projects_query->max_num_pages; ?>" class="primary-button medium">Load More</button>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle tab clicks to filter projects based on related services
        document.querySelectorAll('#projectTabs .nav-link').forEach(tab => {
            tab.addEventListener('click', function(event) {
                event.preventDefault();

                // Get the selected category from the tab's href attribute (e.g., 'all', 'wordpress-websites')
                const selectedCategory = this.getAttribute('href').substring(1);

                // Show/hide projects based on the selected category
                document.querySelectorAll('.projects__image-item').forEach(project => {
                    if (selectedCategory === 'all' || project.classList.contains(selectedCategory)) {
                        project.style.display = 'block';
                    } else {
                        project.style.display = 'none';
                    }
                });

                // Set the active class on the selected tab
                document.querySelectorAll('#projectTabs .nav-link').forEach(link => link.classList.remove('active'));
                this.classList.add('active');
            });
        });
    });
</script>

<?php
get_template_part('inc/testimonials'); ?>


<?php
get_footer(); ?>