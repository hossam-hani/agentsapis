<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostsController extends Controller
{
    
        public function create(Request $request){
    
            $validatedData = $request->validate([
                'title'=> ['required'],
                'content'=> '',
                'type'=> ['required'],
                'section' => ['required'],
                'user_id' => ['required']
            ]);
            
            
            $feildsToFill = [
                'title'=> $validatedData['title'],
                'type'=> $validatedData['type'],
                'section' => $validatedData['section'],
                'user_id' => $validatedData['user_id']
            ];

            if($request->has('file')){
              $feildsToFill['content'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('file')->store('files');
            }else{
                $feildsToFill['content'] = $validatedData['content'];
            }
    
            $post = Post::create($feildsToFill);
    
            return $post;
        }
    
        public function update(Request $request,$id){
    
            $validatedData = $request->validate([
                'title'=> ['required'],
                'content'=> '',
                'type'=> ['required'],
                'section' => ['required'],
                'user_id' => ['required']
            ]);
    

            $feildsToFill = [
                'title'=> $validatedData['title'],
                'type'=> $validatedData['type'],
                'section' => $validatedData['section'],
                'user_id' => $validatedData['user_id']
            ];

            $post = Post::find($id);

            if($request->has('file')){
                $feildsToFill['content'] = env("APP_URL", "somedefaultvalue")."/storage/".$request->file('file')->store('files');
            }else{
                $feildsToFill['content'] = $validatedData['content'];
            }
            
            $post = Post::find($id)->update($feildsToFill);
    
            $post = Post::find($id);
    
            return $post;
        }
    
        public function get(Request $request){
            return Post::paginate(30);
        }
}
