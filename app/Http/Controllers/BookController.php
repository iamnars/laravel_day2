<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(){
        $data = DB::table('books')->get();
        return view('pages.page2', compact('data'));
    }

    //add form
    public function show_add_form(){
        return view('pages.add-book-form');
    }

    //perform adding record
    public function do_add(Request $request){
        $query = DB::table('books')
                ->insert([
                        'title' => $request->input('title'),
                        'description' => $request->input('description'),
                        'country_id' => $request->input('country_id'),
                        'stocks' => $request->input('stocks'),
                        'amount' => $request->input('amount'),
                        'photo' => $request->input('photo')
                ]);
        if($query){
                return redirect(url('/page2'))->with('success','Add book successful!');
        }
    }

    public function show_edit_form($id){
        $data = DB::table('books')
            ->where('id', $id)
            ->get();
            if (!$data) {
                return redirect()->route('home')->with('error', 'Book not found');
            }
        
            return view('pages.edit-book-form', compact('data'));
    }

    public function do_edit(Request $request){
        $query = DB::table('books')
                ->where('id',$request->input('id'))
                ->update([
                        'title' => $request->input('title'),
                        'description' => $request->input('description'),
                        'country_id' => $request->input('country_id'),
                        'stocks' => $request->input('stocks'),
                        'amount' => $request->input('amount'),
                        'photo' => $request->input('photo')
                ]);
        if($query){
                return redirect(url('/page2'))->with('success','Edit book successful!');
        }
    }

    public function do_delete($id){
        $query = DB::table('books')
            ->where('id', $id)
            ->delete();

        if($query){
                return redirect(url('/page2'))->with('success','Delete book successful!');
        }
    }
}
