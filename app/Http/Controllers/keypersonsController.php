<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keyperson;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class keypersonsController extends Controller
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
              'name' => 'required',
              'address' => 'required',
              'phone_number' => 'required',
              'notes' => 'required',
              'reate' => 'required',
              'negotiations' => 'required',
              'connections' => 'required',
              'image' => '',
            ]);

    
            $feildsToFill = [
              'name' => $validatedData['name'],
              'address' => $validatedData['address'],
              'phone_number' => $validatedData['phone_number'],
              'notes' => $validatedData['notes'],
              'reate' => $validatedData['reate'],
              'negotiations' => $validatedData['negotiations'],
              'connections' => $validatedData['connections'],
            ];

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $keyperson= Keyperson::create($feildsToFill);
    
            return $keyperson;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'name' => 'required',
                'address' => 'required',
                'phone_number' => 'required',
                'notes' => 'required',
                'reate' => 'required',
                'negotiations' => 'required',
                'connections' => 'required', 
                'image' => '',              
            ]);
    
            $feildsToFill = [
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'notes' => $validatedData['notes'],
                'reate' => $validatedData['reate'],
                'negotiations' => $validatedData['negotiations'],
                'connections' => $validatedData['connections'],               
            ];

            if($request->has('image')){
                $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $keyperson = Keyperson::find($id)->update($feildsToFill);
    
            $keyperson = Keyperson::find($id);
    
            return $keyperson;
        }
    
        public function get(Request $request){
            return Keyperson::paginate(30);
        }   
}
