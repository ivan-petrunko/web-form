<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\Enum\InputTypeEnum;

class InputFormElement extends AbstractFormElement
{
    public function __construct(string $name, string $type = InputTypeEnum::TEXT)
    {
        parent::__construct($name);
        $this->addAttribute('type', $type);
    }

    public function setType(string $type): self
    {
        $this->addAttribute('type', $type);
        return $this;
    }

    public function setPlaceholder(string $placeholder): self
    {
        $this->addAttribute('placeholder', $placeholder);
        return $this;
    }

    public function setMinLength(int $minLength): self
    {
        $this->addAttribute('minlength', $minLength);
        return $this;
    }

    public function setMaxLength(int $maxLength): self
    {
        $this->addAttribute('maxlength', $maxLength);
        return $this;
    }

    public function setMinValue(int $minValue): self
    {
        $this->addAttribute('min', $minValue);
        return $this;
    }

    public function setMaxValue(int $maxValue): self
    {
        $this->addAttribute('max', $maxValue);
        return $this;
    }

    public function setAutocomplete(bool $isAutocomplete): self
    {
        if (!$isAutocomplete) {
            $this->addAttribute('autocomplete', 'off');
        }
        return $this;
    }

    public function setChecked(bool $isChecked): self
    {
        if ($isChecked) {
            $this->addAttribute('checked', 'checked');
        }
        return $this;
    }

    public function render(): string
    {
        return ($this->label !== null
                ? (
                    "<label"
                    . ($this->hasAttribute('id') ? " for=\"{$this->getAttribute('id')}\"" : '')
                    . ">{$this->label}</label>"
                )
                : '')
            . "<input"
            . " name=\"{$this->name}\""
            . ($this->value !== null ? " value=\"{$this->value}\"" : '')
            . ' ' . $this->renderAttributes()
            . " />";
    }
}
