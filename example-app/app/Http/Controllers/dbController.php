<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\Request;

class dbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return People::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return People::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return People::find($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $person = People::findOrFail($id);
        $person->update($request->all());

        return $person;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $person = People::findOrFail($id);
        $person->destroy();

        return 204;
    }
}
