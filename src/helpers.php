<?php

use MuCTS\LaravelGuiJkAPI\Sign;

if (!function_exists('gjk_request')) {
    /**
     * Gjk API Request
     *
     * @param string $route
     * @param array $params
     * @return string|array|null
     * @throws Exception
     * @throws \GuzzleHttp\Exception\GuzzleException
     */
    function gjk_request($route, $params)
    {
        $params = array_merge(["app_id" => config('gjk.app_id'), "user_id" => mt_rand(1000000, 3000000), "c_ver" => config('gjk.version'), "nonce_str" => str_random(mt_rand(6, 32))], $params);
        $params = array_merge($params, ["sign" => Sign::makeSign($params, config('gjk.secret_key'))]);
        $url = trim(config('gjk.url'), '/') . '/' . ltrim($route, '/');
        $response = api_request($url, 'post', $params);
        return $response ? json_decode($response, true) : null;
    }
}