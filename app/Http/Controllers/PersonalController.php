<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\City;
use App\Models\Personal;
use App\Models\District;
use App\Http\Requests\StorePersonalRequest;
use App\Http\Requests\UpdatePersonalRequest;
use App\Http\Resources\PersonalResource;

class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PersonalResource::collection(Personal::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePersonalRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePersonalRequest $request)
    {
        $validated = $request->validate([
            "name" => "required|string|max:255",
            "surname" => "required|string|max:255",
            "city" => "required|string|max:255",
            "district" => "required|string|max:255",
            "address_id" => "",
            "birthday" => "date",
            "birthplace" => "string|max:255",
            "phones" => "array",
        ]);
        $city = City::where(["name" => $validated["city"]])->first();
        $district = District::where([
            "name" => $validated["district"],
        ])->first();
        $address = Address::where([
            "city_id" => $city->id,
            "district_id" => $district->id,
        ])->first();

        if ($address == null) {
            $address = Address::create([
                "city_id" => $city->id,
                "district_id" => $district->id,
            ]);
        }

        $validated["address_id"] = $address->id;

        $personal = Personal::create($validated);
        foreach ($validated["phones"] as $phone) {
            $personal->phones()->create([
                "phone" => $phone,
            ]);
        }
        return new PersonalResource($personal);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function show(Personal $personal)
    {
        return new PersonalResource($personal);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function edit(Personal $personal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePersonalRequest  $request
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePersonalRequest $request, Personal $personal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Personal  $personal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personal $personal)
    {
        //
    }
}
