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
define('DB_NAME', 'revcult');

/** Имя пользователя MySQL */
define('DB_USER', 'root');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '');

/** Имя сервера MySQL */
define('DB_HOST', 'localhost');

/** Кодировка базы данных для создания таблиц. */
define('DB_CHARSET', 'utf8');

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
define('AUTH_KEY',         'B>*47UDf)z1K-5oLG4~ABJC3m/l}X<J[F;6A?$bU>#Rysk;1NgP$wDXc#!}KqZQw');
define('SECURE_AUTH_KEY',  '.hrc`Ywlgej^MUBJLEiK9=UdBN4x$|!}xUAo>tk|. &@bhK#5u^*K?woXD*Cx789');
define('LOGGED_IN_KEY',    '^AOb4B^e<k}lze@;fY-p_(un`#JQ?`VDVyI#}.QeO!QLDLJ]]DVV~f|rC_#Z% ;/');
define('NONCE_KEY',        ' ,@f6htf%%sI]TK.Gt<HVWDfpA,3L<$wqG8|XUAYGh~qj 7W]T]r$[!9SCh]Ba/b');
define('AUTH_SALT',        '.t[F|s-U0mcoY7_HOgi!5,[y;.<-Y5kSN=}XK{@|M+`6GMn]V1L${E-G] bXc3DR');
define('SECURE_AUTH_SALT', 'R%6|]9n05qy,mBE<rWGkpVPfZ_?anTHXh}J~HhdK+D?WpOOX4bo$oI$:TIG2S}uT');
define('LOGGED_IN_SALT',   'KmY.HA k6fys*]nW:R|,J;@/Q<w$L3nK1*K&+bnj=i,[&b-M6%/RzR;kGd9Rn,i.');
define('NONCE_SALT',       'v.N|a-K2,((7q:,N]t@&8d!gei X3: =aTS EecG_ui%&>|R~o>T!sPkmSq8C70S');

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
