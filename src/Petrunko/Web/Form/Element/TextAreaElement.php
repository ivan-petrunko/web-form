<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class TextAreaElement extends AbstractFormElement
{
    private ?int $rows = null;
    private ?int $cols = null;
    protected ?string $placeholder = null;
    protected ?int $minLength = null;
    protected ?int $maxLength = null;

    public function setRows(?int $rows): self
    {
        $this->rows = $rows;
        return $this;
    }

    public function setCols(?int $cols): self
    {
        $this->cols = $cols;
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

    public function render(): string
    {
        return ($this->label !== null
            ? (
                "<label"
                . ($this->id !== null ? " for=\"{$this->id}\"" : '')
                . ">{$this->label}</label>"
            )
            : '')
            . "<textarea"
            . " name=\"{$this->name}\""
            . ($this->id !== null ? " id=\"{$this->id}\"": '')
            . ($this->class !== null ? " class=\"{$this->class}\"" : '')
            . ($this->placeholder !== null ? " placeholder=\"{$this->placeholder}\"" : '')
            . ($this->minLength !== null ? " minlength=\"{$this->minLength}\"" : '')
            . ($this->maxLength !== null ? " maxlength=\"{$this->maxLength}\"" : '')
            . ($this->rows !== null ? " rows=\"{$this->rows}\"" : '')
            . ($this->cols !== null ? " cols=\"{$this->cols}\"" : '')
            . ($this->isDisabled ? ' disabled' : '')
            . ($this->isReadonly ? ' readonly' : '')
            . ($this->isRequired ? ' required' : '')
            . ">"
            . ($this->value ?? '')
            . "</textarea>";
    }
}
