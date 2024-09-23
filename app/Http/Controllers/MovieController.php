<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\CustomMessageEvent;
use App\Http\Controllers\Log;

class MovieController extends Controller
{
    public function index(){
        $data = DB::table('movies')
                ->leftJoin('category','category.category_id','=','movies.category_id')
                ->select('movies.*','category.category')
                ->get();
        // event(new CustomMessageEvent("Someone visited your movie listing page."));
        return view('pages.page1', compact('data'));
    }

    //add form
    public function show_add_form(){
        $category = DB::table('category')->get();
        return view('pages.add-movie-form', compact('category'));
    }

    //perform adding record
    public function do_add(Request $request){
        $filename = NULL;
        $request->validate([
                    'title' =>'required|string|max:100',
                    'star_rating' =>'required|integer|min:1|max:5',
                    'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // Get file name
    
            // Move the file
            if ($file->move(public_path('_uploads'), $filename)) {
                // Insert into database
                $query = DB::table('movies')->insert([
                    'title' => $request->input('title'),
                    'category_id' => $request->input('category_id'),
                    'description' => $request->input('description'),
                    'star_rating' => $request->input('star_rating'),
                    'director' => $request->input('director'),
                    'date_published' => $request->input('date_published'),
                    'image' => $filename,
                ]);
    
                if ($query) {
                    return redirect(url('/page1'))->with('success', 'Add movie successful!');
                }
            } else {
                return redirect()->back()->with('error','File upload failed.');
            }
        } else {
            return redirect()->back()->with('error','No file was uploaded.');
        }
     
        

    }

    public function do_delete($id){
        $query = DB::table('movies')
            ->where('id', $id)
            ->delete();

        if($query){
                return redirect(url('/page1'))->with('success','Delete movie successful!');
        }
    }

        //edit form
    public function show_edit_form($id){
            $data = DB::table('movies')
                ->where('id', $id)
                ->get();
                if (!$data) {
                    return redirect()->route('home')->with('error', 'Movie not found');
                }
                $categories = DB::table('category')->get();
            
                return view('pages.edit-movie-form', compact('data','categories'));
    }
    
        //perform adding record
    public function do_edit(Request $request){
        $filename = NULL;
        $request->validate([
                'title' =>'required|string|max:100',
                'star_rating' =>'required|integer|min:1|max:5',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        if ($request->file('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName(); // Get file name
            // Move the file
            if ($file->move(public_path('_uploads'), $filename)) {
                // Insert into database
                $query = DB::table('movies')
                    ->where('id',$request->input('id'))
                    ->update([
                            'title' => $request->input('title'),
                            'category_id' => $request->input('category_id'),
                            'description' => $request->input('description'),
                            'star_rating' => $request->input('star_rating'),
                            'director' => $request->input('director'),
                            'date_published' => $request->input('date_published'),
                            'image' => $filename
                    ]);
    
                if ($query) {
                    return redirect(url('/page1'))->with('success', 'Edit movie successful!');
                }
            } else {
                return redirect()->back()->with('error','File upload failed.');
            }
        } else {
            return redirect()->back()->with('error','No file was uploaded.');
        }
                 
            
    }

    public function do_print(){
            $data = DB::table('movies')->get();
            return view('pages.print', compact('data'));
    }
}
