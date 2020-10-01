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
define( 'DB_NAME', 'web09' );

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
define( 'AUTH_KEY',         'P+C;_8`-(a78WZ132X1G[+=!fjW(q4$1TH#V@z<)P,1%>k]41ltH+fuug(Z4xt0c' );
define( 'SECURE_AUTH_KEY',  '9<C#jm])M[<5l7#pcA>jV2T|)YZdn?7IEZh?MT2xCv&-NC*~{bj:e?BO]NhK|&93' );
define( 'LOGGED_IN_KEY',    'X|jlN:Z7orAZ!&6yU-(oIjh7Dq]wmNgas?2))md``:&is*M].X?HV5=r~swgf,7M' );
define( 'NONCE_KEY',        'pz4(Q5(LD<e39tg(;i8GP8EWhS>)@mBW$L{1CDf}s4@lI~<c^j6y7-#$FB9D}[c&' );
define( 'AUTH_SALT',        'k`S)10hB&xIU<)YJ5[>#DB;H/XjUK2UT4uzv>bRJgvksUH:BUu.F--(C{:n%3G#~' );
define( 'SECURE_AUTH_SALT', '0A3[-nz?Hu[}xz>S4zMWBcO=N;b?]CO2_ 31Nl+f%RQAB[eY_`FjvUF#eXdTa=P|' );
define( 'LOGGED_IN_SALT',   'tfZoxJWjjW|9=Jn-f5.ez/S+x`S7:>B Jc4$z]vgfY|cyEwIX%`svErDS(j@+ 8_' );
define( 'NONCE_SALT',       '=6G`qo8E*yOt4XeeW<@re%$*k+,8EgE*WPT0|3bDqol#GqBbcou$&8!Tr+ IvV[^' );

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
