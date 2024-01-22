<?php

namespace App\Http\Controllers\Api;

use App\Data\AuthorData as DataObject;
use App\Http\Controllers\Controller;
use App\Models\Author as Model;
use Illuminate\Http\Response;
use Spatie\LaravelData\PaginatedDataCollection;

class AuthorController extends Controller
{
    public function __construct(public Model $model)
    {
        $this->middleware('auth:sanctum')->only(['store', 'update', 'destroy']);
    }

    /**
    * Display a listing of the resource.
    *
    * @return PaginatedDataCollection<array-key, DataObject>
    */
    public function index()
    {
        return DataObject::collection(
            $this->model->query()->paginate()
        );
    }

    /**
    * Store a newly created resource in storage.
    */
    public function store(DataObject $data): DataObject
    {
        $attributes = $data->toArray();
        $model = $this->model->query()->create($attributes);

        return DataObject::from($model);
    }

    /**
    * Display the specified resource.
    */
    public function show(
        Model $author
    ): DataObject {
        return DataObject::from($author);
    }

    /**
    * Update the specified resource in storage.
    */
    public function update(
        DataObject $data,
        Model $author,
    ): Response {
        $author->update($data->toArray());

        return response()->noContent();
    }

    /**
    * Remove the specified resource from storage.
    */
    public function destroy(
        Model $author
    ): Response {
        $author->delete();

        return response()->noContent();
    }
}
