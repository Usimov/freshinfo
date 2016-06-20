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
define('DB_NAME', 'u751787471_wp');

/** Имя пользователя MySQL */
define('DB_USER', 'u751787471_wp');

/** Пароль к базе данных MySQL */
define('DB_PASSWORD', '111111');

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
define('AUTH_KEY',         'Q-n=t:.H!eJPa /&oT$;af+~S xa[6?}GbuO~~]6fyZ?pIID^sIwc$4X4;+ lY2-');
define('SECURE_AUTH_KEY',  'L@ZdA@5cKTXHz*+D)XyN(-i4]P;w}+Guknvq39:E?mMsn]HKs<oH,P$>HH*rkM-(');
define('LOGGED_IN_KEY',    'Rwx6-VLIgni1Cb.2VQzO,wjn#PT~<%+]SonCK^k@n.aGk<|4uMj9h$fQ0xc|Q;OG');
define('NONCE_KEY',        'gBqsr}ymHJuV,?Zg$b34A?WQ{n(KICsmL-M*Bp;L|:^K&iCZ6F<vP|8nASc2N}[7');
define('AUTH_SALT',        'crgBTugyL{l3/z`K0/H]JS#aHc!CoTWc2o=<ynk^z+Q|_.hvGm5ZSi[Jg5#Gx,92');
define('SECURE_AUTH_SALT', '&k-&]*R3K|HQ2uW*<Ilr5+_gZN~_;|^r>0%7-h7tkjkU2*VfKC!|IAwn.|aU7jh^');
define('LOGGED_IN_SALT',   'ERcN:;zU-d]- 3|#&|AT2?.Lm,<:9PFj<CGhy,HF-2M;C.;(Q]Dm.67-J!|W&aC;');
define('NONCE_SALT',       'Ef|!GSaW{`aU67#&jo&cw)t^s++suR(vhX.._UU`$9S_t0zs#Y5(:AU3,ADj}$AJ');

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
