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
if ( $_SERVER["SERVER_ADDR"] == '::1' ) {
	/** The name of the database for WordPress */
	define( 'DB_NAME', 'dlsmoxno_wp720' );

	/** MySQL database username */
	define( 'DB_USER', 'root' );

	/** MySQL database password */
	define( 'DB_PASSWORD', '' );
} else {

	/** The name of the database for WordPress */
	define( 'DB_NAME', 'dlsmoxno_wp720' );

	/** MySQL database username */
	define( 'DB_USER', 'dlsmoxno_wp720' );

	/** MySQL database password */
	define( 'DB_PASSWORD', 'h3SQ.64Q]p' );

}


/** MySQL hostname */
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
define( 'AUTH_KEY',         'NO(K[hJ}c_xt5[+;=!{F<9e66lGF_J}3lE=<h+}]NBL}s!zCePw7b)MP<?J8Xx|]' );
define( 'SECURE_AUTH_KEY',  '$`9L^#v=N{c+OX9zOG8ab^X5S2W+Se##~}B1FqfQ_/oP(yDoa)`g^]!hCFL~.V*t' );
define( 'LOGGED_IN_KEY',    '16>{n [A] ,_(:m.TGTP=aH)Qzb?3YXrI*2TK~^1$.P-EavP: eo<@e(2q 6^htM' );
define( 'NONCE_KEY',        'Xqs*L+}B!)WVn-z##c%Q?cno)D){fhh>dkoAGM/0?PQbs{19A@%@ ?hFPIv3UH&&' );
define( 'AUTH_SALT',        'v9uu:,l85F?eu.7.,yY.W!7:Gh$F(-Mi+Z3->nPf;pm39z4UayoM,&;J@%$~#/7k' );
define( 'SECURE_AUTH_SALT', 'OwXPoscoS$@[t`<fzz%DtvX2>[MF}L=E)zEJKt#d}dC8;Fh|H7:iZ`$|?+nkP-93' );
define( 'LOGGED_IN_SALT',   '!Y-P=qDc5z*,bCqgw>=gOQrSzFxL6(+P+wN1bttdC9._&(&/p@6BwUf3H]k!uF<k' );
define( 'NONCE_SALT',       'h#K/O./49]]|zi3Z#|~A!*H~_bK9+k>P0%Sja^A<K4*@`]i&H,$4yo;i<5:8q>1}' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'wprs_';

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
define('FS_METHOD', 'direct');
/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
