<?php
define( 'WP_CACHE', true );
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
define( 'DB_NAME', 'u985379591_u8WO0' );

/** Database username */
define( 'DB_USER', 'u985379591_FBgZM' );

/** Database password */
define( 'DB_PASSWORD', 'ZkexUX1U4A' );

/** Database hostname */
define( 'DB_HOST', '127.0.0.1' );

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
define( 'AUTH_KEY',          'DM=Ck~e#;ByTx[0- /`F2#QKY3CYX!uG<9.6+w]FZ)~gKl~C)|e*ryKQLZVQuu`e' );
define( 'SECURE_AUTH_KEY',   'Peep,HnRYpu5bD)O_[Q%hd2Abb(N&]]`xzJRm|q#Rpu>Se3W(eZ:^&Fc7a]n0JzT' );
define( 'LOGGED_IN_KEY',     'f;Gtf3y^+t|F^+hYi@d(tq!r3X41CVe#DP<P;N<>N7l(R-FQih%.2*j$Gy;/eGlY' );
define( 'NONCE_KEY',         '#yuyq=E5*ZNgV,oq4&-nf&<3d:b;a+-#BXS&`TsrD%O.)N.KoHi@L*H=3ejYkaq.' );
define( 'AUTH_SALT',         '$3P.[ntSj@u2=P[XaniG&C9yd1d-+pOju-4*SZU^Q)tKw25E6J3XhJCn/RtGmF8(' );
define( 'SECURE_AUTH_SALT',  'Kr5keGV~fB5r1aUudIosD} %7/j0L[okw/V~5eakS-q*lIoPzB5 0zb LV/5c}*Q' );
define( 'LOGGED_IN_SALT',    '+%0SrtVNMF3C,$o#1xGT(rqp)2S;.SZJzw!hf!Uhf^sxYD8rS*/xTmnP16,|pU3%' );
define( 'NONCE_SALT',        'HT)KCxT/SKdr6JbX E~g8+T2_siukw-SL]v#AAvtIfE_o{RgrZF/4bRHu-h||,8W' );
define( 'WP_CACHE_KEY_SALT', 'byZ/N/A,a?tYO9I`~x:&.`n5G<VnPMwFcPTzY9|Tz8#[KrR61+<pC)}Q1Id?ayA=' );


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

define( 'FS_METHOD', 'direct' );
define( 'WP_AUTO_UPDATE_CORE', 'minor' );
/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
