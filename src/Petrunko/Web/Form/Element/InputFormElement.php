<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\Enum\InputTypeEnum;

class InputFormElement extends AbstractFormElement
{
    protected string $type = InputTypeEnum::TEXT;
    protected ?string $placeholder = null;
    protected ?int $minLength = null;
    protected ?int $maxLength = null;
    protected ?int $minValue = null;
    protected ?int $maxValue = null;
    protected bool $isAutocomplete = true;
    protected bool $isChecked = false;

    public function setType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function setPlaceholder(?string $placeholder): self
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function setMinLength(?int $minLength): self
    {
        $this->minLength = $minLength;
        return $this;
    }

    public function setMaxLength(?int $maxLength): self
    {
        $this->maxLength = $maxLength;
        return $this;
    }

    public function setMinValue(?int $minValue): self
    {
        $this->minValue = $minValue;
        return $this;
    }

    public function setMaxValue(?int $maxValue): self
    {
        $this->maxValue = $maxValue;
        return $this;
    }

    public function setIsAutocomplete(bool $isAutocomplete): self
    {
        $this->isAutocomplete = $isAutocomplete;
        return $this;
    }

    public function setIsChecked(bool $isChecked): self
    {
        $this->isChecked = $isChecked;
        return $this;
    }

    public function render(): string
    {
        return ($this->label !== null
                ? (
                    "<label"
                    . ($this->id !== null ? " for=\"{$this->id}\"" : '')
                    . ">{$this->label}</label>"
                )
                : '')
            . "<input"
            . " name=\"{$this->name}\""
            . " type=\"{$this->type}\""
            . ($this->id !== null ? " id=\"{$this->id}\"": '')
            . ($this->class !== null ? " class=\"{$this->class}\"" : '')
            . ($this->value !== null ? " value=\"{$this->value}\"" : '')
            . ($this->placeholder !== null ? " placeholder=\"{$this->placeholder}\"" : '')
            . ($this->minLength !== null ? " minlength=\"{$this->minLength}\"" : '')
            . ($this->maxLength !== null ? " maxlength=\"{$this->maxLength}\"" : '')
            . ($this->minValue !== null ? " min=\"{$this->minValue}\"" : '')
            . ($this->maxValue !== null ? " max=\"{$this->maxValue}\"" : '')
            . ($this->isAutocomplete === false ? " autocomplete=\"off\"" : '')
            . ($this->isChecked ? ' checked' : '')
            . ($this->isDisabled ? ' disabled' : '')
            . ($this->isReadonly ? ' readonly' : '')
            . ($this->isRequired ? ' required' : '')
            . " />";
    }
}
