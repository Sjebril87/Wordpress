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
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'vacances' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         '3=}#4i}m<iQOR/C$zC8s2}r DEM;x0r5fXuNIbc7;2DkB6O8Bdr5UTWR=61,.uib' );
define( 'SECURE_AUTH_KEY',  '}C ~)rtW5+jukIW#N:=coO0G7O9op7aerkzql;^fE5(bdMfw#9b*`j`W)llcl/i{' );
define( 'LOGGED_IN_KEY',    '$w-/k]c6)SWl~6$Wbo!U?%UrSI~@SMR3:r(weP@Q+!nU$9l.%N)1FAX@kpw([&Je' );
define( 'NONCE_KEY',        '8bg9#BInMWmEW}]DlOUs#^jxOEF#OwWX722N*m)%9L4Xy+t@7sSDg$[ gh/sB?9n' );
define( 'AUTH_SALT',        '=3&MaGiw|Bo2^TWf|-4sd.<8xNgC<.?;!z}#5l6&SBSusD6-L0guJN+QAXaemXYj' );
define( 'SECURE_AUTH_SALT', 'c-UcjM_4Vtt??bVDtbEH &vhho<FGJT()@$GT#<qb~bPvu:06JSe9cAUZE#3=A? ' );
define( 'LOGGED_IN_SALT',   'OWWxkrGle.90y8Tn&^ZmornT(6$B?F&w^3GtP2uak5glH^IQR}(sOej&rd+e}O(u' );
define( 'NONCE_SALT',       'LY5^;2v=?(yavHW2S6}~R1WG@C1J[YWSZ7ZLx.$z878>}[XSsGdI$+<ew8e-!%O-' );

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wp_';

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
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
