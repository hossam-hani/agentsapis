<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
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
              'image' => ['required'],
              'user_id' => ['required'],
            ]);
    
            $feildsToFill = [
              'user_id' => $validatedData['user_id']
            ];

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $image= Image::create($feildsToFill);
    
            return $image;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'image' => ['required'],
                'user_id' => ['required'],
            ]);
    
            $feildsToFill = [
                'user_id' => $validatedData['user_id']
            ];

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $image = Image::find($id)->update($feildsToFill);
    
            $image = Image::find($id);
    
            return $image;
        }
    
        public function get(Request $request){
            return Image::paginate(30);
        }
}
