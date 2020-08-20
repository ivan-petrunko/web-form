<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

interface FormElementInterface
{
    public function addChild(FormElementInterface $child): self;
    public function render(): string;
}
