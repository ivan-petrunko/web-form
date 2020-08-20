<?php

declare(strict_types=1);

namespace Petrunko\Web\Form;

use Petrunko\Web\Form\Element\FormElementInterface;
use Petrunko\Web\Form\Enum\EncTypeEnum;
use Petrunko\Web\Form\Enum\MethodEnum;

class Form
{
    private ?string $id = null;
    private ?string $name = null;
    private ?string $action = null;
    private string $method = MethodEnum::POST;
    private string $enctype = EncTypeEnum::APPLICATION_X_WWW_FORM_URLENCODED;
    private ?string $class = null;
    private bool $isAutocomplete = true;
    /**
     * @var FormElementInterface[]
     */
    private array $elements = [];

    public function setId(?string $id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        return $this;
    }

    public function setAction(?string $action): self
    {
        $this->action = $action;
        return $this;
    }

    public function setMethod(string $method): self
    {
        $this->method = $method;
        return $this;
    }

    public function setEnctype(string $enctype): self
    {
        $this->enctype = $enctype;
        return $this;
    }

    public function setClass(?string $class): self
    {
        $this->class = $class;
        return $this;
    }

    public function setIsAutocomplete(bool $isAutocomplete): self
    {
        $this->isAutocomplete = $isAutocomplete;
        return $this;
    }

    public function addElement(FormElementInterface $element): self
    {
        $this->elements[] = $element;
        return $this;
    }

    public function render(): string
    {
        $html = "<form"
            . ($this->id !== null ? " id=\"{$this->id}\"": '')
            . ($this->name !== null ? " name=\"{$this->name}\"" : '')
            . ($this->action !== null ? " action=\"{$this->action}\"" : '')
            . " method=\"{$this->method}\""
            . " enctype=\"{$this->enctype}\""
            . ($this->class !== null ? " class=\"{$this->class}\"" : '')
            . ($this->isAutocomplete === false ? " autocomplete=\"off\"" : '')
            . ">";
        foreach ($this->elements as $element) {
            $html .= $element->render();
        }
        $html .= '</form>';
        return $html;
    }
}
