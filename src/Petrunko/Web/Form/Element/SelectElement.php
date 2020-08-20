<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class SelectElement extends AbstractFormElement
{
    protected bool $isMultiple = false;
    protected int $size = 0;

    public function setIsMultiple(bool $isMultiple): self
    {
        $this->isMultiple = $isMultiple;
        return $this;
    }

    public function setSize(int $size): self
    {
        $this->size = $size;
        return $this;
    }

    public function render(): string
    {
        $html = ($this->label !== null
            ? (
                "<label"
                . ($this->id !== null ? " for=\"{$this->id}\"" : '')
                . ">{$this->label}</label>"
            )
            : '')
            . "<select"
            . " name=\"{$this->name}\""
            . ($this->id !== null ? " id=\"{$this->id}\"": '')
            . ($this->class !== null ? " class=\"{$this->class}\"" : '')
            . ($this->size > 0 ? " size=\"{$this->size}\"" : '')
            . ($this->isDisabled ? ' disabled' : '')
            . ($this->isReadonly ? ' readonly' : '')
            . ($this->isRequired ? ' required' : '')
            . ($this->isMultiple ? ' multiple': '')
            . ">";
        foreach ($this->children as $child) {
            $html .= $child->render();
        }
        $html .= "</select>";
        return $html;
    }
}
