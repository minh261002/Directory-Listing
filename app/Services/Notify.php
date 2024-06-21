<?php

namespace App\Services;

class Notify
{
    public static function success($message)
    {
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->success($message);
    }

    public static function error($message)
    {
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->error($message);
    }

    public static function info($message)
    {
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->info($message);
    }

    public static function warning($message)
    {
        notyf()
            ->dismissible(true)
            ->position('x', 'right')
            ->position('y', 'top')
            ->warning($message);
    }
}
