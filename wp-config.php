<?php
/**
 * Основные параметры WordPress.
 *
 * Скрипт для создания wp-config.php использует этот файл в процессе
 * установки. Необязательно использовать веб-интерфейс, можно
 * скопировать файл в "wp-config.php" и заполнить значения вручную.
 *
 * Этот файл содержит следующие параметры:
 *
 * * Настройки MySQL
 * * Секретные ключи
 * * Префикс таблиц базы данных
 * * ABSPATH
 *
 * @link https://codex.wordpress.org/Editing_wp-config.php
 *
 * @package WordPress
 */

// ** Параметры MySQL: Эту информацию можно получить у вашего хостинг-провайдера ** //
/** Имя базы данных для WordPress */
define('DB_NAME', 'alexan10_pro33');

/** Имя пользователя MySQL */
define('DB_USER', 'alexan10_pro33');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', 'wuukmaq7');

/** Имя сервера MySQL */
define('DB_HOST', 'alexan10.mysql.ukraine.com.ua');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8mb4');

/** Схема сопоставления. Не меняйте, если не уверены. */
define('DB_COLLATE', '');

/**#@+
 * Уникальные ключи и соли для аутентификации.
 *
 * Смените значение каждой константы на уникальную фразу.
 * Можно сгенерировать их с помощью {@link https://api.wordpress.org/secret-key/1.1/salt/ сервиса ключей на WordPress.org}
 * Можно изменить их, чтобы сделать существующие файлы cookies недействительными. Пользователям потребуется авторизоваться снова.
 *
 * @since 2.6.0
 */
define('AUTH_KEY',         'E&e[Tzz&Ob)C2X22rXs/7`,snysB--%C!U5j+J4 n&{&`0mP5W3`6%g2O&4.J_0]');
define('SECURE_AUTH_KEY',  'JHZWdn=!NE7`-CPe!5L<w&(i2792C/*KF|w ;1vU,e=2~xjBd+RbYy/elCOHu,xf');
define('LOGGED_IN_KEY',    'uYZI)c1HUx,o[#35sx^zKd[9]KA+#HALNzSO6;RRYH3:bWk{wWn:APJ`iJwqGfT[');
define('NONCE_KEY',        'mB&x@>DQwK2H%v?L@7xYvlNTTm]_ae<414vJz:uG0s8#Wg(}1F4zAs)vQ#N6PcH=');
define('AUTH_SALT',        'cnW1]^kP1rmrXKsrX!y~F8FvZ,?f=2tnd7NFkK4Qf9V,QPuxab[<@V$L<U{n~P/t');
define('SECURE_AUTH_SALT', '-*Z6*d,wWM+iJcuaQN%7v`Dkk-KLcPZ5Sb1Vt-^fgFSZ.,Q<~T6uz2bqB;{=An7p');
define('LOGGED_IN_SALT',   '0S5lj,TG^fkup$K1@+*&NeJXEVV^CRF>h~euT8L1R2a m!xPG.rYQ1&miBb=E8({');
define('NONCE_SALT',       ',<WDfM|`8Gn(4J<j>k}.gSae>2hZ]kYJ3OJyfEH/`+L>QiT.?po<^FO7/x)B{Fnq');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'wp_';

/**
 * Для разработчиков: Режим отладки WordPress.
 *
 * Измените это значение на true, чтобы включить отображение уведомлений при разработке.
 * Разработчикам плагинов и тем настоятельно рекомендуется использовать WP_DEBUG
 * в своём рабочем окружении.
 * 
 * Информацию о других отладочных константах можно найти в Кодексе.
 *
 * @link https://codex.wordpress.org/Debugging_in_WordPress
 */
define('WP_DEBUG', false);

/* Это всё, дальше не редактируем. Успехов! */

/** Абсолютный путь к директории WordPress. */
if ( !defined('ABSPATH') )
	define('ABSPATH', dirname(__FILE__) . '/');

/** Инициализирует переменные WordPress и подключает файлы. */
require_once(ABSPATH . 'wp-settings.php');
