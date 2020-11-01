<?php

declare(strict_types=1);

namespace Tests\Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\PlaceholderElement;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Petrunko\Web\Form\Element\PlaceholderElement
 */
class PlaceholderElementTest extends TestCase
{
    public function testRender(): void
    {
        self::assertEquals(
            '<span id="placeholder"></span>',
            (new PlaceholderElement('placeholder'))
                ->render()
        );

        self::assertEquals(
            '<span id="placeholder-with-loading-text">Loading...</span>',
            (new PlaceholderElement('placeholder-with-loading-text'))
                ->setValue('Loading...')
                ->render()
        );
    }
}

