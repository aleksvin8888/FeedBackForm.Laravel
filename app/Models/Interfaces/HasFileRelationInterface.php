<?php

namespace App\Models\Interfaces;

use Illuminate\Database\Eloquent\Relations\MorphOne;

interface HasFileRelationInterface
{
    public function file() :MorphOne;
}
