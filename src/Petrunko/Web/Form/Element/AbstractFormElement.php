<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

abstract class AbstractFormElement implements FormElementInterface
{
    protected string $name;
    protected ?string $id = null;
    protected ?string $label = null;
    protected ?string $class = null;
    protected $value = null;
    protected bool $isDisabled = false;
    protected bool $isReadonly = false;
    protected bool $isRequired = false;
    /**
     * @var FormElementInterface[]
     */
    protected array $children = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setLabel(?string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;
        return $this;
    }

    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

    public function setIsDisabled(bool $isDisabled): self
    {
        $this->isDisabled = $isDisabled;
        return $this;
    }

    public function setIsReadonly(bool $isReadonly): self
    {
        $this->isReadonly = $isReadonly;
        return $this;
    }

    public function setIsRequired(bool $isRequired): self
    {
        $this->isRequired = $isRequired;
        return $this;
    }

    public function addChild(FormElementInterface $child): self
    {
        $this->children[] = $child;
        return $this;
    }
}
