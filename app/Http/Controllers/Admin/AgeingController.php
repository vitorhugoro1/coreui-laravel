<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\AgeBracket;
use App\Http\Controllers\Controller;

class AgeingController extends Controller
{
    public function byCategory(?Category $category = null)
    {
        $gender = request()->input('gender', false);

        return response()->json();
    }

    public function basic()
    {
        $ageings = AgeBracket::all();

        $ageings->transform(function ($ageing) {
            return [
                'name' => $ageing->name,
                'key' => str_slug($ageing->name),
                'data' => [],
            ];
        });

        return response()->json($ageings);
    }
}
