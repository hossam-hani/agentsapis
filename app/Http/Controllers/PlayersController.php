<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Player;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PlayersController extends Controller
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
                'address' => ['required'],
                'phone_number' => ['required'],
                'image' => ['required'],
                'notes' => ['required'],
                'position' => ['required'], // custome value
                'birth_date' => ['required'], // date
                'nationality' => ['required'],
                'mbti_mini' => ['required'], // file
                'mbti_full' => ['required'], // file
                'dna_mini' => ['required'], // file
                'dna_full' => ['required'], // file
                'tag' => ['required'], // custome value
                'team_id' => ['required'],
                'key_person_id' => ['required'],
                'agent_id' => ['required'],
            ]);
            
            $feildsToFill = [
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'notes' => $validatedData['notes'],
                'position' => $validatedData['position'], // custome value
                'birth_date' => $validatedData['birth_date'], // date
                'nationality' => $validatedData['nationality'],
                'tag' => $validatedData['tag'], // custome value
                'team_id' => $validatedData['team_id'],
                'key_person_id' => $validatedData['key_person_id'],
                'agent_id' => $validatedData['agent_id'],
            ];

            $feildsToFill['dna_mini_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('dna_mini')->store('files');
            $feildsToFill['dna_full_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('dna_full')->store('files');
            $feildsToFill['mbti_full_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('mbti_full')->store('files');
            $feildsToFill['mbti_mini_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('mbti_mini')->store('files');

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $player= Player::create($feildsToFill);
    
            return $player;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'name' => ['required'],
                'address' => ['required'],
                'phone_number' => ['required'],
                'image' => '',
                'notes' => ['required'],
                'position' => ['required'], // custome value
                'birth_date' => ['required'], // date
                'nationality' => ['required'],
                'mbti_mini' => '', // file
                'mbti_full' => '', // file
                'dna_mini' => '', // file
                'dna_full' => '', // file
                'tag' => ['required'], // custome value
                'team_id' => ['required'],
                'key_person_id' => ['required'],
                'agent_id' => ['required'],
            ]);
    
            $feildsToFill = [
                'name' => $validatedData['name'],
                'address' => $validatedData['address'],
                'phone_number' => $validatedData['phone_number'],
                'notes' => $validatedData['notes'],
                'position' => $validatedData['position'], // custome value
                'birth_date' => $validatedData['birth_date'], // date
                'nationality' => $validatedData['nationality'],
                'tag' => $validatedData['tag'], // custome value
                'team_id' => $validatedData['team_id'],
                'key_person_id' => $validatedData['key_person_id'],
                'agent_id' => $validatedData['agent_id'],
            ];

            if($request->has('dna_mini')){
              $feildsToFill['dna_mini_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('dna_mini')->store('files'); 
            }

            if($request->has('dna_full')){
              $feildsToFill['dna_full_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('dna_full')->store('files'); 
            }

            if($request->has('mbti_full')){
              $feildsToFill['mbti_full_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('mbti_full')->store('files'); 
            }

            if($request->has('mbti_mini')){
              $feildsToFill['mbti_mini_link'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('mbti_mini')->store('files'); 
            }

            if($request->has('image')){
              $feildsToFill['image'] = $this->updateImage_base64($validatedData['image']); 
            }
    
            $player = Player::find($id)->update($feildsToFill);
    
            $player = Player::find($id);
    
            return $player;
        }
    
        public function get(Request $request){
            return Player::paginate(30);
        }
}
