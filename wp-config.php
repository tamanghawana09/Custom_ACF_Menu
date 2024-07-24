<?php
/**
 * The base configuration for WordPress
 *
 * The wp-config.php creation script uses this file during the installation.
 * You don't have to use the website, you can copy this file to "wp-config.php"
 * and fill in the values.
 *
 * This file contains the following configurations:
 *
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://developer.wordpress.org/advanced-administration/wordpress/wp-config/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'custom_acf' );

/** Database username */
define( 'DB_USER', 'root' );

/** Database password */
define( 'DB_PASSWORD', '' );

/** Database hostname */
define( 'DB_HOST', 'localhost' );

/** Database charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

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
define( 'AUTH_KEY',         '3#?9+-0aj@}ucx-!;LNs;.t}{>$W#|?UaG20FP?;%m4<~k]Vh%_K>o-^dBZ///yQ' );
define( 'SECURE_AUTH_KEY',  'ici%pu?:90se>$i[f,X-(e@J2dxS//:~0lq*4o?:(An,}&&lheyv//4Rnn8%&M+h' );
define( 'LOGGED_IN_KEY',    '?gU8L.VLlwCl654]J)-GN$$gE]&n!*-4D?b/T0#m:T9<cNz6;YGcrMj{K<<;c&.!' );
define( 'NONCE_KEY',        'Zsi22jb0%g!e!IC{0q-J`.[tT hLukg_(PPjc)$mG$f}/z,8: 59PXKu`sdEOWOF' );
define( 'AUTH_SALT',        '7zY>oNw:2#g[e`^N!&G=,1[Y&rt3g$0uinv_u&H{fC$NWUa2qZd2MD*%raj#UcP+' );
define( 'SECURE_AUTH_SALT', 'oF%+)[9?cEf}d.cHY>5`DC[_To Nf[B[BI-G%g57c9qMUt2x|Eu5IXHkt0VN.a3N' );
define( 'LOGGED_IN_SALT',   '^;oGj,;P(y4;Y`_R6v(VGmF2v<oY0GBx2PVUKkBH]g`{d;=YAwnq2qmFJjSB&J:Q' );
define( 'NONCE_SALT',       'GJ,w.jQI)hpOoF:(i;36H9Xw9rh_D~lV_}2$e;o~^=x$SlF oV28&uri6#lVb a)' );

/**#@-*/

/**
 * WordPress database table prefix.
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
 * @link https://developer.wordpress.org/advanced-administration/debug/debug-wordpress/
 */
define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', false);


/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';