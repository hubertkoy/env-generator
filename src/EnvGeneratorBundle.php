<?php

namespace HubertKoy\EnvGenerator;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EnvGeneratorBundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}