<?php
/**
 *
 *
 *
 * @package WordPress
 */


$q = $_SERVER['SERVER_NAME'];
// var_dump($q);

switch ($q) {

	case "localhost" :
		// FFDA Localhost
		
			define('DB_NAME', 'database_name');

			define('DB_USER', 'root');

			define('DB_PASSWORD', 'root');

			define('DB_HOST', 'localhost');

			define('WP_HOME','http://localhost:8888/PATH');
			
			define('WP_SITEURL','http://localhost:8888/PATH');

			define('WP_DEBUG', true);

		// END FFDA Localhost
	break;

	case "192.168.1.8" :
		// FFDA Local by ip

			define('DB_NAME', 'database_name');

			define('DB_USER', 'root');

			define('DB_PASSWORD', 'root');

			define('DB_HOST', 'localhost');

			define('WP_HOME','http://192.168.1.8:8888/PATH/');

			define('WP_SITEURL','http://192.168.1.8:8888/PATH/');

			define('WP_DEBUG', true);

		// FFDA END Local by ip
	break;

	default :
		// Live
		
			define('DB_NAME', 'database_name');

			define('DB_USER', 'root');

			define('DB_PASSWORD', 'root');

			define('DB_HOST', 'localhost');

			define('WP_HOME','http://inzpiration.se/dev/');

			define('WP_SITEURL','http://inzpiration.se/dev/');

			define('WP_DEBUG', false);

		// END Live
	break;
}

define('DB_CHARSET', 'utf8');

define('DB_COLLATE', '');

/**#@+
 * Unika autentiseringsnycklar och salter.
 *
 * Du kan generera nycklar med {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org secret-key service}
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         ':5Uh^c.oFE3q%5Nia@`E02wX>,hM+&60Q*^D-/^}/7J5YPaX}H1*/#]<x_t)-K|,');
define('SECURE_AUTH_KEY',  'hQ5?E[|{]}qnQ{CHLBCy3b>oZ#E~-*EM8J)!4KFn-VH;.|F]G[xAe?p)bt9}a(qz');
define('LOGGED_IN_KEY',    'yc1zv^n*6r~*U}r+_i@ert-vGt4mYX%RlKWq[nen?sV{J}i&e8-#bf&Y<=M>F$32');
define('NONCE_KEY',        'qj-x-O!B#a-];yfvDr/|CdQvy6!0^[J+Q-m,{Cntx}|-5@vN`^566`eR(_=Yhn;n');
define('AUTH_SALT',        'r=J|gR~Oww}L<|QTEiRm!XlEs-,S~w_1o[EvJTI9SJ44:a@U=zhwrTC}rE+ 6jD!');
define('SECURE_AUTH_SALT', '/wcv<cMRB}%V<$|JU^H@k>p;-<qA&Qe)<A6z:-?B9WqwVt.U]5{}jzqun.{/@|Xw');
define('LOGGED_IN_SALT',   '6LeWcq.1?}a8>oDsnM+7oxE%9j--H_5=sHC;WSSn0K5cB-`AqGk f?FVs_K[`kWh');
define('NONCE_SALT',       'u`(hIQypjc>k%KY OZat<i+X7q^Yk5@(>SJNo;YIo)?Ki#!H#bt{g8q-y;u**-b;');

/**#@-*/

/**
 *
 * Du kan ha flera installationer i samma databas om du ger varje installation ett unikt
 */
$table_prefix  = 'ff_wp_';

/** 
 * 
 */ 


if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

require_once(ABSPATH . 'wp-settings.php');