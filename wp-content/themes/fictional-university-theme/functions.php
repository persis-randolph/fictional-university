<?php
  function pageBanner($args = NULL) { // setting to NULL makes it non-required
    if (!isset($args['title'])) {
      $args['title'] = get_the_title();
    }
    if (!isset($args['subtitle'])) {
      $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!isset($args['photo'])) {
      if (get_field('page_banner_background_image') AND !is_archive() AND !is_home()) {
        $args['photo'] = get_field('page_banner_background_image')['sizes']['pageBanner'];
      } else {
        $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
      }
    }

    ?>
    <div class="page-banner">
      <div
        class="page-banner__bg-image"
        style="background-image: url(<?php echo $args['photo'];?>)">
      </div>
      <div class="page-banner__content container container--narrow">
        <h1 class="page-banner__title"><?php echo $args['title']; ?></h1>
        <div class="page-banner__intro">
          <p><?php echo $args['subtitle']; ?></p>
        </div>
      </div>
    </div>
  <?php }

  function university_files() {
    wp_enqueue_script('main-university-js', get_theme_file_uri('/build/index.js'), array('jquery'), '1.0', true);
    wp_enqueue_style('university_main_styles', get_theme_file_uri('/build/style-index.css'));
    wp_enqueue_style('university_extra_styles', get_theme_file_uri('/build/index.css'));
    wp_enqueue_style('font-awesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('custom-google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
  }

  add_action('wp_enqueue_scripts', 'university_files');

  // adds the page/post name as the title in the browser tab
  function university_features() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true); // nickname, width, height, canCrop?
    add_image_size('professorPortrait', 480, 650, true);
    add_image_size('pageBanner', 1500, 350, true);
    // for adding dynamic wordpress menus
    // register_nav_menu('headerMenuLocation', 'Header Menu Location');
    // register_nav_menu('footerLocation1', 'Footer Location 1');
    // register_nav_menu('footerLocation2', 'Footer Location 2');
  }

  add_action('after_setup_theme', 'university_features');

  function university_adjust_queries($query) {
    if (!is_admin() AND is_post_type_archive('program') AND $query->is_main_query()) {
      $query->set('orderby', 'title');
      $query->set('order', 'ASC');
      $query->set('posts_per_page', -1);
    }

    if (!is_admin() AND is_post_type_archive('event') AND $query->is_main_query()) {
      $today = date('Ymd');
      $query->set('meta_key', 'event_date');
      $query->set('orderby', 'meta_value_num');
      $query->set('order', 'ASC');
      $query->set('meta_query', array(
        'key' => 'event_date',
        'compare' => '>=',
        'value' => $today,
        'type' => 'numeric'
      ));
    }
  }

  add_action('pre_get_posts', 'university_adjust_queries');


  function universityMapKey($api) {
    $env_file_path = realpath(__DIR__."/.env");
    //Check .envenvironment file exists
    if (!is_file($env_file_path)) {
      throw new ErrorException("Environment File is Missing.");
    }
    //Check .envenvironment file is readable
    if (!is_readable($env_file_path)) {
      throw new ErrorException("Permission Denied for reading the ".($env_file_path).".");
    }
    $var_arrs = array();
    // Open the .en file using the reading mode
    $fopen = fopen($env_file_path, 'r');
    if($fopen) {
      //Loop the lines of the file
      while (($line = fgets($fopen)) !== false) {
          // Check if line is a comment
          $line_is_comment = (substr(trim($line),0 , 1) == '#') ? true: false;
          // If line is a comment or empty, then skip
          if($line_is_comment || empty(trim($line)))
              continue;

          // Split the line variable and succeeding comment on line if exists
          $line_no_comment = explode("#", $line, 2)[0];
          // Split the variable name and value
          $env_ex = preg_split('/(\s?)\=(\s?)/', $line_no_comment);
          $env_name = trim($env_ex[0]);
          $env_value = isset($env_ex[1]) ? trim($env_ex[1]) : "";
          $var_arrs[$env_name] = $env_value;
      }
      // Close the file
      fclose($fopen);
    }
    foreach($var_arrs as $name => $value){
      //Using putenv()
      putenv("{$name}={$value}");
    $api['key'] = getenv('API_KEY');
    return $api;
    }
  }

  add_filter('acf/fields/google_map/api', 'universityMapKey');
