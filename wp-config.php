<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the
 * installation. You don't have to use the web site, you can
 * copy this file to "wp-config.php" and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * MySQL settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define('DB_NAME', 'wppdr');

/** MySQL database username */
define('DB_USER', 'mxmdes_wppdr');

/** MySQL database password */
define('DB_PASSWORD', '2S78L5py)-');

/** MySQL hostname */
define('DB_HOST', 'localhost');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8mb4');

/** The Database Collate type. Don't change this if in doubt. */
define('DB_COLLATE', '');

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'jppyorffrkz8r9c4xcf9va4ah30lcaaqbf3us1swudprdtkd6y5adb2owawsvee7');
define('SECURE_AUTH_KEY',  'qp4rqpu4y8xk9zoqnw0fdajkcazdtlm9js2fgevjinihajjsf0ub9dqeq8skb0wa');
define('LOGGED_IN_KEY',    '625e59kw0xve1z48s2bfmur6my7flgyzqztlmrchru1wky0tw4quxkfvowpwqujq');
define('NONCE_KEY',        'th7bmzh99fhbvnotve73sla9mdx6sppxzfm6ybxdathlnzogcyxa4dttxeat16sz');
define('AUTH_SALT',        'rjhn5hutrmupxwzs4uhj2t8fhsub5snorvuzt3qyrxj5kfn9s8qw6m08ytqpdnhq');
define('SECURE_AUTH_SALT', '1qmkikzkkgubnf2se3q5qryagm2796av2ix4cjteehpaey5agdiizqmzscajrf97');
define('LOGGED_IN_SALT',   'vmddlwiil7s5cxkd5bxspprffqrqfjbfxl2gksfqeqffigfrr5n30hxt88ecf6gn');
define('NONCE_SALT',       'ueltwnctrbgl308szdkwz3cc0fpciodrut7glft4sualys9cp4j2x2cfjetex0lw');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wppdr_';

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 *
 * For information on other constants that can be used for debugging,
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . 'wp-settings.php');
