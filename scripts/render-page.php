<?php
/**
 * Рендерит одну PHP-страницу в HTML для статической сборки.
 *
 * Использование: php scripts/render-page.php index > dist/index.html
 */

$page = $argv[1] ?? '';
$allowed = [
    'index',
    'lb1',
    'lb2',
    'lb3',
    'lb4',
    'lb5',
    'lb6',
    'lb7',
    'lb8',
    'class',
    'kursach',
];

if (!in_array($page, $allowed, true)) {
    fwrite(STDERR, "Неизвестная страница: {$page}\n");
    exit(1);
}

$root = dirname(__DIR__);
chdir($root);

$_SERVER['PHP_SELF'] = '/' . $page . '.php';
$_SERVER['SCRIPT_NAME'] = $_SERVER['PHP_SELF'];
$_SERVER['REQUEST_URI'] = $_SERVER['PHP_SELF'];

require $root . '/' . $page . '.php';
