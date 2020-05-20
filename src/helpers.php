<?php

use MuCTS\Laravel\GuiJK\Facades\Gjk;

if (!function_exists('gjk_request')) {
    /**
     * Gjk API Request
     *
     * @param string $route
     * @param array $params
     * @param int $timeOut
     * @return string|array|null
     */
    function gjk_request($route, $params, $timeOut = 15)
    {
        return Gjk::request($route, $params, $timeOut);
    }
}

if (!function_exists("str_random")) {
    /**
     * string random
     * @param int $length
     * @return string
     * @throws Exception
     */
    function str_random(int $length)
    {
        $string = '';
        while (($len = strlen($string)) < $length) {
            $size = $length - $len;
            $bytes = random_bytes($size);
            $string .= substr(str_replace(['/', '+', '='], '', base64_encode($bytes)), 0, $size);
        }
        return $string;
    }
}