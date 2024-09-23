<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Events\CustomMessageEvent;

class MovieController extends Controller
{
    public function index(){
        $data = DB::table('movies')->get();
        // event(new CustomMessageEvent("Someone visited your movie listing page."));
        return view('pages.page1', compact('data'));
    }

    //add form
    public function show_add_form(){
        return view('pages.add-movie-form');
    }

    //perform adding record
    public function do_add(Request $request){
        // $filename = NULL;
        $query = DB::table('movies')
                ->insert([
                        'title' => $request->input('title'),
                        'description' => $request->input('description'),
                        'star_rating' => $request->input('star_rating'),
                        'director' => $request->input('director'),
                        'date_published' => $request->input('date_published')
                ]);
        if($query){
                
                return redirect(url('/page1'))->with('success','Add movie successful!');
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
            
                return view('pages.edit-movie-form', compact('data'));
        }
    
        //perform adding record
        public function do_edit(Request $request){
            $query = DB::table('movies')
                    ->where('id',$request->input('id'))
                    ->update([
                            'title' => $request->input('title'),
                            'description' => $request->input('description'),
                            'star_rating' => $request->input('star_rating'),
                            'director' => $request->input('director'),
                            'date_published' => $request->input('date_published')
                    ]);
            if($query){
                    return redirect(url('/page1'))->with('success','Edit movie successful!');
            }
        }

        public function do_print(){
            $data = DB::table('movies')->get();
            return view('pages.print', compact('data'));
        }
}
