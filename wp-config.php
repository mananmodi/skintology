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
 * @link https://wordpress.org/documentation/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'skintology' );

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
define( 'AUTH_KEY',         'D7RnaH#%o7zQv<~:en<)To@f&l&(n/yH0lr4_s/)(H4- I9Yz$Jp{X?yB~e=*2Qc' );
define( 'SECURE_AUTH_KEY',  'u=N-j_4d%L>yDk+GUi){[n)8Cueig+Z$0_7aYbt5/2!n0h=:jjv=p$bGo12]}nd%' );
define( 'LOGGED_IN_KEY',    'i2E?cxv3iV526ew(}< /tmBR8IM7mILYHimmb<PnGg4hz1R?.{PsV-o wE(-=[R}' );
define( 'NONCE_KEY',        '{,qQ?lH35F ;HviwAeQ9&RQn=<?,`D9>.f%yu7Zn#J|Ioi5mgj*d]@IW=)_8-qTC' );
define( 'AUTH_SALT',        'U3BHFhJt#6I:SnHW+Ux~59]1nR.pgmy.A%y.#c+4uj/_]m|<RL3!*LqiQ_Vy?[+)' );
define( 'SECURE_AUTH_SALT', 'XKy`=N?tdjqn]bTs?Gz*$5/ZY8~4^|I3xx^-gFf0}=l.w<4o$l$ $Y3(RtZd[!Vu' );
define( 'LOGGED_IN_SALT',   'V{Gf@4B+k?YBf;y3T8PIc9Tvj+a M4A7)C)wcg}_|k0hy!19a.(Rk$XO(<)Od5B&' );
define( 'NONCE_SALT',       'TI8:.{FxEKb&2aIC{!}}s][[OJKOBGTo>#tsB|a_VZ>gPf2jfIKb[X._lDXdfOQ)' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'skt_';

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
 * @link https://wordpress.org/documentation/article/debugging-in-wordpress/
 */
define( 'WP_DEBUG', true );

/* Add any custom values between this line and the "stop editing" line. */



/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', __DIR__ . '/' );
}

/** Sets up WordPress vars and included files. */
require_once ABSPATH . 'wp-settings.php';
