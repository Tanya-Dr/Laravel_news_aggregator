<?php

namespace App\Services\Contract;

interface Parser
{
    public function setLink(string $link): Parser;

    public function parse(): void;

    public function saveNews(): void;
}
