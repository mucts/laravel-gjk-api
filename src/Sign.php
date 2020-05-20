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
        self::_dictSort($param);
        return strtoupper(md5(self::_createLinkString($param) . '&key=' . $secretKey));
    }

    /**
     * 字典排序
     *
     * @param array $param 待排序参数
     */
    private static function _dictSort(array &$param)
    {
        ksort($param);
        reset($param);
    }

    /**
     * 字符串拼接并去除转义
     * @param array $param 带拼接数组
     * @return string
     */
    private static function _createLinkString(array $param = [])
    {
        $linkString = "";
        foreach ($param as $key => $value) {
            if (is_null($value) || $value === "" || $key === "sign" || $key == "sign_type") continue;
            $value = is_array($value) ? json_encode($value, JSON_UNESCAPED_UNICODE) : $value;
            $linkString .= "{$key}={$value}&";
        }
        $linkString = substr($linkString, 0, strlen($linkString) - 1);
        return $linkString;
    }
}