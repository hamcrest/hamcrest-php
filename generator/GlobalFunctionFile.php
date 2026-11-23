<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

class GlobalFunctionFile extends FactoryFile
{
    /**
     * @var string containing function definitions
     */
    private $functions;

    /**
     * @var string[]|null names of the only functions to generate, null for all
     */
    private $only;

    /**
     * @var string[] names of the functions to skip
     */
    private $except;

    /**
     * @param string[]|null $only names of the only functions to generate, null for all
     * @param string[] $except names of the functions to skip
     */
    public function __construct($file, ?array $only = null, array $except = array())
    {
        parent::__construct($file, '    ');
        $this->functions = '';
        $this->only = $only;
        $this->except = $except;
    }

    public function addCall(FactoryCall $call)
    {
        $name = $call->getName();
        if (($this->only !== null && !in_array($name, $this->only, true)) || in_array($name, $this->except, true)) {
            return;
        }

        $this->functions .= "\n" . $this->generateFactoryCall($call);
    }

    public function build()
    {
        $this->addFileHeader();
        $this->addPart('functions_imports');
        if ($this->only === null) {
            $this->addPart('functions_header');
        }
        $this->addCode($this->functions);
        $this->addPart('functions_footer');
    }

    public function generateFactoryCall(FactoryCall $call)
    {
        $code = "if (!function_exists('{$call->getName()}')) {\n";
        $code.= parent::generateFactoryCall($call);
        $code.= "}\n";

        return $code;
    }
}
