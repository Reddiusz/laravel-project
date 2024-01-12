<?php

namespace App\Http\Controllers;

use App\Models\People;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class dbController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        return response()->json(People::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): JsonResponse
    {
        $input = $request->validate([
            'firstname' => ['required'],
            'lastname' => ['required'],
            'phone_num' => ['required'],
            'street' => ['required'],
            'city' => ['required'],
        ]);

        $person = People::create($input);

        if($person->save()){
            return response()->json([
                'Message: ' => 'A new person has been added to the database.',
                'Inserted data: ' => $person
            ], 201);
        }else{
            return response([
                'Message: ' => 'Something went wrong.',
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        return response()->json(People::find($id), 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id): JsonResponse
    {
        $person = People::find($id);
        
        if($person){
            $input = $request->validate([
                'firstname' => ['required'],
                'lastname' => ['required'],
                'phone_num' => ['required'],
                'street' => ['required'],
                'city' => ['required'],
            ]);

            $person->firstname = $input['firstname'];
            $person->lastname = $input['lastname'];
            $person->phone_num = $input['phone_num'];
            $person->street = $input['street'];
            $person->city = $input['city'];

            if($person->save()){
                return response()->json([
                    'Message: ' => 'The data for id='.$id.' has been updated.'
                ], 200);
            }else{
                return response([
                    'Message: ' => 'Couldn\'t update the data.'
                ], 500);
            }
        }else{
            return response([
                'Message: ' => 'Couldn\'t find the person.'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $person = People::find($id);

        if($person){
            $person->delete();

            return response()->json([
                'Message: ' => 'The data for id='.$id.' has been deleted.'
            ], 200);
        }else{
            return response([
                'Message: ' => 'Couldn\'t find the person.'
            ], 500);
        }

    }
}
