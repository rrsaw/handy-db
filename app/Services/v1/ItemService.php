<?php

namespace handy\Services\v1;

use Validator;
use handy\Item;
use handy\User;

class ItemService
{
    public function getItems($parameters)
    {
        if (empty($parameters)) {
            return $this->filterItems(Item::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }

    protected $rules = [
    'id' => 'required',
    'name' => 'required',
    'description' => 'required|date',
    'price' => 'required',
    'start_date' => 'requir|date',
    'end_date' => 'required|date',
    'status' => 'required|item_confirmation',
    'id_user' => 'required',
    'id_category' => 'required',
  ];

    public function validate($item)
    {
        $validator = Validator::make($item, $this->rules);
        $validator->validate();
    }

    public function getItem($id)
    {
        return $this->filterItems(Item::where('id', $id)->get());
    }

    public function createItem($req)
    {
        $id = $req->input('id');

        $item = new Item();
        $item->id = $req->input('id');
        $item->name = $req->input('name');
        $item->description = $req->input('description');
        $item->price = $req->input('price');
        $item->start_date = $req->input('start_date');
        $item->end_date = $req->input('end_date');
        $item->status = $req->input('status');
        $item->id_user = $req->input('id_user');
        $item->id_category = $req->input('id_category');

        $item->save();

        return $this->filterItems([$item]);
    }

    public function updateItem($req, $id)
    {
        $item = Item::where('id', $id)->firstOrFail();

        $item->id = $req->input('id');
        $item->name = $req->input('name');
        $item->description = $req->input('description');
        $item->price = $req->input('price');
        $item->start_date = $req->input('start_date');
        $item->end_date = $req->input('end_date');
        $item->status = $req->input('status');
        $item->id_user = $req->input('id_user');
        $item->id_category = $req->input('id_category');

        $item->save();

        return $this->filterItems([$item]);
    }

    public function deleteItem($id)
    {
        $item = Item::where('id', $id)->firstOrFail();
        $item->delete();
    }

    protected function filterItems($items)
    {
        $data = [];
        foreach ($items as $item) {
            $entry = [
              'id' => $item->id,
              'name' => $item->name,
              'description' => $item->description,
              // 'href' => route('loans.show', ['id' => $loan->id])
              'price' => $item->price,
              'start_date' => $item->start_date,
              'end_date' => $item->end_date,
              'status' => $item->status,
              'id_user' => $item->id_user,
              'id_category' => $item->id_category,
          ];

            $data[] = $entry;
        }
        return $data;
    }
}
