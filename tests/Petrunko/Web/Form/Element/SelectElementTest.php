<?php

declare(strict_types=1);

namespace Tests\Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\SelectElement;
use Petrunko\Web\Form\Element\SelectOptionElement;
use Petrunko\Web\Form\Element\SelectOptionGroup;
use PHPUnit\Framework\TestCase;

/**
 * @covers \Petrunko\Web\Form\Element\SelectElement
 */
class SelectElementTest extends TestCase
{
    public function testRender(): void
    {
        self::assertEquals(
            '<select name="select" ></select>',
            (new SelectElement('select'))
                ->render()
        );

        self::assertEquals(
            '<label for="selectGender">Gender</label>' .
            '<select name="gender" id="selectGender">' .
                '<option value="male" >Male</option>' .
                '<option value="female" >Female</option>' .
            '</select>',
            (new SelectElement('gender'))
                ->setId('selectGender')
                ->setLabel('Gender')
                ->addChild(new SelectOptionElement('male', 'Male'))
                ->addChild(new SelectOptionElement('female', 'Female'))
                ->render()
        );

        self::assertEquals(
            '<label for="selectWhoAmI">Who am I?</label>' .
            '<select name="who_am_i" id="selectWhoAmI">' .
                '<optgroup label="Human" >' .
                    '<option value="male" selected="selected">Male</option>' .
                    '<option value="female" >Female</option>' .
                '</optgroup>' .
                '<optgroup label="Pet" disabled="disabled">' .
                    '<option value="dog" >Dog</option>' .
                    '<option value="cat" >Cat</option>' .
                    '<option value="parrot" >Parrot</option>' .
                '</optgroup>' .
            '</select>',
            (new SelectElement('who_am_i'))
                ->setId('selectWhoAmI')
                ->setLabel('Who am I?')
                ->addChild(
                    (new SelectOptionGroup('Human'))
                        ->addChild(new SelectOptionElement('male', 'Male', true))
                        ->addChild(new SelectOptionElement('female', 'Female'))
                )
                ->addChild(
                    (new SelectOptionGroup('Pet', true))
                        ->addChild(new SelectOptionElement('dog', 'Dog'))
                        ->addChild(new SelectOptionElement('cat', 'Cat'))
                        ->addChild(new SelectOptionElement('parrot', 'Parrot'))
                )

                ->render()
        );
    }
}
