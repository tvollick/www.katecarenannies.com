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
define('DB_NAME', 'katecare_wp_local');

/** MySQL database username */
define('DB_USER', 'root');

/** MySQL database password */
define('DB_PASSWORD', '');

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
define('AUTH_KEY',         '(y7$kO@}~gq^3@eMFPd@}adpgR&yHOO 5c3ad8&2PDzWa8<zbkQ=@6lGMbb6a%Zj');
define('SECURE_AUTH_KEY',  'eGH`_*DhUqq#{&rRZ_W#j4|<_#|(f7pJ//>HS`m9g{~i!FIYR0FQ)8G>_O&UYJID');
define('LOGGED_IN_KEY',    't %7Fz=?1[sm*FwV?:R,Hsn2@;yOXX]|P.{~7<:?Uyc.e1`~f1tYbWC<K.&HhP5{');
define('NONCE_KEY',        'RcNR{I0Y^>Y<2fgp_s/$ff^d}eL}A(to{dOCEzH ~lq1XzYcOE TT$bW0!FR);%#');
define('AUTH_SALT',        'q Q.k fBJ4m,pq8 dWuV_rInABF7.;bg{yT&#laR*=vEYXU#BRJF2y[P)rmY>$^:');
define('SECURE_AUTH_SALT', '6DnT%&aARb{cZVVPEp  xVbisM]8p2.I{&e/4vs4YchUGB>Vw$}.(k2|{+#[A 1M');
define('LOGGED_IN_SALT',   'wdKz&pVe*b75iCokZTfiQ0YNT1`m]psdsaS![<*qZ}`F x0!(1;N <UQ#$+EC4{~');
define('NONCE_SALT',       'oL yX`h/zls%z$6UOYhY5H}hC1_#BP^O!c){iEP;7aVBXmP?|JGU=J249RO-s3CT');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = 'wp_';

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
