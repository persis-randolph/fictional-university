<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the web site, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * Localized language
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', 'root' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The database collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication unique keys and salts.
 *
 * Change these to different unique phrases! You can generate these using
 * the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}.
 *
 * You can change these at any point in time to invalidate all existing cookies.
 * This will force all users to have to log in again.
 *
 * @since 2.6.0
 */


/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';


/* Add any custom values between this line and the "stop editing" line. */



/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the documentation.
 *
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
 */
if ( ! defined( 'WP_DEBUG' ) ) {
	define( 'WP_DEBUG', false );
}


define('AUTH_KEY',         'K8qyNnX8p+OhuCg4vUockPxyoBmwUU2L2ACM+p9bHpIa/4zDfhb1CFp0pTctuTCvLMK6AM66j3FihQgKiD0gGA==');
define('SECURE_AUTH_KEY',  'S2+CHWSp9rcJBoDOfqJcTmDBWzxDXrb/UvQRemuRQsfWKcLAwkfVKhzVKsacmZ1ilfEhYdxTYpAxVq0qGLxB0g==');
define('LOGGED_IN_KEY',    'C1wJ0eGPJQm+xLz8YPZQoJAqP7UlBmt+BaCsOAIIhRJIp5eaycO3+/Y9vOxEAM/eZ0aUgvDB8UxFPw5epddlDQ==');
define('NONCE_KEY',        'd78TAsHQsn1TU5LyiQzVLNJswNPf5XsHedgEpScaSSjl5MpyXg/G8LvVCtAvBk3Jstdwbx1924kgPAEelVu9Og==');
define('AUTH_SALT',        'kTnNE89aPZuS04JqjA4Jm1s0ICq98oJ7cRUpNXPSvFf22b+cyTdj/Te/97eToqZ+3giIYy2hJh8ti4o/b/tdVw==');
define('SECURE_AUTH_SALT', '9kq8g5uDdasmDFxfJSJWEvQzNIqSro1E9KehY1cxKgAQUexrsdb/9ljk5vSCM0yzHqo0MEVcksoDKK1pJPPrKA==');
define('LOGGED_IN_SALT',   'lrgyyQkWaW86wO8+k5llFajAGJQHAhtVKZEgtCuBHH6ABQ+klU/CsA3qcsE2rYDQ0K8ip9HVz7QySluyqkBcBw==');
define('NONCE_SALT',       'rb6BkSIqixjrE6HeWdD38tpjiSGd+fAGWP/pnEw4nBONOAs+PZ3dtzbtJtRY8FFCXRsBzTeEfUZ5TbvPDZDeSQ==');
define( 'WP_ENVIRONMENT_TYPE', 'local' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
