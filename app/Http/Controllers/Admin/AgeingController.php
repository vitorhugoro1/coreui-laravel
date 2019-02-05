<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\AgeBracket;
use App\Http\Controllers\Controller;

class AgeingController extends Controller
{
    /**
     * @param Category|null $category
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function byCategory(?Category $category = null)
    {
        $gender = request()->input('gender', false);

        $category->when($gender, function ($query) {
            return $query->where('gender', request()->input('gender'));
        });

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
