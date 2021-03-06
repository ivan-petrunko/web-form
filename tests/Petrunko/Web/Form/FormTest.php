<?php

declare(strict_types=1);

namespace Tests\Petrunko\Web\Form;

use Petrunko\Web\Form\Element\Enum\InputTypeEnum;
use Petrunko\Web\Form\Element\Enum\LinkTargetEnum;
use Petrunko\Web\Form\Element\File;
use Petrunko\Web\Form\Element\InputFormElement;
use Petrunko\Web\Form\Element\LinkElement;
use Petrunko\Web\Form\Enum\EncTypeEnum;
use Petrunko\Web\Form\Form;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Petrunko\Web\Form\Form
 */
class FormTest extends TestCase
{
    public function testRender(): void
    {
        self::assertXmlStringEqualsXmlString(
            '<form method="POST" enctype="application/x-www-form-urlencoded"></form>',
            (new Form())->render()
        );

        self::assertEquals(
            '<form action="submit.php" method="POST" enctype="multipart/form-data">' .
                '<label for="name">Name</label>' .
                '<input name="name" type="text" id="name" required="required" />' .
                '<label for="fileUpload">Document</label>' .
                '<input name="doc" type="text" id="fileUpload" />' .
                '<input name="submit" value="Submit" type="submit" />' .
                '<a href="https://foo.bar" target="_blank" class="link-looking-like-button">Click me!</a>' .
            '</form>',
            (new Form())
                ->setAction('submit.php')
                ->setEnctype(EncTypeEnum::MULTIPART_FORM_DATA)
                ->addElement(
                    (new InputFormElement('name'))
                        ->setId('name')
                        ->setLabel('Name')
                        ->setRequired()
                )
                ->addElement(
                    (new File('doc'))
                        ->setId('fileUpload')
                        ->setLabel('Document')
                )
                ->addElement(
                    (new InputFormElement('submit'))
                        ->setType(InputTypeEnum::SUBMIT)
                        ->setValue('Submit')
                )
                ->addElement(
                    (new LinkElement('https://foo.bar', 'Click me!'))
                        ->setTarget(LinkTargetEnum::BLANK)
                        ->setClass('link-looking-like-button')
                )
                ->render()
        );
    }
}
