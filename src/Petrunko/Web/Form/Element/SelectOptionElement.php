<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class SelectOptionElement extends AbstractFormElement
{
    protected bool $isSelected = false;

    public function __construct($value, string $label, bool $isSelected = false)
    {
        parent::__construct('');
        $this->value = $value;
        $this->label = $label;
        $this->isSelected = $isSelected;
    }

    public function setIsSelected(bool $isSelected): self
    {
        $this->isSelected = $isSelected;
        return $this;
    }

    public function render(): string
    {
        return "<option"
            . ($this->value !== null ? " value=\"{$this->value}\"" : '')
            . ($this->isDisabled ? ' disabled' : '')
            . ($this->isSelected ? ' selected' : '')
            . ">"
            . $this->label
            . "</option>";
    }
}
