<?php
/**
 * The base configurations of the WordPress.
 *
 * This file has the following configurations: MySQL settings, Table Prefix,
 * Secret Keys, WordPress Language, and ABSPATH. You can find more information
 * by visiting {@link http://codex.wordpress.org/Editing_wp-config.php Editing
 * wp-config.php} Codex page. You can get the MySQL settings from your web host.
 *
 * This file is used by the wp-config.php creation script during the
 * installation. You don't have to use the web site, you can just copy this file
 * to "wp-config.php" and fill in the values.
 *
 * @package WordPress
 */

/* Load file with local environment variables */ 
// TODO  if(getenv('LOCAL_DEV') && file_exists( __DIR__ .'/local-env.php' ))
if( file_exists( __DIR__ .'/local-env.php' )){

	require_once __DIR__ .'/local-env.php';

}

/** Allows both foobar.com and foobar.herokuapp.com to load media assets correctly. */
$scheme = getenv("URI_SCHEME") ? getenv("URI_SCHEME") : 'http';
$domain = getenv("DOMAIN") ? getenv("DOMAIN") : $_SERVER["HTTP_HOST"];

define("WP_HOME",    $scheme .'://'. $domain);
define("WP_SITEURL", WP_HOME);


// ** MySQL settings - You can get this info from your web host ** //
$db_url = parse_url(getenv("DB_URL"));

/** The name of the database for WordPress */
define("DB_NAME", trim($db_url["path"], "/"));

/** MySQL database username */
define("DB_USER", trim($db_url["user"]));

/** MySQL database password */
define("DB_PASSWORD", isset($db_url["pass"]) ? trim($db_url["pass"]) : '');

/** MySQL hostname */
define("DB_HOST", trim($db_url["host"]));

/** Database Charset to use in creating database tables. */
define("DB_CHARSET", getenv("DB_CHARSET") ? getenv("DB_CHARSET") : 'utf8');

/** The Database Collate type. Don't change this if in doubt. */
define("DB_COLLATE", getenv("DB_COLLATE") ? getenv("DB_COLLATE") : "");

/** Force SSL
define("FORCE_SSL_LOGIN", getenv("FORCE_SSL_LOGIN") == "true");
define("FORCE_SSL_ADMIN", getenv("FORCE_SSL_ADMIN") == "true");
if ($_SERVER["HTTP_X_FORWARDED_PROTO"] == "https")
  $_SERVER["HTTPS"] = "on";

*/
// Ponticlaro WP S3 plugin configuration
define('PCLARO_WP_S3_AWS_ACCESS_KEY', getenv("AWS_ACCESS_KEY_ID"));
define('PCLARO_WP_S3_AWS_ACCESS_SECRET', getenv("AWS_SECRET_ACCESS_KEY"));
define('PCLARO_WP_S3_BUCKET', getenv("PCLARO_WP_S3_BUCKET"));
define('PCLARO_WP_S3_BUCKET_PROJECT_PATH', getenv("PCLARO_WP_S3_BUCKET_PROJECT_PATH"));
define('PCLARO_WP_S3_BUCKET_UPLOADS_PATH', getenv("PCLARO_WP_S3_BUCKET_UPLOADS_PATH"));
define('PCLARO_WP_S3_CDN_URLS_ENABLED', getenv("PCLARO_WP_S3_CDN_URLS_ENABLED") == true);

/**#@+
 * Authentication Unique Keys and Salts.
 *
 * Change these to different unique phrases!
 * You can generate these using the {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 * You can change these at any point in time to invalidate all existing cookies. This will force all users to have to log in again.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         '3pss2v]oc6e,Dxe.90$=-08fpCXNwAj+sfLZ@H,&K-;>4Q[E?#?Rr8|2M:[qV3vp');
define('SECURE_AUTH_KEY',  'I&nO&SDEUDPGKy&x#z[f;[^5k&!?5Wy0-%&2>D g#?H+zd#i+|yCq:$xZa5pe9Bk');
define('LOGGED_IN_KEY',    'i()ec4a$o%z-9NQX1!MbB^[)~-AkEyDR^zonS?r-<EHNJ`)[%Fv-Rd?K.m7hknaX');
define('NONCE_KEY',        '*OyrJ])rTYcy6ye|L~T}YEHcw@(1KqD<k8SpSM_5VdzO/_Se|c$WkfkIt4v1|l*3');
define('AUTH_SALT',        'tkv,bJ`(Omo`6I(Y#9-?]v^=Gg0`t2sVAmaBgUd>8I.tazxz!Xx6tMiN>tBR*3s$');
define('SECURE_AUTH_SALT', 'u]Q7S`6%Y:HqtPH.QA@=Jui{X+*nMrhll>fQlHZ6^`gG>f:7!~ p7>69>5eNFp{=');
define('LOGGED_IN_SALT',   '_lSBQX}biY7 /9UM0Um{4*-28n0n0j^Y9Y3UbiC+6w?RAN`x6:PpaU_oATl}W*/9');
define('NONCE_SALT',       'yI8=kNB0Hn|0uV-5wMpm^L?_-vaYQf;-.R3h@$$!g ie~BMmYc1Lgk4oJMN5s&4P');

/**#@-*/

/**
 * WordPress Database Table prefix.
 *
 * You can have multiple installations in one database if you give each a unique
 * prefix. Only numbers, letters, and underscores please!
 */
$table_prefix  = getenv("WP_TABLE_PREFIX") ? getenv("WP_TABLE_PREFIX") : "wp_";

/**
 * WordPress Localized Language, defaults to English.
 *
 * Change this to localize WordPress. A corresponding MO file for the chosen
 * language must be installed to wp-content/languages. For example, install
 * de_DE.mo to wp-content/languages and set WPLANG to "de_DE" to enable German
 * language support.
 */
define("WPLANG", getenv("WP_LANG") ? getenv("WP_LANG") : "");

/**
 * For developers: WordPress debugging mode.
 *
 * Change this to true to enable the display of notices during development.
 * It is strongly recommended that plugin and theme developers use WP_DEBUG
 * in their development environments.
 */
define("WP_DEBUG", getenv("WP_DEBUG") == "true");

/**
 * Enable the WordPress Object Cache
 */
define("WP_CACHE", getenv("WP_CACHE") == "true");

/**
 * Disable the built-in cron job
 */
define("DISABLE_WP_CRON", getenv("DISABLE_WP_CRON") == "true");

/* That"s all, stop editing! Happy blogging. */

/** Absolute path to the WordPress directory. */
if ( !defined("ABSPATH") )
  define("ABSPATH", dirname(__FILE__) . "/");

/** Sets up WordPress vars and included files. */
require_once(ABSPATH . "wp-settings.php");

// Configures WP phpmailer class to use mandrill
add_action( 'phpmailer_init', 'configure_smtp' );
function configure_smtp( &$phpmailer ) {
	$phpmailer->IsSMTP();
	$phpmailer->SMTPAuth = true; // enable SMTP authentication
	$phpmailer->Port     = 587; // set the SMTP server port
	$phpmailer->Host     = 'smtp.mandrillapp.com'; // SMTP server
	$phpmailer->Username = getenv("MANDRILL_USERNAME"); // SMTP server username
	$phpmailer->Password = getenv("MANDRILL_APIKEY"); // SMTP server password
	$phpmailer->From     = get_bloginfo( 'admin_email', 'raw' );
	$phpmailer->FromName = get_bloginfo( 'name', 'raw' );
	$phpmailer->Sender   = get_bloginfo( 'admin_email', 'raw' );
}
