<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class SelectOptionElement extends AbstractFormElement
{
    public function __construct($value, string $label, bool $isSelected = false)
    {
        parent::__construct('');
        $this->value = $value;
        $this->label = $label;
        if ($isSelected) {
            $this->addAttribute('selected', 'selected');
        }
    }

    public function setSelected(bool $isSelected): self
    {
        if ($isSelected) {
            $this->addAttribute('selected', 'selected');
        }
        return $this;
    }

    public function render(): string
    {
        return "<option"
            . ($this->value !== null ? " value=\"{$this->value}\"" : '')
            . ' ' . $this->renderAttributes()
            . ">"
            . $this->label
            . "</option>";
    }
}
