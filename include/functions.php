<?php /** @noinspection ALL */

use Stk2k\Util\Util;
use Calgamo\Framework\Util\LoggerUtil;

use DepositSystem\Service\LangService;

function h($html)
{
    return Util::escape($html);
}

function e($value, string $value_on_empty = '')
{
    echo strlen($value) === 0 ? h($value_on_empty) : h($value);
}

function d( $data )
{
    echo Util::dump( $data, 'html', 1, [], true, 255 );
}

function dt($date_str, string $format = 'Y年m月d日 H:i')
{
    return strtotime($date_str) ? date($format, strtotime($date_str)) : '-';
}

function dte($date_str, string $format = 'Y年m月d日 H:i')
{
    echo dt($date_str, $format);
}

function score(float $score, int $precision)
{
    return $score >=0 ? round($score,$precision) : '-';
}

function n(int $number)
{
    return number_format($number);
}

function ne(int $number)
{
    echo number_format($number);
}

function nx($number, $x)  { return number_format($number, $x, '.', ''); }
function nxe($number, $x) { echo nx($number, $x); }
function n8($number)      { return nx($number, 8); }
function n8e($number)     { echo nx($number, 8); }
function n6($number)      { return nx($number, 6); }
function n6e($number)     { echo nx($number, 6); }
function n5($number)      { return nx($number, 5); }
function n5e($number)     { echo nx($number, 5); }
function n4($number)      { return nx($number, 4); }
function n4e($number)     { echo nx($number, 4); }
function n3($number)      { return nx($number, 3); }
function n3e($number)     { echo nx($number, 3); }
function n2($number)      { return nx($number, 2); }
function n2e($number)     { echo nx($number, 2); }

function debug($var)
{
    echo '<pre style="z-index: 9999; position: absolute; left: 0; top: 0; width: 100%">';
    list($file, $line) = Util::caller();
    echo basename($file) . '(' . $line . ')' . PHP_EOL;
    var_dump($var);
    echo '</pre>';
}

function front_url()    { return $_ENV['FRONT_URL'] ?? ''; }

function url(string $url, $base_url_type)
{
    switch($base_url_type)
    {
        case 'front':
            return front_url() . $url;
    }
    throw new InvalidArgumentException('wrong base_url_type');
}
function urle(string $url, $base_url_type)
{
    echo url($url, $base_url_type);
}