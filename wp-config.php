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
define( 'DB_NAME', 'wpdb' );

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
define( 'AUTH_KEY',         '+p1>zu$p3~-%7dw]RgEo&@^g-^Mm9Y@Bh@:QNe09s$iX}al%Zqx!Z2E7wwsAsVNi' );
define( 'SECURE_AUTH_KEY',  'yQ]Nla[Le|Cgl>m9H,3j-7Tj 0$s$2vw]i3TBJ/4sasckX<L`<)aY 0yOj5`uVpG' );
define( 'LOGGED_IN_KEY',    '0bF}ULtF_F`bb5vK,(1t?oDvg3jYFiNA4i%.u}yhNHnrGl2HVNO74FBF`y7qrA?Z' );
define( 'NONCE_KEY',        '{AQ(3d/vyvi3y(*ys1#*bdCIhj+.a-:J(@C.XkS b4XaU.45?SyX<DHkP+3U>>94' );
define( 'AUTH_SALT',        'q;[Z{5ToCgif/0nq__aK].1r1A62w`V<N>T=zP*`c||aS{7E3&VG;x+pVN?cPG*[' );
define( 'SECURE_AUTH_SALT', '1.K?.FgR2<@8Z=q=XZ]=>#aly(*dwp(E.?KOW8xieu-](6c|@o`f>Br^2,c+Fc^%' );
define( 'LOGGED_IN_SALT',   'R-+.^,DP|Ps@ZkP18(sGo^wYxgGAq9AH3u4k]Mt/}mOcc`@Sf:O:0RKV+I&>zCB|' );
define( 'NONCE_SALT',       '[^3}7D*d6m]IrOCp_!1)XAp==RU)2ru=Z=bYydoE.I?Pmk QMBtDd{ !7}7;WIZo' );

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
define( 'WP_DEBUG', false );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
