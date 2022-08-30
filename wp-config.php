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
define( 'DB_NAME', 'artrepublik' );

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
define( 'AUTH_KEY',         '0L&jQY5_qX?x>htJF=%,_sx!~e:H]i4X(o%>2jg`GC!!{-h^O=&4,d_q3s0U`=DI' );
define( 'SECURE_AUTH_KEY',  '!^1[m4*`WKPk~:}-*f]W: mhB:gO%6TtN5KszGS,#PT;Fbg!E <Iq-+E79t%-L<W' );
define( 'LOGGED_IN_KEY',    'HI9%_|tz]J|6,;dJxxc^M~+J@5@&~HURES)iv-!+DbuqlE/yP^G_Z-cVVVyEY]y~' );
define( 'NONCE_KEY',        '4zrhFi)pgsQ=V/$hs9@-~`vLG[_1w7L#FKEODOS$Z[u;`K?psglgt;zZD!TQw7p9' );
define( 'AUTH_SALT',        'gj+tQlOdy=BTSG}-UaO,EaA!t+h|=X=/:Jdb,I4X_Y7J_v7Q3|l=:lr2,?Z@tP)q' );
define( 'SECURE_AUTH_SALT', '`S4Go#N*;fcMe>skX.o0{cp)BHRx.eRud$DsemP3%:C{bS^G(U4M#4$BVt(A~*iH' );
define( 'LOGGED_IN_SALT',   '>#Z-egv)J^T%efX@UX4!Ni-b*&9@e+:ZR07$G1Sh/3jEln,%p|.s_GMT{S-8+4DE' );
define( 'NONCE_SALT',       'a0dMvZHZMDXXi+xPF7!SF8hX8S +]8wm$6jy$pAhqZoa%-d[;S~Z&n%yhG4cg,rR' );

/**#@-*/

/**
 * WordPress database table prefix.
 *
 * You can have multiple installations in one database if you give each
 * a unique prefix. Only numbers, letters, and underscores please!
 */
$table_prefix = 'art_';

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
