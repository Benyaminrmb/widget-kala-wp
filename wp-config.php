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
 * * Database settings
 * * Secret keys
 * * Database table prefix
 * * ABSPATH
 *
 * @link https://wordpress.org/support/article/editing-wp-config-php/
 *
 * @package WordPress
 */

// ** Database settings - You can get this info from your web host ** //
/** The name of the database for WordPress */
define( 'DB_NAME', 'widget_kala_db' );

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
define( 'AUTH_KEY',         '^_H&Oy}JhF(^|r!Ccre+%8?VpJ,%cE(>DSE$`UPu}iBdjzf]9j4(yEWpgmm1C6EW' );
define( 'SECURE_AUTH_KEY',  'XZ4%!hwWMQJ7@-X0W0IG0FP#IMeahG*/ 9Rm()Kik!$1(zx=EruO{O|K*;N/zKm(' );
define( 'LOGGED_IN_KEY',    'mx9=ttc_CqcFirw?zp;b_x%/bwBJebt*bS:TI]K&]NzyH.RaRBk2:(Oe+Mo;-)=O' );
define( 'NONCE_KEY',        'dMn2wkuk>hP;LFf6KV<TW]ZArl}EM[3;>Dyr|hv,%QBv&(?.6:=JRsFR@>&pZ1Ch' );
define( 'AUTH_SALT',        'i(,*k,AxF#=ivo+DIdg/c@Q@j_devb GuE_W|y$ZJN+0y#rD[DXr3nJ3PkS/)c{l' );
define( 'SECURE_AUTH_SALT', 'RX4~IMm~cvqc%z&&Xz1rx%G8bQ/w<yx`)we%jwTR]E+V/M-eAAP9l|.9xE5F/WR-' );
define( 'LOGGED_IN_SALT',   '1J Y1CR]R|gBA|cF}1.plLfPEc~pRvu8!Ex<SRh8xTA}cOSbNyNq!Ia5p.,7h:`P' );
define( 'NONCE_SALT',       'UaP.RWDK8zf$Q,<PU2|UHC%>TI_<#)Eam}U ?B)Z?*|&;]yU/*9Y>u#YzFwhwnFq' );

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
