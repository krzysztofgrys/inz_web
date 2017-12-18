<?php

namespace App\Helpers;

class LayoutHelper
{
    public static function title($flash)
    {
        if (!is_array($flash)) {
            return $flash;
        }

        return array_key_exists('title', $flash) ? '<strong>' . $flash['title'] . '</strong></br>' : '';
    }

    public static function content($flash)
    {
        if (!is_array($flash)) {
            return '';
        }

        return array_key_exists('content', $flash) ? $flash['content'] : '';
    }

    public static function flushAllMessages($request)
    {
        $request->session()->forget('info');
        $request->session()->forget('warning');
        $request->session()->forget('error');
        $request->session()->forget('success');
    }

    public static function highlight($text, $words)
    {
        preg_match_all('~[A-Za-z0-9_äöüÄÖÜ]+~', $words, $m);
        if (!$m) {
            return $text;
        }
        $re = '~(' . implode('|', $m[0]) . ')~i';

        return preg_replace($re, '<mark>$0</mark>', $text);
    }

}
