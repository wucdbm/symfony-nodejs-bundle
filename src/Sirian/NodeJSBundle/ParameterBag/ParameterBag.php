<?php

namespace Sirian\NodeJSBundle\ParameterBag;

class ParameterBag
{
    protected $parameters;

    public function __construct(array $parameters = [])
    {
        $this->parameters = $parameters;
    }

    public function merge(ParameterBag $bag)
    {
        foreach ($bag->all() as $key => $value) {
            $this->set($key, $value);
        }
        return $this;
    }

    public function all()
    {
        return $this->parameters;
    }

    public function set($key, $value)
    {
        $this->parameters[$key] = $value;
        return $this;
    }
}
