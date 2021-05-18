<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Link;

class LinksController extends Controller
{       
        function createRandomString() { 

            $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
            srand((double)microtime()*1000000); 
            $i = 0; 
            $pass = '' ; 
        
            while ($i <= 7) { 
                $num = rand() % 33; 
                $tmp = substr($chars, $num, 1); 
                $pass = $pass . $tmp; 
                $i++; 
            } 
        
            return $pass; 
        } 
        
        public function create(Request $request){
    
            $validatedData = $request->validate([
                'post_id' => ['required']
            ]);
                
            $feildsToFill = [
              'post_id' => $validatedData['post_id'],
              'code' => md5($this->createRandomString() . strval(time())),
            ];
    
            $link= Link::create($feildsToFill);
    
            return $link;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'post_id' => ['required'],
            ]);
    
            $feildsToFill = [
                'post_id' => $validatedData['post_id'],
                'code' => md5($this->createRandomString() . strval(time())),
            ];
    
            $link = Link::find($id)->update($feildsToFill);
    
            $link = Link::find($id);
    
            return $link;
        }
    
        public function get(Request $request){
            return Link::paginate(30);
        }
}
