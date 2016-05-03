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
define('DB_NAME', 'shodiyona');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

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
define('AUTH_KEY',         'u}UyIHGqF_QIQ`+V:+yR5<TRT1jW@-h/9**ngabs/GwC<n:k(^JTB6R*7_,%^ts|');
define('SECURE_AUTH_KEY',  '01f%w8Bv{8iLZKbB9_#@Fwrnnq1#!Wq5CvamJr[774R}zFO~*HZ!-:V-fPT&;;Sv');
define('LOGGED_IN_KEY',    'v^|PEY|C/uL-6 |%Jq^-[x0j4flxFsv^@6bLMz4FNP#4.Wf(*+zADHonDoE8SA>.');
define('NONCE_KEY',        'Bqwal@{CTMgkjkIo/UbRuN+tE0)y6wtZWzxIpK 2xox>3m5VqY<x wNR$+6)j&/X');
define('AUTH_SALT',        'y9dK9qRZKx:PzS)bBh2.:}fnXD,LciT)]yN2HG11Jxau^<Ye?d-c/XMnF}ccU |0');
define('SECURE_AUTH_SALT', 'Lg!f>z[/e(Zj+:$6}LCTh!Y56Cc h=Q.:q[cgJiZB6_qLd(ZN_$oOfkN.:qVy%(s');
define('LOGGED_IN_SALT',   'Fozjh{#R0ga+1O`TX9ygFp;S2<HLMQsu}wL^sYijAi/Rz>|yG<BzQX0op,V!Ft9 ');
define('NONCE_SALT',       '5zHhKsa4%]>dEs}Eg&;Qn`L%daN}?+`~bjyO</mhBWDLXxF2Z} !|O(3#<aF+/|0');

/**#@-*/

/**
 * Префикс таблиц в базе данных WordPress.
 *
 * Можно установить несколько сайтов в одну базу данных, если использовать
 * разные префиксы. Пожалуйста, указывайте только цифры, буквы и знак подчеркивания.
 */
$table_prefix  = 'shod8273_';

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
