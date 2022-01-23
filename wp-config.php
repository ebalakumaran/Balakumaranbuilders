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
/** The name of the database for WordPress */
define( 'DB_NAME', 'wordpress' );

/** MySQL database username */
define( 'DB_USER', 'Balakumaran' );

/** MySQL database password */
define( 'DB_PASSWORD', 'Bala242002!' );

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
define( 'AUTH_KEY',         'PTkz()^(w=[Jda<.51_R# 1XE`W} E9Gq7Oa{wrMR_H:yR(AW[g2gw<B$|BkMA6S' );
define( 'SECURE_AUTH_KEY',  '>_]v..oq>0RcO`J3Lt>/|Ytd<3=_`rGs!HpTMGi^fs]_K;_=9WSt?{BuJdRZ^+W ' );
define( 'LOGGED_IN_KEY',    'CqtECm0Ti)3e?)uaNgKr/v;6N$E/y.C.ZJu 6l&<:2 ZPv8gVtx8M,{=05r1myG+' );
define( 'NONCE_KEY',        'u$x.~yyk9]^YtmeHp0)go2kYP.:qfIa`PJU&iHij5 GLa_M+p9*3R@}xK-v=Vy;X' );
define( 'AUTH_SALT',        '&;#BWV5Z(ZK(HmTt(xQ[I/)JQ.5|tv|{^.<U@Du=YCX0Sg,0ib3EeoB;73<pV,(@' );
define( 'SECURE_AUTH_SALT', '0_Qr Fs;?r)y-a@&A@hoY01} sE8;H#URiBDJn;ENIEdcI! #*zAg`%WIxs7D}H#' );
define( 'LOGGED_IN_SALT',   'y]5sQb]C<vA;SK:gHmFgp0Cc55~*xTK#NX%?R6dgWW[/FstvHAgF0]00J`Uewg]4' );
define( 'NONCE_SALT',       'x~=Ph+q0R@%jja<:]DT)SQA?KWk!O1#e2M=w28wzrZKDabPzvj;gCI165nPM/vUK' );

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
 * @link https://wordpress.org/support/article/debugging-in-wordpress/
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
