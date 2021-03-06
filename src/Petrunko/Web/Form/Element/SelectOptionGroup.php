<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

class SelectOptionGroup extends AbstractFormElement
{
    public function __construct(string $label, bool $isDisabled = false)
    {
        parent::__construct('');
        $this->label = $label;
        if ($isDisabled) {
            $this->setDisabled();
        }
    }

    public function render(): string
    {
        $html = "<optgroup"
            . ($this->label !== null ? " label=\"{$this->label}\"" : '')
            . ' ' . $this->renderAttributes()
            . ">";
        foreach ($this->children as $child) {
            $html .= $child->render();
        }
        $html .= "</optgroup>";
        return $html;
    }
}
