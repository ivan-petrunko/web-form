<?php

declare(strict_types=1);

namespace Tests\Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\TextAreaElement;
use PHPUnit\Framework\TestCase;

class TextAreaElementTest extends TestCase
{
    public function testRender(): void
    {
        self::assertEquals(
            '<label for="txtComment">Comment</label><textarea name="comment" id="txtComment" class="comment-field" placeholder="Type something here" minlength="100" maxlength="512" rows="5" cols="20" required>Some text is already here!</textarea>',
            (new TextAreaElement('comment'))
                ->setId('txtComment')
                ->setLabel('Comment')
                ->setPlaceholder('Type something here')
                ->setIsRequired(true)
                ->setMinLength(100)
                ->setMaxLength(512)
                ->setRows(5)
                ->setCols(20)
                ->setClass('comment-field')
                ->setValue('Some text is already here!')
                ->render()
        );
    }
}
