<?php

namespace App\Helpers;

use Illuminate\Support\Collection;


trait PayloadRequests
{
    /**
     * Generate an collection from json request
     *
     * @param string $field
     * @return Collection
     */
    protected function collectPayload(string $field) : Collection
    {
        $array = json_decode(request()->get($field), true);

        return collect($array);
    }
}
