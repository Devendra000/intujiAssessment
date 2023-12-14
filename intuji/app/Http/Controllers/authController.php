<?php

namespace App\Http\Controllers;

use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Models\blog;

class authController extends Controller
{
    function home(){
        return view('home');
    }

    function postBlog(Request $request){
        $count = collect($request->category);
        if($count->count() > 1){
            return ('Cant have more than one category. Try again');
        }
        else{
            $blog['title'] = $request->title;
            $blog['description'] = $request->description;
            $blog['category'] = $request->category;

            $save = blog::create($blog);
            if($save){
                return ('saved');
            }else{
                return ('could not save');
            }
        }  
    }

    function showAllBlogs(){
        $blogs = blog::all();
        return $blogs;
    }

    function findBlog($id){
        $blogs = blog::find($id);
        if($blogs){
            return $blogs;
        }
        else{
            return ('not found');
        }
    }
    
    function showUpdate($id){
        $blogs = blog::find($id);
        if($blogs){
            $data = compact('blogs');
            return view('update')->with($data);
        }
        else{
            return ('blog not found');
        }
    }

    function updateBlog($id, Request $request){
        $count = collect($request->category);
        if($count->count() > 1){
            return ('Cant have more than one category. Try again');
        }
        else{
            $data = blog::find($id);
            $data['title'] = $request->title ?? $data->title;
            $data['description'] = $request->description ?? $data->description;
            $data['category'] = $request->category ?? $data->category;
            
            if($data->save()){
                return $data;
            }
            else{
                return ('Update unsuccessful');
            }
        }
        
    }

    function findPair(Request $request){
        $num = json_decode($request->input('numbers'), true);
        $n = count($num); //For No of elements in the array
        $target = $request->target;
        $count = 0;

        for($i=0; $i<$n-1; $i++){
            for($j=$i+1; $j<$n; $j++){
                if($num[$i]+$num[$j] == $target){
                    print_r('Pair found:('.$num[$i].','.$num[$j].')<br>');
                    $count++;
                }
            }
        }
        
        if($count == 0){
            return('pair not found');
        }

        print_r('<br>Total Pairs found:'.$count);
        }
        

}
