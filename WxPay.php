<?php

namespace c4ys\wxpay;

use yii\base\Component;


class WxPay extends Component
{
    public $app_id;
    public $mch_id;
    public $key;
    public $app_secret;
    public $ssl_cert_path;
    public $ssl_key_path;
    public $notify_url;
    public $proxy_host = '0.0.0.0';
    public $proxy_port = 0;
    public $report_level = 1;
    public $sign_type = 'HMAC-SHA256';
    /**
     * @var WxPayConfig $wxPayConfig ;
     */
    protected $wxPayConfig;

    public function init()
    {
        require_once('lib/WxPay.Api.php');
        require_once('lib/WxPay.Exception.php');
        require_once('lib/WxPay.Data.php');
        require_once('lib/WxPay.Notify.php');
        $this->wxPayConfig = new WxPayConfig();
        $this->wxPayConfig->config = $this;
    }

    /**
     * @param \WxPayUnifiedOrder $inputObj
     * @param int $timeOut
     * @return mixed
     */
    public function unifiedOrder($inputObj, $timeOut = 6)
    {
        return \WxPayApi::unifiedOrder($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function orderQuery($inputObj, $timeOut = 6)
    {
        return \WxPayApi::orderQuery($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function closeOrder($inputObj, $timeOut = 6)
    {
        return \WxPayApi::orderQuery($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function refund($inputObj, $timeOut = 6)
    {
        return \WxPayApi::refund($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function refundQuery($inputObj, $timeOut = 6)
    {
        return \WxPayApi::refundQuery($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function downloadBill($inputObj, $timeOut = 6)
    {
        return \WxPayApi::downloadBill($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function micropay($inputObj, $timeOut = 10)
    {
        return \WxPayApi::micropay($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function reverse($inputObj, $timeOut = 6)
    {
        return \WxPayApi::reverse($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function report($inputObj, $timeOut = 1)
    {
        return \WxPayApi::report($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function bizpayurl($inputObj, $timeOut = 6)
    {
        return \WxPayApi::bizpayurl($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function shorturl($inputObj, $timeOut = 6)
    {
        return \WxPayApi::shorturl($this->wxPayConfig, $inputObj, $timeOut);
    }

    public function notify($callback, &$msg)
    {
        return \WxPayApi::notify($this->wxPayConfig, $callback, $msg);
    }

    public function getNonceStr($length = 32)
    {
        return \WxPayApi::getNonceStr($length);
    }
}
