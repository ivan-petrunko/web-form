<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class PlaceholderElement extends AbstractFormElement
{
    public function __construct(string $id)
    {
        parent::__construct('');
        $this->addAttribute('id', $id);
    }

    public function render(): string
    {
        $value = $this->value ?? '';
        return ($this->label !== null
                ? (
                    "<label"
                    . ($this->hasAttribute('id') ? " for=\"{$this->getAttribute('id')}\"" : '')
                    . ">{$this->label}</label>"
                )
                : '')
            . "<span {$this->renderAttributes()}>{$value}</span>";
    }
}
