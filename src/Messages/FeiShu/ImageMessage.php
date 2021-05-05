<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Messages\FeiShu;

use Guanguans\Notify\Messages\Message;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ImageMessage extends Message
{
    protected $type = 'image';

    protected $initOptions = [];

    /**
     * TextMessage constructor.
     *
     * @param string $text
     */
    public function __construct(array $options = [])
    {
        parent::__construct($options);
    }

    /**
     * @return $this
     */
    public function setOptions(array $options): self
    {
        $diffOptions = configure_options(array_diff($options, $this->options), function (OptionsResolver $resolver) {
            $resolver->setDefined([
                'image_key',
                'keyword',
                'secret',
            ]);

            $resolver->setAllowedTypes('image_key', 'string');
            $resolver->setAllowedTypes('keyword', 'string');
            $resolver->setAllowedTypes('secret', 'string');
        });

        $this->options = array_merge($this->options, $diffOptions);

        return $this;
    }

    public function getData()
    {
        $data = [
            'msg_type' => $this->type,
            'content' => $this->options,
        ];

        // if (isset($this->options['keyword']) && $this->options['keyword']) {
        //     $data['content']['text'] = sprintf("关键字: %s\n%s", $data['content']['keyword'], $data['content']['text']);
        // }

        if ($this->options['secret']) {
            $data['timestamp'] = $time = time();
            $data['sign'] = $this->getSign($this->options['secret'], $time);
        }

        return $data;
    }

    /**
     * @return string
     */
    protected function getSign(string $secret, int $timestamp)
    {
        $stringToSign = sprintf("%s\n%s", $timestamp, $secret);

        $hash = hash_hmac('sha256', '', $stringToSign, true);

        return base64_encode($hash);
    }
}