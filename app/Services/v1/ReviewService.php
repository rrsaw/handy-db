<?php

namespace handy\Services\v1;

use Validator;
use handy\Review;
use handy\User;

class ReviewService
{
    public function getReviews($parameters)
    {
        if (empty($parameters)) {
            return $this->filterReviews(Review::all());
        }

        if (isset($parameters['include'])) {
            $includeParms = explode(',', $parameters['include']);
        }
    }


    protected $rules = [
    'id' => 'required',
    'description' => 'required',
    'value' => 'required|reviews_value',
    'date' => 'required|date',
    'id_reciver' => 'required',
    'id_item' => 'required',
    'id_owner' => 'required',
    'id_reviewer' => 'required',
  ];

    public function validate($review)
    {
        $validator = Validator::make($review, $this->rules);
        $validator->validate();
    }

    public function getReview($id)
    {
        return $this->filterReviews(Review::where('id', $id)->get());
    }

    public function createReview($req)
    {
        $id = $req->input('id');

        $review = new Review();
        $review->id = $req->input('id');
        $review->description = $req->input('description');
        $review->value = $req->input('value');
        $review->date = $req->input('date');
        $review->id_reciver = $req->input('id_reciver');
        $review->id_item = $req->input('id_item');
        $review->id_owner = $req->input('id_owner');
        $review->id_reviewer = $req->input('id_reviewer');

        $review->save();

        return $this->filterReviews([$review]);
    }

    public function updateReview($req, $id)
    {
        $review = Review::where('id', $id)->firstOrFail();

        $review->id = $req->input('id');
        $review->description = $req->input('description');
        $review->value = $req->input('value');
        $review->date = $req->input('date');
        $review->id_reciver = $req->input('id_reciver');
        $review->id_item = $req->input('id_item');
        $review->id_owner = $req->input('id_owner');
        $review->id_reviewer = $req->input('id_reviewer');

        $review->save();

        return $this->filterReviews([$review]);
    }

    public function deleteReview($id)
    {
        $review = Review::where('id', $id)->firstOrFail();
        $review->delete();
    }

    protected function filterReviews($reviews)
    {
        $data = [];
        foreach ($reviews as $review) {
            $entry = [
              'id' => $review->id,
              'description' => $review->description,
              'value' => $review->value,
              'date' => $review->date,
              'id_receiver' => $review->id_receiver,
              'id_item' => $review->id_item,
              'id_owner' => $review->id_owner,
              'id_reviewer' => $review->id_reviewer,

          ];

            $data[] = $entry;
        }
        return $data;
    }
}
