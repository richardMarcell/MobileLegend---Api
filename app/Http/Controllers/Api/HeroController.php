<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroStoreRequest;
use App\Http\Resources\HeroResource;
use App\Models\Hero;
use Illuminate\Http\Request;

class HeroController extends Controller
{

    public function index() {
        $heroesCollection = Hero::get();

        return HeroResource::collection($heroesCollection);
    }

    public function show(Hero $hero) {
        return new HeroResource($hero);
    }

    public function store(HeroStoreRequest $request) {
        $heroesCollection = Hero::create($request->validated());

        return new HeroResource($heroesCollection);
    }

    public function update(HeroStoreRequest $request, Hero $hero) {
        $hero->update($request->validated());

        return new HeroResource($hero);
    }

    public function destroy(Hero $hero) {
        $hero->delete();

        return response()->noContent();
    }

}
