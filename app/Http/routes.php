<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//Route::get('/', function () {
//return view('welcome');
//	return "Hi Guys...";
//});

Route::get('/insert', function(){
	DB::insert("INSERT INTO posts1(title, content) values(?, ?)",
			['PHP with Laravel', 'Laravel is the Best Thing That Happen to PHP']);
});

Route::get('/read', function(){
	$results = DB::select("SELECT * FROM posts1 WHERE id =?", [1]);
	foreach($results as $posts){
		return $posts->title;
	}
	//return $results;
});

Route::get('/update', function(){
		$updated = DB:: update("UPDATE posts1 SET title ='update title' WHERE id =?",[1]);
		return $updated;
});

//Route::get('/post/{id}','PostController@index');

Route::resource('post', 'PostController');

Route::get('/contact', 'PostController@contact');

Route::get('post/{id}/{name}/{password}', 'PostController@show_post');

//Route::get('/about',function(){
//		return"Hi about page";
//});

//Route::get('/contact',function(){
//		return"Him I am contact";
//});

//Route::get('/admin/post',function(){
//		return"admin is here.";
//});

//Route::get('/post/{id}/{name}',function($id,$name){
//		return"This is post number".$id." ".$name;
//});

//Route::get('admin/post/example', array('as'=>'admin.home' ,function(){
//	$url = route('admin.home');
//	return "This url is: ".$url;
//}));