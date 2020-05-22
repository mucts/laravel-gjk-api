<?php


namespace MuCTS\Laravel\GuiJK;


use Illuminate\Support\Arr;

trait Sign
{
    /**
     * 校验签名
     *
     * @param array $param
     * @param string $secretKey
     * @return bool
     */
    public function verifySign(array $param, string $secretKey)
    {
        return $this->generateSign($param, $secretKey) === Arr::get($param, 'sign');
    }

    /**
     * 签名
     *
     * @param array $param
     * @param string $secretKey
     * @return string
     * @author herry.yao<yao.yuandeng@qianka.com>
     */
    public function generateSign(array $param, string $secretKey)
    {
        $this->_dictSort($param);
        return strtoupper(md5($this->_createLinkString($param) . '&key=' . $secretKey));
    }

    /**
     * 字典排序
     *
     * @param array $param 待排序参数
     */
    private function _dictSort(array &$param)
    {
        ksort($param);
        reset($param);
    }

    /**
     * 字符串拼接并去除转义
     * @param array $param 带拼接数组
     * @return string
     */
    private function _createLinkString(array $param = [])
    {
        return collect($param)->filter(function ($value, $key) {
            return !is_null($value) && $value !== '' && !Arr::exists(['sign', 'sign_type'], $key);
        })->map(function ($value, $key) {
            return sprintf('%s=%s', $key,
                is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value);
        })->implode('&');
    }
}