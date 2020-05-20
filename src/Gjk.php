<?php
/**
 * This file is part of the mucts.com.
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 *
 * @version 1.0
 * @author herry<yuandeng@aliyun.com>
 * @copyright © 2020 MuCTS.com All Rights Reserved.
 */

namespace MuCTS\Laravel\GuiJK;


use Exception;
use Illuminate\Support\Arr;
use MuCTS\Laravel\GuiJK\Config\Config;
use MuCTS\Laravel\GuiJK\Exceptions\InvalidArgumentException;
use MuCTS\Laravel\GuiJK\Exceptions\Exception as GjkException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Gjk
{
    use Sign;

    /** @var Config */
    private $config;

    public function __construct(?array $config)
    {
        $config = $config ?? config('gjk');
        $this->setConfig(new Config($config));
    }

    /**
     * Modify configuration information.
     *
     * @param Config $config
     * @return Gjk
     */
    public function setConfig(Config $config): self
    {
        $rules = [
            'url' => 'required|active_url',
            'app_id' => 'required|int',
            'secret_key' => 'required|string',
            'version' => 'required|int'
        ];
        $validator = validator($config->all(), [$rules]);
        if ($validator->fails()) {
            throw new InvalidArgumentException('Please set the correct configuration，error:' . $validator->errors());
        }
        $this->config = $config;
        return $this;
    }

    /**
     * Get GuiJk Server API request url
     *
     * @return string|null
     */
    protected function getUrl(): string
    {
        return $this->config->get('url');
    }

    /**
     * Get secret key
     *
     * @return string
     */
    protected function getSecretKey(): string
    {
        return $this->config->get('secret_key');
    }

    /**
     * get basic params
     *
     * @return array
     * @throws Exception
     */
    protected function getBasicParams(): array
    {
        return [
            "app_id" => $this->config->get('app_id'),
            "c_ver" => $this->config->get('version'),
            "nonce_str" => str_random(mt_rand(6, 32))
        ];
    }

    /**
     * Gjk Api Request
     *
     * @param string $route
     * @param array $param
     * @param int $timeOut
     * @return array|null
     * @throws Exception
     */
    public function request(string $route, array $param = [], $timeOut = 15): ?array
    {
        $param = ['user_id' => Arr::pull($param, 'user_id', mt_rand(1000000, 3000000))]
            + $this->getBasicParams() + $param;
        Arr::set($param, 'sign', $this->generateSign($param, $this->getSecretKey()));
        $client = new Client(["headers" => [], "timeout" => $timeOut]);
        $options = ['json' => $param];
        try {
            $response = $client->request('POST', rtrim($this->getUrl(), '/') . '/' . ltrim($route, '/'), $options);
        } catch (RequestException $exception) {
            $response = $exception->getResponse();
        } catch (Exception $exception) {
            throw new GjkException($exception->getMessage(), $exception->getCode(), $exception->getPrevious());
        }
        $response = $response ? $response->getBody() : null;
        return $response ? json_decode($response, true) : null;
    }
}