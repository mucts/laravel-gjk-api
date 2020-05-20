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

namespace MuCTS\Laravel\GuiJK\Facades;


use Illuminate\Support\Facades\Facade;
use MuCTS\Laravel\GuiJK\Config\Config;

/**
 * Class Gik
 *
 * @method static null|array request(string $route, array $param = [], $timeOut = 15)
 * @method static \MuCTS\Laravel\GuiJK\Gjk setConfig(Config $config)
 * @package MuCTS\Laravel\GuiJK\Facades
 */
class Gjk extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'gjk';
    }
}