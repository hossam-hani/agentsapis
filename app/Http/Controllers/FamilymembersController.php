<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Familymember;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class FamilymembersController extends Controller
{

        function updateImage_base64($image){
        //upload the product image
        $image = str_replace('data:image/png;base64,', '', $image);
        $image = str_replace(' ', '+', $image);
        $imageName = Str::random(10).'.'.'png';
        Storage::disk('public')->put($imageName, base64_decode($image));
        return env("APP_URL", "somedefaultvalue")."/storage/".$imageName;
        }

        public function create(Request $request){
    
            $validatedData = $request->validate([
              'name' => ['required'],
              'title' => ['required'],
              'description' => ['required'],
              'player_id' => ['required'],
              'image' => '',
            ]);
            
            $feildsToFill = [
                'name' => $validatedData['name'],
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'player_id' => $validatedData['player_id'],
            ];

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $familyMember= Familymember::create($feildsToFill);
    
            return $familyMember;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'name' => ['required'],
                'title' => ['required'],
                'description' => ['required'],
                'player_id' => ['required'],
                'image' => '',
            ]);
    
            
            $feildsToFill = [
                'name' => $validatedData['name'],
                'title' => $validatedData['title'],
                'description' => $validatedData['description'],
                'player_id' => $validatedData['player_id'],
            ];
            
            if($request->has('image')){
                $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }  
    
            $familyMember = Familymember::find($id)->update($feildsToFill);
    
            $familyMember = Familymember::find($id);
    
            return $familyMember;
        }
    
        public function get(Request $request){
            return Familymember::paginate(30);
        }
}
