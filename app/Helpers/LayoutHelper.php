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

    public static function flushAllMessages($request){
        $request->session()->forget('info');
        $request->session()->forget('warning');
        $request->session()->forget('error');
        $request->session()->forget('success');
    }

}
