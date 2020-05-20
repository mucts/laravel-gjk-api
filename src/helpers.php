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