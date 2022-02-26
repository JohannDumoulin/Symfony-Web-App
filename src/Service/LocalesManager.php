<?php

namespace App\Service;

class LocalesManager
{
    public function __construct(string $localesParam)
    {
        $locales = "localeList";
        $this->$locales = $localesParam;
    }
}