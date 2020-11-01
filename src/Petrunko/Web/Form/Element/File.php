<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

use Petrunko\Web\Form\Element\Enum\InputTypeEnum;

class File extends InputFormElement
{
    protected string $type = InputTypeEnum::FILE;
    protected bool $isMultiple = false;
    protected ?string $acceptedMimeTypes = null;

    public function setMultiple(): self
    {
        $this->addAttribute('multiple', 'multiple');
        return $this;
    }

    public function setAcceptedMimeTypes(string $acceptedMimeTypes): self
    {
        $this->addAttribute('accept', $acceptedMimeTypes);
        return $this;
    }
}
