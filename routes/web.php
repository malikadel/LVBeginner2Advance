<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Laravel 9 Course > 1 >  Video 6 
// To comment multiple lines, CTRL+/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',function(){
//     echo 'This is laravel application';
// });
    // Route::get('/',function(){
    //     echo 'This is laravel application';
    // });
// Laravel 9 Course > 1 >  Video 7 
    // Route::get('/greeting', function () {
    //     return view('welcome');
    // });
    // Route::get('/greeting/{id}', function ($id) {
    //     return 'user id is '.$id;
    // });
    // Route::get('test/{name?}',function($name){
    //     return 'Test for name';
    // });
// Laravel 9 Course > 1 >  Video 8 
    // Route::get('user/{name?}',function($name){
    //     return 'Test have a passed name : '.$name;
    // })->where('name','[A-Za-z]*');
    // Route::get('user/{id?}/{name?}',function($id,$name){
    //     return 'Test have a passed id : '.$id.' and name : '.$name;
    // })->where(['id'=>'[0-9]*','name'=>'[A-Za-z]*']);

// Laravel 9 Course > 1 >  Video 9

    //Redirect From Route 1 to Route 2
    // Route::get('/',function() {return 'Home';});
    // Route::get('login',function() {return 'Login Page';}); space in () and { is convention or a standard.
     Route::get('/',function() {return 'Index Page';});
     //Follow
     //Route::redirect('/','login');

// Laravel 9 Course > 1 >  Video 10

    // php artisan route:list
    // php artisan route:list --except-vendor
    // php artisan route:list --help

// Laravel 9 Course > 1 >  Video 11

    // make two pages login and about, 
    // make an about button on login page, and switch from login to about using that button.

Route::get('about',function() {
    return 'About Us Page';
});
Route::get('login',function() {
    return '<a href="about">About Link</a>';
});

// Laravel 9 Course > 1 >  Video 12
    // Route::get('greeting',function() {
    //     return view('greeting');
    // });
    // when url and view name same.
    //Route::view('greeting','greeting');

// Laravel 9 Course > 1 >  Video 13

    Route::get('greeting',function() {
        $name = "Adeel Akram";
        $age  = 40;
        $color = 'Fair';

        $user = User::first();
        $pc = $user->postComment();
        dd($pc);
        return view('greeting')->with(['name'=>$name,'age'=>$age,'color'=>'Sohna']);
        //return view('greeting',compact('name','age','color'));
        //return view('greeting',['name'=>$name,'age'=>$age,'color'=>$color]);
    });

// Laravel 9 Course > 1 >  Video 14 
// Nested Bade templtes.

    // Route::get('greeting2',function() {
    //     return View::make('greeting',['name'=> $name,'age'=>10,'color' => 'Blue']);
    // });

    Route::get('admin',function() {
        return view('admin.admin');
    });

// Laravel 9 Course > 1 >  Video 16
//Master layouts. Layout Inherritance.

    Route::get('master',function() {
        return view('layouts.master');
    });

// Laravel 9 Course > 1 >  Video 17

    Route::get('subsequent',function() {
        //return 'something';//
        $data = array('this'=>'pointer','kkey'=>'value','root'=>'base');
        return view('subsequent',compact('data'));
    });
// Laravel 9 course > 1 > video 21,22

    Route::get('listusers',[UserController::class,'index']);

    Route::get('users/show/{id}',[UserController::class,'show']);


// Laravel 9 course > 1 > video 23,24

    // php artisan make:controller PostController --resource
    // Controller name must be singular.
    // In Resource based route call, verb is plural not singular.
    Route::get('posts/index',[PostController::class,'index'])->name('posts.index');
    Route::get('posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/show/{id}',[PostController::class,'show'])->name('posts.show');
    Route::get('/posts/edit/{id}',[PostController::class,'edit'])->name('posts.edit');
    Route::delete('/posts/destroy/{id}',[PostController::class,'destroy'])->name('posts.destroy');
    Route::put ('/posts/update/{id}',[PostController::class,'update'])->name('posts.update');
    //Route::resource('posts',PostController::class);
// Laravel 9 course > 1 > video 25,26

    // Go through .env file, it has bunch of knowledge.
    //Code to verify if db is successfully connected or not.

    // try {
    //     \DB::connection()->getPDO();
    //     echo \DB::connection()->getDatabaseName();
    //     } 
    // catch (\Exception $e) {
    //     echo 'None';
    // }

// Laravel 9 course > 1 > video 27,28,29,30,31,32

    // php artisan make:migration create_posts_table
    // posts yani verb is plural, so in migration name, verbs 
    // stay plural.
    // If we change migrate file for adding new field, it will not
    // impact if we do change and run migration command.
    // so we use following
    // php artisan migrate:refresh
    // drop one table, rerun its migration.
    // roll back previous migrations and re run migration.
    // php artisan migrate:fresh.
    // drop all tables and rerun migrations after dropig tables.
    // refresh > run down function of each migration, which 
    // in response drop all tables one by one. Then rerun migrations
    // fresh > drop all tables(don/t run down function but hard delete
    // tables from database.)
    // If we have existing migration, then to add new column we 
    // can make new migration. to add new column.
    // Because fresh and refresh delete data then we don't go 
    // for fresh or refresh, we make new migration and run it.
    // php artisan migrate:rollback --step=2
    // to drop specific migration.
    // php artisan migrate:rollback --path=database/migrations/name_of_migration

// Laravel 9 course > 1 > video 33,34, 35

    // Foriegn Key :: 
    // Make foriegn key of user table in posts table.
    // To add foreign key in posts table from user's id column.
    // Write following line in posts migration file.
    // $table->foreignId('user_id')->constraint();
    // if primary table does not exist, and we try to make
    // foreignkey in subsequent table, then an error will raise 
    // while running migration. To get rid, we need to set 
    // early timestemp for parent table and later timestemp 
    // for child table.
    // php artisan migrate:status
// Laravel 9 course > 1 > video 36,37,38

    // Eloquent,ORM and model are name of samething.
    // three ways to interact Databases.
    // Eloquent,Raw Sql, Query builder are .
    // Models are named in singular way.
    // model name must be singular with frist capital letter.
    // php artisan make:model Post

Route::get('testroute',function() {
    //Post::create(['title'=>'Laravel 9 Tutorials','description'=>'Take it or make it.','is_published'=>false]);
    $posts = Post::where('title','Laravel 9 Tutorials')->orwhere('is_published',false)->get();//first();
    dd($posts);
});









