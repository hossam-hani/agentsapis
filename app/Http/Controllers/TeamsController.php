<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Team;

class TeamsController extends Controller
{

    function updateImage_base64(image){
        //upload the product image
        image = str_replace('data:image/png;base64,', '', image);
        image = str_replace(' ', '+', image);
        imageName = Str::random(10).'.'.'png';
        Storage::disk('public')->put(imageName, base64_decode(image));
        return env("APP_URL", "somedefaultvalue")."/storage/".imageName;
    }


    public function create(Request $request){

        $validatedData = $request->validate([
            'name' => ['required'],
            'logo' => ['required']
        ]);
        

       $feildsToFill = [
            'name' => $validatedData['name'],
        ];

        if(isset(validateData["logo"])){
            feildsToFill['logo'] = updateImage_base64(validatedData['logo']); 
        }

        $team = Team::create($feildsToFill);

        return $team;
    }

    public function update(Request $request,$id){

        $validatedData = $request->validate([
            'name' => ['required'],
            'logo' => ['required']
        ]);

        $feildsToFill = [
            'name' => $validatedData['name'],
        ];

        if(isset(validateData["logo"])){
            feildsToFill['logo'] = updateImage_base64(validatedData['logo']); 
        }

        $team = Team::find($id)->update($feildsToFill);
        
        $team = Team::find($id);

        return $team;
    }

    public function get(Request $request){
        return Team::paginate(30);
    }

}
