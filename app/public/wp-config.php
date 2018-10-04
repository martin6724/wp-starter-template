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

// ** MySQL settings ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'local' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', 'root' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'bs9lBZloNFczZgguoTAeNVNdoq89zvvC1U76yhWVQocvOb+Ro8fQsCw/Bqh6Nm1ombnzczKoaRfwChSES6nTmg==');
define('SECURE_AUTH_KEY',  'U0B5Kr+savCmv0CaD8QD/tuKOitur+WISLcNPqRAmX++S0R9bEeUImr5hiv3I3lS+aYdp3VT3gE/4XRRk5pSdw==');
define('LOGGED_IN_KEY',    'eEXzrk4BbZssbWUUt4uCrD0vxfgPN+lUJQRhBMJQsBxSzX9D86r9C/bTaWi3VJ1G/WyBKlguakWIxUFWAVl+fA==');
define('NONCE_KEY',        'UnVmUzjbMWvqcPoEoTo8n0qJO9BIv+Mu01QcM8INn8wHm/d9T9KuADxLoX6VKKVXTY6W4oxqahCXkg70LocdRQ==');
define('AUTH_SALT',        'C7hJZGf0iQ1xceteJ2+uILCZWB3pQF2w3Pw/L2lGYl99nXkcgXkby5Ten3m7lD7ECABarBEfwftsEMXU1NX9rA==');
define('SECURE_AUTH_SALT', 'ZqFTStIKhevNVtXlfzwDylGAUS3wJPKww+pAVFze+cJyHq2hfrBIOEche5+/XCwgRHY8GzCyY9HKfaAb1Ly7vQ==');
define('LOGGED_IN_SALT',   'ayTegSCgHSLi5JbooXGG/5q49oKQP7iE01h0RY+dXNAuKI+QL/hScXXgZnw+ow2LdOXdnDNC8E9aqOv5EsWC8Q==');
define('NONCE_SALT',       'V4nlHq26wksgUrkeOI3izrwPuO+B9fkfcbyQ1QBRSlST4MdSFmdahw/Zmn0jK9CDxRZhLvNqPLCAYiYbU5lj/Q==');

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';





/* Inserted by Local by Flywheel. See: http://codex.wordpress.org/Administration_Over_SSL#Using_a_Reverse_Proxy */
if ( isset( $_SERVER['HTTP_X_FORWARDED_PROTO'] ) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https' ) {
	$_SERVER['HTTPS'] = 'on';
}

/* Inserted by Local by Flywheel. Fixes $is_nginx global for rewrites. */
if ( ! empty( $_SERVER['SERVER_SOFTWARE'] ) && strpos( $_SERVER['SERVER_SOFTWARE'], 'Flywheel/' ) !== false ) {
	$_SERVER['SERVER_SOFTWARE'] = 'nginx/1.10.1';
}
/* That's all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) )
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
