<?php

function university_post_types() {
    // Campus post type
    register_post_type('campus', array(
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Campuses',
        'add_new_item' => 'Add New Campus',
        'edit_item' => 'Edit Campus',
        'all_items' => 'All Campuses',
        'singular_name' => 'Campus'
      ),
      'menu_icon' => 'dashicons-location-alt',
      'rewrite' => array('slug' => 'campuses'),
      'has_archive' => true,
      'supports' => array('title', 'editor', 'excerpt')
    ));

    // Event post type
    register_post_type('event', array(
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Events',
        'add_new_item' => 'Add New Event',
        'edit_item' => 'Edit Event',
        'all_items' => 'All Events',
        'singular_name' => 'Event'
      ),
      'menu_icon' => 'dashicons-calendar',
      'rewrite' => array(
        'slug' => 'events'
      ),
      'has_archive' => true,
      'supports' => array(
        'title',
        'editor',
        'excerpt'
      )
    ));

    // Program post type (regenerate permalinks after adding)
    register_post_type('program', array(
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Programs',
        'add_new_item' => 'Add New Program',
        'edit_item' => 'Edit Program',
        'all_items' => 'All Programs',
        'singular_name' => 'Program'
      ),
      'menu_icon' => 'dashicons-awards',
      'rewrite' => array(
        'slug' => 'programs'
      ),
      'has_archive' => true,
      'supports' => array(
        'title',
        'editor'
      )
    ));

    // Professor post type (regenerate permalinks after adding)
    register_post_type('professor', array(
      'public' => true,
      'show_in_rest' => true,
      'labels' => array(
        'name' => 'Professors',
        'add_new_item' => 'Add New Professor',
        'edit_item' => 'Edit Professor',
        'all_items' => 'All Professors',
        'singular_name' => 'Professor'
      ),
      'menu_icon' => 'dashicons-welcome-learn-more',
      'supports' => array(
        'title',
        'editor',
        'thumbnail'
      )
    ));
  }

  add_action('init', 'university_post_types');
