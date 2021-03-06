<?php

/*
 * This file is part of WordPlate.
 *
 * (c) Vincent Klaiber <hello@doubledip.se>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace WordPlate\Tests\Acf\Attributes;

use PHPUnit\Framework\TestCase;
use WordPlate\Acf\Attributes\Layout;

/**
 * This is the layout test class.
 *
 * @author Vincent Klaiber <hello@doubledip.se>
 */
class LayoutTest extends TestCase
{
    public function testGetKey()
    {
        $layout = $this->getLayout();
        $this->assertSame('group_block', $layout->getKey());

        $layout = $this->getLayout(['key' => 'layout_module']);
        $this->assertSame('layout_module', $layout->getKey());
    }

    public function testToArray()
    {
        $layout = $this->getLayout();

        $this->assertSame([
            'name' => 'block',
            'label' => 'Block',
            'sub_fields' => [
                [
                    'name' => 'text',
                    'label' => 'Text',
                    'type' => 'text',
                    'key' => 'field_3deb5ed4',
                ],
            ],
            'key' => 'layout_d8e82a5e',
        ], $layout->toArray());
    }

    protected function getLayout($config = [])
    {
        $layout = new Layout(array_merge([
            'name' => 'block',
            'label' => 'Block',
            'sub_fields' => [
                acf_text([
                    'name' => 'text',
                    'label' => 'Text',
                ]),
            ],
        ], $config));

        $layout->setParentKey('group');

        return $layout;
    }
}
