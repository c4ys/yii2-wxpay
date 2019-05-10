Yii2微信支付扩展
==========
适用于Yii2的微信支付扩展

在[imxiangli/yii2-wxpay](https://github.com/imxiangli/yii2-wxpay)基础上改造

* 支持企业付款
* 支持微信最新SDK



安装
------------

修改composer.json

```json
{
      "repositories": [
        {
          "url": "https://github.com/c4ys/yii2-wxpay.git",
          "type": "vcs"
        }
      ]
}
```

```json
{
    "require": {
       "c4ys/yii2-wechat": "*"
    }
}
```

to the require section of your `composer.json` file.


用法
-----


### 第一步，添加配置（注意看注释说明）

```php
// common/config/main-local.php
<?php
return [
  'components' => [
  
      // ...
      
      'wxpay' => [
          'class' => \c4ys\wxpay\WxPay::class,
          'app_id' => '', // 绑定支付的APPID（必须配置，开户邮件中可查看）
          'mch_id' => '', // 商户号（必须配置，开户邮件中可查看）
          'key' => '', // 商户支付密钥，参考开户邮件设置（必须配置，登录商户平台自行设置）设置地址：https://pay.weixin.qq.com/index.php/account/api_cert
          'app_secret' => '', // 公众帐号secert（仅JSAPI支付的时候需要配置， 登录公众平台，进入开发者中心可设置），获取地址：https://mp.weixin.qq.com/advanced/advanced?action=dev&t=advanced/dev&token=2005451881&lang=zh_CN
          // 下面两行是证书路径,注意应该填写绝对路径（仅退款、撤销订单时需要，可登录商户平台下载，API证书下载地址：https://pay.weixin.qq.com/index.php/account/api_cert，下载之前需要安装商户操作证书）
          'ssl_cert_path' => Yii::getAlias('@common/secret/apiclient_cert.pem'), // apiclient_cert.pem
          'ssl_key_path' => Yii::getAlias('@common/secret/apiclient_key.pem'), // apiclient_key.pem
          'notify_url' => '', // 支付异步通知地址绝对url（必须填写，用于支付成功后微信支付通知的接收），例如：http://www.hufenbao.com/wx/pay-notify.html 该地址的伪静态URL风格请自行参考Yii2文档
        ],
        
        // ...
        
    ]
];
```

