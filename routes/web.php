<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\MovieController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', function () {
    return view('pages.dashboard');
});

// Route::get('/page1', function () {
//     $data = DB::table('movies')->get();
//     return view('pages.page1', compact('data'));
// });
Route::get('/page1',[MovieController::class, "index"]);

// Route::get('/add-movie-form', function () {
//         return view('pages.add-movie-form');
//     });
Route::get('/add-movie-form',[MovieController::class, "show_add_form"]);
Route::post('/add-movies',[MovieController::class, "do_add"]);
Route::get('/delete-movies/{id}',[MovieController::class, "do_delete"]);
Route::get('/edit-movie-form/{id}',[MovieController::class, "show_edit_form"]);
Route::post('/edit-movies',[MovieController::class, "do_edit"]);
Route::get('/print',[MovieController::class, "do_print"]);

Route::get('/add-book-form',[BookController::class, "show_add_form"]);
Route::post('/add-book',[BookController::class, "do_add"]);
Route::get('/edit-book-form/{id}',[BookController::class, "show_edit_form"]);
Route::post('/edit-book',[BookController::class, "do_edit"]);
Route::get('/delete-book/{id}',[BookController::class, "do_delete"]);

// Route::get('/add-movies', function () {
//         $query = DB::table('movies')
//                 ->insert([
//                         'title' => "Batman",
//                         'description' => "Action, suspense",
//                         'star_rating' => 3,
//                         'director' => "Warner Bros.",
//                         'date_published' => '2024-01-02'
//                 ]);
//         if($query){
//                 echo 'saved';
//         }
//     });

// Route::post('/add-movies', function (Request $request) {
//         $query = DB::table('movies')
//                 ->insert([
//                         'title' => $request->input('title'),
//                         'description' => $request->input('description'),
//                         'star_rating' => $request->input('star_rating'),
//                         'director' => $request->input('director'),
//                         'date_published' => $request->input('date_published')
//                 ]);
//         if($query){
//                 return redirect(url('/page1'))->with('success','Add movie successful!');
//         }
//     });



Route::get('/update-movies', function () {
        $query = DB::table('movies')
                ->where('id', 5)
                ->update([
                        'title' => "Batman",
                        'description' => "Action, suspense",
                        'star_rating' => 3,
                        'director' => "Warner Bros.",
                        'date_published' => '2024-01-02'
                ]);
        if($query){
                echo 'saved';
        }
    });

// Route::get('/delete-movies', function () {
//         $query = DB::table('movies')
//                 ->where('id', 5)
//                 ->delete();
//         if($query){
//                 echo 'deleted';
//         }
//     });

Route::get('/page2', function () {
        $data = DB::table('books')->get();
        return view('pages.page2', compact('data'));
});

Route::get('/add-books', function () {
        $query = DB::table('books')
                ->insert([
                        'title' => "Joker Comic",
                        'description' => "Action, suspense",
                        'country_id' => 3,
                        'stocks' => 100,
                        'amount' => 250.00,
                        'photo' => 'the quick brown fox'
                ]);
        if($query){
                echo 'saved';
        }
    });

Route::get('/update-books', function () {
        $query = DB::table('books')
                ->where('id', 5)
                ->update([
                        'title' => "Batman Comic",
                        'description' => "Action, suspense",
                        'country_id' => 3,
                        'stocks' => 100,
                        'amount' => 250.00,
                        'photo' => 'the quick brown fox'
                ]);
        if($query){
                echo 'update';
        }
    });

Route::get('/delete-books', function () {
        $query = DB::table('books')
                ->where('id', 103)
                ->delete();
        if($query){
                echo 'deleted';
        }
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