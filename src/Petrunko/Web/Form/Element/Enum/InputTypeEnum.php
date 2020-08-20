<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element\Enum;

class InputTypeEnum
{
    public const CHECKBOX = 'checkbox';
    public const BUTTON = 'button';
    public const DATE = 'date';
    public const EMAIL = 'email';
    public const FILE = 'file';
    public const HIDDEN = 'hidden';
    public const NUMBER = 'number';
    public const PASSWORD = 'password';
    public const RADIO = 'radio';
    public const RESET = 'reset';
    public const SUBMIT = 'submit';
    public const TEL = 'tel';
    public const TEXT = 'text';

    private function __construct()
    {
    }
}
