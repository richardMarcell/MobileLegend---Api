<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\HeroStoreRequest;
use App\Http\Resources\HeroResource;
use App\Models\Hero;
use Illuminate\Auth\Access\Gate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        
        $file = $request->file('image');
        $path = $file->store('public/images');

        $hero = Hero::create([
            'name' => $request->name,
            'description' => $request->description,
            'offensive' => $request->offensive,
            'defensive' => $request->defensive,
            'utility' => $request->utility,
            'image' => Storage::url($path),
        ]); 

        return new HeroResource($hero);
    }
     
    public function update(HeroStoreRequest $request, Hero $hero) {
        $data = $request->validated();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $path = $file->store('public/images');
            $data['image'] = Storage::url($path);
        }
    
        $hero->update($data);
    
        return new HeroResource($hero);
    }
    

    public function destroy(Hero $hero) {
        $hero->delete();

        return response()->noContent();
    }

}
