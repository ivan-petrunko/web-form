<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\Enum\LinkTargetEnum;

class LinkElement extends AbstractFormElement
{
    private ?string $url = null;
    private string $target = LinkTargetEnum::SELF;

    public function __construct(?string $url = null, ?string $label = null)
    {
        parent::__construct('');
        $this->url = $url;
        $this->label = $label;
    }

    public function setTarget(string $target): void
    {
        $this->target = $target;
    }

    public function render(): string
    {
        return "<a"
            . ($this->url !== null ? " href=\"{$this->url}\"" : '')
            . ($this->name !== '' ? " name=\"{$this->name}\"" : '')
            . " target=\"{$this->target}\""
            . ($this->id !== null ? " id=\"{$this->id}\"": '')
            . ($this->class !== null ? " class=\"{$this->class}\"" : '')
            . ($this->isDisabled ? ' disabled' : '')
            . ">"
            . $this->label
            . "</a>";
    }
}
