<?php

namespace handy\Services\v1;

use Validator;
use handy\Category;
use handy\User;

class CategoryService
{
    public function getCategories($parameters)
    {
        if (empty($parameters)) {
            return $this->filterCategories(Category::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }

    protected $rules = [
    'id' => 'required',
    'name' => 'required',
    'icon' => 'required',
    ];

    public function validate($category)
    {
        $validator = Validator::make($category, $this->rules);
        $validator->validate();
    }

    public function getCategory($id)
    {
        return $this->filterCategories(Category::where('id', $id)->get());
    }

    public function createCategory($req)
    {
        $id = $req->input('id');

        $category = new Category();
    // $loan->id = $id;
        $category->id = $req->input('id');
        $category->name = $req->input('name');
        $category->icon = $req->input('icon');

        $category->save();

        return $this->filterCategories([$category]);
    }

    public function updateCategory($req, $id)
    {
        $category = Category::where('id', $id)->firstOrFail();

        $category->id = $req->input('id');
        $category->name = $req->input('name');
        $category->icon = $req->input('icon');
        $category->save();

        return $this->filterCategories([$category]);
    }

    public function deleteCategory($id)
    {
        $category = Category::where('id', $id)->firstOrFail();
        $category->delete();
    }

    protected function filterCategories($categories)
    {
        $data = [];
        foreach ($categories as $category) {
            $entry = [
              'id' => $category->id,
              'name' => $category->name,
              'icon' => $category->icon,
              // 'href' => route('loans.show', ['id' => $loan->id])

          ];

            $data[] = $entry;
        }
        return $data;
    }
}
