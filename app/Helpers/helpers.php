
<?php

if (!function_exists('flashMessage')) {
    function flashMessage($message = '', $class = 'info')
    {
        request()->session()->flash('class', $class);
        request()->session()->flash('message', $message);
    }
}
