<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

Route::get('/page1', function () {
    $data = DB::table('movies')->get();
    return view('pages.page1', compact('data'));
});

Route::get('/page2', function () {
    return view('pages.page2');
});

Route::get('/page3', function () {
    return view('pages.page3');
});

Route::get('/page4', function () {
    return view('pages.page4-helper');
});

Route::get('/query-test', function () {
    
    // $data = DB::select("SELECT * FROM movies where id =3");
    $data = DB::table('movies')->get();
    $data = DB::table('movies')->where('id',4)->get();
    $data = DB::table('movies')->where('id','>',50)->get();

    $data = DB::table('movies')
            ->where('id','>',50)
            ->where('star_rating','<',3)
            ->get();
    
    $data = DB::table('movies')
            ->where('id','>',50)
            ->whereOr('star_rating','<',3)
            ->get();
    
    $data = DB::table('movies')
            ->whereBetween('date_published',['2000-01-01','2024-01-01'])
            ->get();
    
    $data = DB::table('movies')
            ->whereBetween('date_published',['2000-01-01','2024-01-01'])
            ->orderBy('title','desc')
            ->get();
    
    $data = DB::table('movies')
            ->select('title','star_rating')
            ->whereBetween('date_published',['2000-01-01','2024-01-01'])
            ->orderBy('title','desc')
            ->count();
    
     $data = DB::table('movies')
            ->orderBy('title','desc')
            ->avg('star_rating');

    $data = DB::table('movies')
            ->orderBy('title','desc')
            ->sum('star_rating');

    $data = DB::table('movies')
            ->where([['id','>',40], ['star_rating','<',3]])
            ->orderBy('title','desc')
            ->get();       

    $data = DB::table('movies')
            ->where('description','LIKE','%nostrum%')
            ->orderBy('title','desc')
            ->get();   

    $data = DB::table('movies')
            ->whereLike('description','%nostrum%')
            ->orderBy('title','desc')
            ->get();   

    dd($data);







});