<?php

namespace HubertKoy\EnvGenerator;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class EnvGeneratorBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}