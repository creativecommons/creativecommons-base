<?php
/* Template name: Sidebar */
get_header();
the_post();
?>
<section class="main-content">
<div class="container">
    <div class="columns is-centered is-variable is-5">
        <div class="column is-3">
            <aside class="sidebar">
                <?php
                    $parent = CC_Site::get_parent_page();
                    echo '<nav class="side-navigation padding-vertical-big">';
                        echo '<ul class="list-pages">';
                            wp_list_pages(
                                array(
                                    'child_of'  => $parent,
                                    'show_date' => '',
                                    'depth'     => 3,
                                    'title_li'  => '',
                                )
                            );
                            echo '</ul>';
                            echo '</nav>';

                            dynamic_sidebar( 'page' );
                            ?>
            </aside>
        </div>
        <div class="column is-8">
            <section class="entry-page-content">
                <div class="text-format">
                    <?php the_content(); ?>
                </div>
            </section>
        </div>
    </div>
</div>
<?php get_template_part( 'inc/partials/entry/page', 'footer' ); ?>
</section>
<?php get_footer(); ?>
