<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element\Enum;

class LinkTargetEnum
{
    public const BLANK = '_blank';
    public const SELF = '_self';
    public const PARENT = '_parent';
    public const TOP = '_top';

    private function __construct()
    {
    }
}
