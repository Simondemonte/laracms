<?php
use App\Post;
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
Route::get('/read', function(){
	$posts = Post::all();
	foreach($posts as $post){
		return $post->title;
	}
	});
Route::get('/find', function(){
		$post = Post::find(1);
		return $post->title;
});

Route::get('/findwhere', function(){
	$posts = Post::where('is_admin',0)->orderBy('id', 'desc')->take(1)->get();
	return $posts;
});

Route::get('basicinsert', function(){
	$post = new Post;
	$post->title = 'New Eloquent Title';
	$post->content = 'Wow Eloquent is really cool';
	$post->save();
});

Route::get('/create', function(){
	Post::create(['title'=>'create method', 'content'=> 'saya belajar banyak hari ini']);
});

Route::get('/basicupdate', function(){
		$post = Post::find(2);
		
		$post->title = 'Updated Eloquent Title';
		$post->content = 'Updated Eloquent Content';
		
		$post->save();
});

Route::get('/update', function(){
	Post::where('id',2)->where('is_admin',0)->update(['title'=>'NEW PHP TITLE','content'=>'I love learning Laravel']);
});

Route::get('/delete', function(){
		$post = Post::find(2);
		$post->delete();
});
Route::get('/delete2', function(){
		Post::destroy([1,4]);
});
Route::get('/delete3', function(){
	Post::where('is_admin',0)->delete();
});

Route::get('/softdelete', function(){
		Post::find(2)->delete();
});
Route::get('/readsoftdelete', function(){
	//$post = Post::find(2);
	//return $post;
	//$post = Post::withTrashed()->where('id', 2)->get();
	//return $post;
	//$post = Post::withTrashed()->get();
	//return $post;
	$post = Post::onlyTrashed()->get();
	return $post;
});

Route::get('/restore', function(){
	Post::withTrashed()->where('id', 2)->restore();
});


Route::get('/forcedelete', function(){
	Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
});

	//Route::get('/', function () {

//    return view('welcome');

//});


//Route::get('/insert', function(){
	
//DB::insert("INSERT INTO posts(title, content)values(?,?)",
	
//	['PHP with laravel', 'laravel is the Best Thing that happen to PHP']);

//});

//Route::get('/read', function(){
	
//$results = DB::select("SELECT * FROM posts WHERE id= ?", [1]);
	//	foreach($results as $post){
		//return$post->title;
//}

//return $results;

//});


//Route::get('/update', function(){
	
//$updated = DB::update("UPDATE posts SET title ='Update title' WHERE id =?",[1]);
	
//	return $updated;

//});


//Route::get('/delete', function(){
	
//$deleted = DB::delete("DELETE FROM posts WHERE id = ?",[1]);

//		return $deleted;

//});