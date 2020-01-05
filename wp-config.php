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
define( 'DB_NAME', 'myarabibox' );

/** MySQL database username */
define( 'DB_USER', 'root' );

/** MySQL database password */
define( 'DB_PASSWORD', '' );

/** MySQL hostname */
define( 'DB_HOST', 'localhost' );

/** Database Charset to use in creating database tables. */
define( 'DB_CHARSET', 'utf8mb4' );

/** The Database Collate type. Don't change this if in doubt. */
define( 'DB_COLLATE', '' );

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define( 'AUTH_KEY',         'F,6AAc^By.GHHSu,=Hg`]1^jC|!UL^%tnc:|8F}q2(6}ORnn#=5+sziELM]FR}Ac' );
define( 'SECURE_AUTH_KEY',  '!lO,fuxf;j^a}CY^LdB[mD=N5)77($$u56_ R%JlG%=|~h[G<}G+Pro1Kf+/+~%&' );
define( 'LOGGED_IN_KEY',    'gcR ?qu28Y/VI|!gwBX<}%TUvx+3$RUqK*r~EdxV ~FtppqPQ$sNUc~:y[-W+b69' );
define( 'NONCE_KEY',        'sl B0r$mbeCRO$fegTcyX}`E&BPUACe_Z?+5}[h/$1Z9]+x.kR,0$?#G4i!`B:iP' );
define( 'AUTH_SALT',        'r=FOs2TTO&(TBEh;|Vl$oAnS7=q&+)B/>nx8&BWGi4GgBwl=6r1L?bRqm@r2BE`j' );
define( 'SECURE_AUTH_SALT', 'wT.A8n!rxpOHLc]urNk]CN#?I3rlF5V}YV>qs-/]= !b$Ox^IG>4i#E/9y))[zos' );
define( 'LOGGED_IN_SALT',   'FwZXwfC&s~=p^*73v8Dh`[v?1=ViTy`HYj!QRU*0rS!A}J^|?Bn0%eFO%qt<^-`T' );
define( 'NONCE_SALT',       'F]p%<Bbbea-2j4/I;oOnx29u#NZB,1~@[k]b^;{|1Bnt%1l)0DHljF{NXA3wXP^_' );

/**#@-*/

/**
 * WordPress Database Table prefix.
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
 * visit the Codex.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define( 'WP_DEBUG', false );

/* That's all, stop editing! Happy publishing. */

/** Absolute path to the WordPress directory. */
if ( ! defined( 'ABSPATH' ) ) {
	define( 'ABSPATH', dirname( __FILE__ ) . '/' );
}

/** Sets up WordPress vars and included files. */
require_once( ABSPATH . 'wp-settings.php' );
