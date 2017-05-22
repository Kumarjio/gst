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
define('DB_NAME', 'gst_wp');

/** MySQL database username */
define('DB_USER', 'gst_wp');

/** MySQL database password */
define('DB_PASSWORD', 'Shafqat122');

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
define('AUTH_KEY',         'U-rF_3[W5]kG_pV)CnXN?30^Pf_~Y=|ujJl|4~*HpvU#hW1.p[ 8_<;+1n{Xgu3K');
define('SECURE_AUTH_KEY',  '--+759|+[YxLV%3n;6I/CaCFT:u~sYN:$eTy`S?WOndjOD&]fAz`{h?Yx*y^^wV5');
define('LOGGED_IN_KEY',    '0h8uv:LHWW+Gpgl)u]%s|;1Y-rmWI$BIfv>.LzI;7oEQ4`r|tQ.Jy}bDeD2o.M] ');
define('NONCE_KEY',        'Ctn*d.QbI>OOIFcSUjpbqd1-bLWKm]m~57RSKj}1?h}MgH-dt@*l4=gMeZ<H5^yf');
define('AUTH_SALT',        'v;!P5_|58ZeGD77^WhDX9Ole_KW v[oEfx,sA!eL?YsMIN5@H=;G;s98{v2V7;L%');
define('SECURE_AUTH_SALT', 'HH@q k*Wy}TnjBlI8Y6yG:.}Up=Bv~C&AXd*mQ{|S+7O91_)T-0K58g*^SJ&&J#@');
define('LOGGED_IN_SALT',   'nB;@}JXP}hI}Qe4x6:ujlj(eQSpQ6HqQ4NX|y~SI$/Bx1Jt-_jH OgkHcXvC%b.R');
define('NONCE_SALT',       '&uj1*p f>{D6YdR7^;x;y|UL%gP Aq?.=8mP!z>Pamu.]7xZg8:1h;I)Yc^2}I93');

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
