<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class SelectElement extends AbstractFormElement
{
    protected bool $isMultiple = false;
    protected int $size = 0;

    public function setMultiple(): self
    {
        $this->addAttribute('multiple', 'multiple');
        return $this;
    }

    public function setSize(int $size): self
    {
        $this->addAttribute('size', $size);
        return $this;
    }

    public function render(): string
    {
        $html = ($this->label !== null
            ? (
                "<label"
                . ($this->hasAttribute('id') ? " for=\"{$this->getAttribute('id')}\"" : '')
                . ">{$this->label}</label>"
            )
            : '')
            . "<select"
            . " name=\"{$this->name}\""
            . ' ' . $this->renderAttributes()
            . ">";
        foreach ($this->children as $child) {
            $html .= $child->render();
        }
        $html .= "</select>";
        return $html;
    }
}
