<?php

/**
 * This file is part of the guanguans/notify.
 *
 * (c) guanguans <ityaozm@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled.
 */

namespace Guanguans\Notify\Tests\Feature;

use Guanguans\Notify\Factory;
use Guanguans\Notify\Tests\TestCase;

class BarkTest extends TestCase
{
    public function testBark()
    {
        $this->expectException(\GuzzleHttp\Exception\ClientException::class);

        $barkMessage = new \Guanguans\Notify\Messages\BarkMessage([
            'title' => 'This is title.',
            'text' => 'This is text.',
            'copy' => 'This is copy.',
            'url' => 'https://github.com/guanguans/notify',
            // 'sound'             => 'bell',
            // 'isArchive'         => 1,
            // 'automaticallyCopy' => 1,
        ]);
        Factory::bark()
            // ->setBaseUri('The server address of your own deployment.')
            ->setToken('ihnPXb8KDj9dHStfQ5c')
            ->setMessage($barkMessage)
            ->send();
    }
}