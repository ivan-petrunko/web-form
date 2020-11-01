<?php

declare(strict_types=1);

namespace Petrunko\Web\Form\Element;

abstract class AbstractFormElement implements FormElementInterface
{
    protected string $name;
    protected ?string $label = null;
    protected $value = null;
    /**
     * @var FormElementInterface[]
     */
    protected array $children = [];

    /**
     * @var string[]|int[]|float[]
     */
    protected array $attributes = [];

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function setId(string $id): self
    {
        $this->addAttribute('id', $id);
        return $this;
    }

    public function setLabel(string $label): self
    {
        $this->label = $label;
        return $this;
    }

    public function setClass(string $class): self
    {
        $this->addAttribute('class', $class);
        return $this;
    }

    public function setValue($value): self
    {
        $this->value = $value;
        return $this;
    }

    public function setDisabled(): self
    {
        $this->addAttribute('disabled', 'disabled');
        return $this;
    }

    public function setReadonly(): self
    {
        $this->addAttribute('readonly', 'readonly');
        return $this;
    }

    public function setRequired(): self
    {
        $this->addAttribute('required', 'required');
        return $this;
    }

    public function addChild(FormElementInterface $child): self
    {
        $this->children[] = $child;
        return $this;
    }

    public function addAttribute(string $key, $value): self
    {
        $this->attributes[$key] = $value;
        return $this;
    }

    public function removeAttribute(string $key): self
    {
        unset($this->attributes[$key]);
        return $this;
    }

    public function hasAttribute(string $key): bool
    {
        return isset($this->attributes[$key]);
    }

    public function getAttribute(string $key)
    {
        return $this->attributes[$key] ?? null;
    }

    protected function renderAttributes(): string
    {
        return implode(
            ' ',
            array_map(
                function (string $key) {
                    return sprintf('%s="%s"', $key, $this->attributes[$key]);
                },
                array_keys($this->attributes)
            )
        );
    }
}
