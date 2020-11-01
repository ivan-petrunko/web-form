<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class LinkElement extends AbstractFormElement
{
    public function __construct(?string $url = null, ?string $label = null)
    {
        parent::__construct('');
        $this->label = $label;
        if ($url !== null) {
            $this->addAttribute('href', $url);
        }
    }

    public function setTarget(string $target): self
    {
        $this->addAttribute('target', $target);
        return $this;
    }

    public function render(): string
    {
        return "<a"
            . ($this->name !== '' ? " name=\"{$this->name}\"" : '')
            . ' ' . $this->renderAttributes()
            . ">"
            . $this->label
            . "</a>";
    }
}
