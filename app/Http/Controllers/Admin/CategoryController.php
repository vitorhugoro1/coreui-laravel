<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\PayloadRequests;
use App\Rules\Helpers\CategoryGendered;

class CategoryController extends Controller
{
    use PayloadRequests;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::with('owner')->paginate();

        return view('admin.categories.index')->with(compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $this->validate(request(), [
            'name'  => 'required|string',
            'type'  => 'required|string',
            'professional'   => 'required|boolean',
            'forms'     => 'required_if:type,forms|json',
            'gender'    => 'required_if:type,weights|boolean',
            'weapon'    => 'required_if:type,weights|boolean',
            'age_bracket' => 'required_if:type,weights|boolean',
            'team' => 'required_if:type,weights|boolean',
            'males'     => 'required_if:gender,1|required_with_all:females|json',
            'females'   => 'required_if:gender,1|required_with_all:males|json',
            'common'    => 'required_if:gender,0|json'
        ]);

        if (request()->filled('forms')) {
            $forms = $this->collectPayload('forms');
        }

        if (request()->filled('gender') && request()->gender === '1') {
            $males = $this->collectPayload('males');
            $females = $this->collectPayload('females');
        }

        if (request()->filled('gender') && request()->gender === '0') {
            $commons = $this->collectPayload('common');
        }

        $category = Category::create(request()->only(['name', 'type', 'professional']));

        if (request()->get('type') === 'forms') {
            $category->setForms($forms);
        }

        if (request()->get('type') === 'weights') {
            if (request()->filled('common')) {
                $category->setCommons($commons);
            }

            if (!request()->filled('common')) {
                $category->setCommons($males, $females);
            }
        }

        return redirect()->route('admin.categories.index')->withInput([
            'message'   => 'Category created succcessful!'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }
}
