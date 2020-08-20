<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Enum;

class EncTypeEnum
{
    public const APPLICATION_X_WWW_FORM_URLENCODED = 'application/x-www-form-urlencoded';
    public const MULTIPART_FORM_DATA = 'multipart/form-data';
    public const TEXT_PLAIN = 'text/plain';

    private function __construct()
    {
    }
}
