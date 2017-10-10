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
define('DB_NAME', 'begomsud_crypto');

/** MySQL database username */
define('DB_USER', 'begomsud_crypto');

/** MySQL database password */
define('DB_PASSWORD', '8k352446');

/** MySQL hostname */
define('DB_HOST', 'begomsud.mysql.ukraine.com.ua');

/** Database Charset to use in creating database tables. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'cdX82J9v5tmBks2gEffF!vxDl772fg%(b*2wPWf1Jr&BBVmEIlYup8byBTwa2ZUi');
define('SECURE_AUTH_KEY',  'kxmyijyx@aFnTQ9OCXF87ptUcmf*HNBK2#E94bZw)wyoDESm7DyHjjs9KzFgsPS3');
define('LOGGED_IN_KEY',    '%T4!v^59eVaheaoG#9J2LRh7Ue9sKMMYd&ER5#OiJ4XmuNMZqbCO&NL0%7zt@)fc');
define('NONCE_KEY',        'rhWmtdBaG3h3u(9dFsCUcRx#Qn7(KJ8uBJVcLZiyjeIDH84eko3(GEkw4stEutqd');
define('AUTH_SALT',        'aj*W7UX&#4ZVBSI87Tns45%NeL&Nc7ERlS)ijYaL91vmt!(v&oUKxv2*cH9p57pd');
define('SECURE_AUTH_SALT', 'yg7fkmOY61)o!puo&^M@3a(g*U!QuIVCoK6%F*XMbXLwsR7mEgtl#nad)^&y!aPL');
define('LOGGED_IN_SALT',   'uKbO2sbh*q0IGJW#ODC8aesVgiyjfmLkn&8vYiKqNZIsslQ17T@fow797NhqmUg4');
define('NONCE_SALT',       'Z%4hk4%2CaBL@Ot*S79LDD9U)!#CyBstkJ6yVAs2Pgvd9M5Co(2JOg9pVNMKS4@u');
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

define( 'WP_ALLOW_MULTISITE', true );

define ('FS_METHOD', 'direct');
