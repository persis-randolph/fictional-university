<?php get_header(); 

  while(have_posts()) {
    the_post();
    pageBanner();
    ?>

    <div class="container container--narrow page-section">

      <!-- show breadcrumbs on child pages only -->
      <?php
        $postId = get_the_ID();
        $parentPostId = wp_get_post_parent_id($postId);
        $parentPostTitle = get_the_title($parentPostId);
        $parentPostPermalink = get_permalink($parentPostId);
        if ($parentPostId !== 0) { ?>
          <div class="metabox metabox--position-up metabox--with-home-link">
            <p>
              <a class="metabox__blog-home-link" href="<?php echo $parentPostPermalink ?>">
                <i class="fa fa-home"aria-hidden="true"></i>
                  Back to <?php echo $parentPostTitle; ?>
              </a><span class="metabox__main"><?php the_title(); ?></span>
            </p>
          </div>
        <?php }
      ?>

      <!-- links to child pages if applicable -->
      <?php 
        $testArray = get_pages(array(
          'child_of' => $postId
        ));

        if ($parentPostId or $testArray) { ?>
          <div class="page-links">
            <h2 class="page-links__title">
              <a href="<?php echo $parentPostPermalink ?>"><?php echo $parentPostTitle; ?></a>
            </h2>
            <ul class="min-list">
              <?php
                if ($parentPostId) {
                  $findChildrenOf = $parentPostId;
                } else {
                  $findChildrenOf = $postId;
                }
                wp_list_pages(array(
                  'title_li' => NULL,
                  'child_of' => $findChildrenOf
                ));
              ?>
            </ul>
          </div>
        <?php }
      ?>

      <div class="generic-content">
        <?php the_content(); ?>
      </div>
    </div>

  <?php }

  get_footer();

?>