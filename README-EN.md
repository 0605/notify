# notify

[简体中文](README.md) | [ENGLISH](README-EN.md)

> Multi platform notification SDK(Bark、Chanify、DingTalk、FeiShu、ServerChan、WeWork、XiZhi). - 多平台通知 SDK(Bark、Chanify、钉钉群机器人、飞书群机器人、Server 酱、企业微信群机器人、息知)。

[![Tests](https://github.com/guanguans/notify/workflows/Tests/badge.svg)](https://github.com/guanguans/notify/actions)
[![Check & fix styling](https://github.com/guanguans/notify/workflows/Check%20&%20fix%20styling/badge.svg)](https://github.com/guanguans/notify/actions)
[![codecov](https://codecov.io/gh/guanguans/notify/branch/main/graph/badge.svg?token=URGFAWS6S4)](https://codecov.io/gh/guanguans/notify)
[![Latest Stable Version](https://poser.pugx.org/guanguans/notify/v)](//packagist.org/packages/guanguans/notify)
[![Total Downloads](https://poser.pugx.org/guanguans/notify/downloads)](//packagist.org/packages/guanguans/notify)
[![License](https://poser.pugx.org/guanguans/notify/license)](//packagist.org/packages/guanguans/notify)

## Platform support

* [Bark](https://github.com/Finb/Bark)
* [Chanify](https://github.com/chanify/chanify-ios)
* [DingTalk](https://developers.dingtalk.com/document/app/custom-robot-access)
* [FeiShu](https://www.feishu.cn/hc/zh-CN/articles/360024984973)
* [ServerChan](https://sct.ftqq.com)
* [WeWork](https://work.weixin.qq.com/help?doc_id=13376)
* [XiZhi](https://xz.qqoq.net/#/index)

## Requirement

* PHP >= 7.2

## Installation

``` bash
$ composer require guanguans/notify -vvv
```

## Usage

### Bark

``` php
use Guanguans\Notify\Factory;

$barkMessage = new \Guanguans\Notify\Messages\BarkMessage([
    'title' => 'This is title.',
    'text'  => 'This is text.',
    'copy'  => 'This is copy.',
    'url'   => 'https://github.com/guanguans/notify',
    // 'sound'             => 'bell',
    // 'isArchive'         => 1,
    // 'automaticallyCopy' => 1,
]);
Factory::bark()
    // ->setBaseUri('The server address of your own deployment.')
    ->setToken('ihnPXb8KDj9dHStfQ5c')
    ->setMessage($barkMessage)
    ->send();
```

### Chanify

``` php
// Text Message
Factory::chanify()
    // ->setBaseUri('The server address of your own deployment.')
    ->setToken('fh4gGEiJBQVdIWlVKS1JORVY0UlVETFZYVVpRTlNLTlVZVlZPT1JFGhR7vAyf8Uj5UQhhK4n6QfVzih96QyIECAEQAQ.E0eBnLbfNwWrWZ1YSAZfkCQWZAPdBl6pVr26lRf6Srs')
    ->setMessage((new \Guanguans\Notify\Messages\Chanify\TextMessage([
        'title'    => 'This is title.',
        'text'     => 'This is text.',
        // 'copy'     => 'This is copy.',
        // 'actions'  => [
        //     "ActionName1|http://<action host>/<action1>",
        //     "ActionName2|http://<action host>/<action2>",
        // ],
        // 'autocopy' => 0,
        // 'sound'    => 0,
        // 'priority' => 10,
    ])))
    ->send();

// Link Message
Factory::chanify()
    // ->setBaseUri('The server address of your own deployment.')
    ->setToken('fh4gGEiJBQVdIWlVKS1JORVY0UlVETFZYVVpRTlNLTlVZVlZPT1JFGhR7vAyf8Uj5UQhhK4n6QfVzih96QyIECAEQAQ.E0eBnLbfNwWrWZ1YSAZfkCQWZAPdBl6pVr26lRf6Srs')
    ->setMessage((new \Guanguans\Notify\Messages\Chanify\LinkMessage([
        'link'     => 'https://github.com/guanguans/notify',
        // 'sound'    => 0,
        // 'priority' => 10,
    ])))
    ->send();
```

### DingTalk

``` php
// Text Message
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage((new \Guanguans\Notify\Messages\DingTalk\TextMessage([
        'content'   => 'This is content(keyword).',
        // 'atMobiles' => [13948484984],
        // 'atUserIds' => [123456],
        // 'isAtAll'   => false,
    ])))
    ->send();

// Link Message
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage((new \Guanguans\Notify\Messages\DingTalk\LinkMessage([
        'title'      => 'This is content.',
        'text'       => 'This is text(keyword).',
        'messageUrl' => 'https://github.com/guanguans/notify',
        'picUrl'     => 'https://avatars.githubusercontent.com/u/22309277?v=4',
    ])))
    ->send();

// Markdown Message
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage((new \Guanguans\Notify\Messages\DingTalk\MarkdownMessage([
        'title' => 'This is title.',
        'text'  => '> This is text(keyword).',
        // 'atMobiles' => [13948484984],
        // 'atUserIds' => [123456],
        // 'isAtAll'   => false,
    ])))
    ->send();

// Feed Card Message
$message = new \Guanguans\Notify\Messages\DingTalk\FeedCardMessage([
    'title'      => 'This is title(keyword) 0.',
    'messageURL' => 'https://github.com/guanguans/notify',
    'picURL'     => 'https://avatars.githubusercontent.com/u/22309277?v=4'
]);
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage($message)
    ->send();

// Single Action Card Message
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage(new \Guanguans\Notify\Messages\DingTalk\SingleActionCardMessage([
        'title'       => 'This is title(keyword).',
        'text'        => 'This is text.',
        'singleTitle' => 'This is singleTitle.',
        'singleURL'   => 'https://avatars.githubusercontent.com/u/22309277?v=4',
        // 'btnOrientation' => 1
    ]))
    ->send();

// Btns Action Card Message
$message = new \Guanguans\Notify\Messages\DingTalk\BtnsActionCardMessage([
    'title'          => 'This is title(keyword).',
    'text'           => 'This is text.',
    // 'hideAvatar'     => 1,
    // 'btnOrientation' => 1,
]);
$message->addBtn([
    'title'     => 'This is title 1',
    'actionURL' => 'https://github.com/guanguans/notify',
]);
$message->addBtn([
    'title'     => 'This is title 2',
    'actionURL' => 'https://github.com/guanguans/notify',
]);
Factory::dingTalk()
    ->setToken('c44fec1ddaa8a833156efb77b7865d62ae13775418030d94d05da08bfca73e')
    ->setSecret('SECc32bb7345c0f73da2b9786f0f7dd5083bd768a29b82e6d460149d730eee51730')
    ->setMessage($message)
    ->send();
```

### FeiShu

``` php
// Text Message
Factory::feiShu()
    ->setToken('b6eb70d9-6e19-4f87-af48-348b028186')
    ->setSecret('iigDOvnsIn6aFS1pYHHEHh')
    ->setMessage(new \Guanguans\Notify\Messages\FeiShu\TextMessage('This is title(keyword).'))
    ->send();

// Post Message
$post = [
    'zh_cn' => [
        'title'   => '项目更新通知',
        'content' => [
            [
                [
                    "tag"  => "text",
                    "text" => "项目有更新(keyword)"
                ]
            ]
        ]
    ]
];
Factory::feiShu()
    ->setToken('b6eb70d9-6e19-4f87-af48-348b028186')
    ->setSecret('iigDOvnsIn6aFS1pYHHEHh')
    ->setMessage(new \Guanguans\Notify\Messages\FeiShu\PostMessage($post))
    ->send();

// Image Message
Factory::feiShu()
    ->setToken('b6eb70d9-6e19-4f87-af48-348b028186')
    ->setSecret('iigDOvnsIn6aFS1pYHHEHh')
    ->setMessage(new \Guanguans\Notify\Messages\FeiShu\ImageMessage('img_ecffc3b9-8f14-400f-a014-05eca1a4xxxx'))
    ->send();

// ShareChat Message
Factory::feiShu()
    ->setToken('b6eb70d9-6e19-4f87-af48-348b028186')
    ->setSecret('iigDOvnsIn6aFS1pYHHEHh')
    ->setMessage(new \Guanguans\Notify\Messages\FeiShu\ShareChatMessage('oc_f5b1a7eb27ae2c7b6adc2a74fafxxxxx'))
    ->send();

// Card Message
$card = [
    'elements' => [
        [
            'tag'  => 'div',
            'text' => [
                'content' => '**西湖(keyword)**，位于浙江省杭州市西湖区龙井路1号，杭州市区西部，景区总面积49平方千米，汇水面积为21.22平方千米，湖面面积为6.38平方千米。',
                'tag'     => 'lark_md',
            ],
        ],
    ],
];
Factory::feiShu()
    ->setToken('b6eb70d9-6e19-4f87-af48-348b0281866c')
    ->setSecret('iigDOvnsIn6aFS1pYHHEHh')
    ->setMessage(new \Guanguans\Notify\Messages\FeiShu\CardMessage($card))
    ->send();
```

### ServerChan

``` php
Factory::serverChan()
    ->setToken('SCT35149Thtf1g2Bc14QJuQ6HFpW5YG')
    ->setMessage(new \Guanguans\Notify\Messages\ServerChanMessage('This is title.', 'This is desp.'))
    ->send();

// Check
Factory::serverChan()->check(3334849, 'SCTJlJV1J87hS');
```

### WeWork

``` php
// Text Message
Factory::weWork()
    ->setToken('73a3d5a3-ceff-4da8-bcf3-ff5891778f')
    ->setMessage((new \Guanguans\Notify\Messages\WeWork\TextMessage([
        'content'               => 'This is content.',
        // 'mentioned_list'        => ["wangqing", "@all"],
        // 'mentioned_mobile_list' => ["13800001111", "@all"],
    ])))
    ->send();

// Markdown Message
Factory::weWork()
    ->setToken('73a3d5a3-ceff-4da8-bcf3-ff5891778f')
    ->setMessage(new \Guanguans\Notify\Messages\WeWork\MarkdownMessage("# This is title.\n This is content."))
    ->send();

// Image Message
Factory::weWork()
    ->setToken('73a3d5a3-ceff-4da8-bcf3-ff5891778f')
    ->setMessage(new \Guanguans\Notify\Messages\WeWork\ImageMessage('https://avatars.githubusercontent.com/u/22309277?v=4'))
    ->send();

// News Message
$message = new \Guanguans\Notify\Messages\WeWork\NewsMessage([
    'title'       => 'This is title1.',
    'description' => 'This is description.',
    'url'         => 'https://github.com/guanguans/notify',
    'picurl'      => 'https://avatars.githubusercontent.com/u/22309277?v=4',
]);
$message->addArticle([
    'title'       => 'This is title2.',
    'description' => 'This is description.',
    'url'         => 'https://github.com/guanguans/notify',
    'picurl'      => 'https://avatars.githubusercontent.com/u/22309277?v=4',
]);
Factory::weWork()
    ->setToken('73a3d5a3-ceff-4da8-bcf3-ff5891778f')
    ->setMessage($message)
    ->send();
```

### XiZhi

``` php
// Single
Factory::xiZhi()
    // ->setType('single')
    ->setToken('XZd60aea56567ae39a1b1920cbc42bb5')
    ->setMessage(new \Guanguans\Notify\Messages\XiZhiMessage('This is title.', 'This is content.'))
    ->send();

// Channel
Factory::xiZhi()
    ->setType('channel')
    ->setToken('XZ8da15b55a6725497232d87298bcd34')
    ->setMessage(new \Guanguans\Notify\Messages\XiZhiMessage('This is title.', 'This is content.'))
    ->send();
```

## Testing

``` bash
$ composer test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

* [guanguans](https://github.com/guanguans)
* [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE) for more information.