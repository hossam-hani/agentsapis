<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Agent;

class AgentsController extends Controller
{
    
        public function create(Request $request){
    
            $validatedData = $request->validate([
                'name' => ['required'],
                'notes' => ['required'],
                'player_id' => ['required'],
            ]);
    
            $feildsToFill = [
                'name' => $validatedData['name'],
                'notes' => $validatedData['notes'],
                'player_id' => $validatedData['player_id'],
            ];
    
            $agents= Agent::create($feildsToFill);
    
            return $agents;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'name' => ['required'],
                'notes' => ['required'],
                'player_id' => ['required'],              
            ]);
    
            $feildsToFill = [
                'name' => $validatedData['name'],
                'notes' => $validatedData['notes'],
                'player_id' => $validatedData['player_id'],
            ];
    
            $agents = Agent::find($id)->update($feildsToFill);
    
            $agents = Agent::find($id);
    
            return $agents;
        }
    
        public function get(Request $request){
            return Agent::paginate(30);
        }
}
