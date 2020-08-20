<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\Enum\InputTypeEnum;

class File extends InputFormElement
{
    protected string $type = InputTypeEnum::FILE;
    protected bool $isMultiple = false;
    protected ?string $acceptedMimeTypes = null;

    public function setIsMultiple(bool $isMultiple): self
    {
        $this->isMultiple = $isMultiple;
        return $this;
    }

    public function setAcceptedMimeTypes(?string $acceptedMimeTypes): self
    {
        $this->acceptedMimeTypes = $acceptedMimeTypes;
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
            . ($this->maxLength !== null ? " maxlength=\"{$this->maxLength}\"" : '')
            . ($this->isAutocomplete === false ? " autocomplete=\"off\"" : '')
            . ($this->acceptedMimeTypes !== null ? " accept=\"{$this->acceptedMimeTypes}\"": '')
            . ($this->isDisabled ? ' disabled' : '')
            . ($this->isReadonly ? ' readonly' : '')
            . ($this->isRequired ? ' required' : '')
            . ($this->isMultiple ? ' multiple': '')
            . " />";
    }
}
