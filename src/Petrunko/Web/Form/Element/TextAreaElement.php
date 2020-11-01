<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class TextAreaElement extends AbstractFormElement
{
    public function setRows(int $rows): self
    {
        $this->addAttribute('rows', $rows);
        return $this;
    }

    public function setCols(int $cols): self
    {
        $this->addAttribute('cols', $cols);
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

    public function render(): string
    {
        return ($this->label !== null
            ? (
                "<label"
                . ($this->hasAttribute('id') ? " for=\"{$this->getAttribute('id')}\"" : '')
                . ">{$this->label}</label>"
            )
            : '')
            . "<textarea"
            . " name=\"{$this->name}\""
            . ' ' . $this->renderAttributes()
            . ">"
            . ($this->value ?? '')
            . "</textarea>";
    }
}
