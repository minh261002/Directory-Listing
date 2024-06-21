<?php

namespace App\Services;


class Notify
{
    static function success($message)
    {
        return notyf()->success($message)
            ->position('x', 'top')
            ->position('y', 'right');

    }

    static function error($message)
    {
        return notyf()->error($message)
            ->position('x', 'top')
            ->position('y', 'right');
    }

    static function warning($message)
    {
        return notyf()->warning($message)
            ->position('x', 'top')
            ->position('y', 'right');
    }

    static function info($message)
    {
        return notyf()->info($message)
            ->position('x', 'top')
            ->position('y', 'right');
    }

}