<?php
//
use App\Models\Country;
use App\Models\Photo;
use App\Models\Post;
use App\Models\Role;
use App\Models\User;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use Illuminate\Support\Facades\Storage;

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
//// دو نقطه نشانه فساده یعنی abstract class
///


//////Route::get('/my/{id}/{name}/{password}', [PostsController::class, 'showMyView']);
////Route::resource('/', PostsController::class);
//////Route::get('/contact', [PostsController::class, 'contact']);
//////Route::get('/insert', [PostsController::class, 'insert']);
//////Route::get('/select', [PostsController::class, 'select']);
//////Route::get('/update', [PostsController::class, 'updates']);
//////Route::get('/delete', [PostsController::class, 'deletes']);
//////Route::get('posts', [PostsController::class, 'getAllPosts']);
//////Route::get('save-posts', [PostsController::class, 'savePosts']);
//////Route::get('update-posts', [PostsController::class, 'updatePost']);
//////Route::get('delete-posts', [PostsController::class, 'NewDeletePost']);
//////Route::get('data-trash', [PostsController::class, 'workWithTrash']);
//////Route::get('restore-post', [PostsController::class, 'restorePost']);
//////Route::get('force-delete', [PostsController::class, 'forceDelete']);
//////Route::get('user-post', function () {
//////    $user_post = User::find(1)->post->body;
//////    return $user_post;
//////});
//////
//////Route::get('post/{id}/user', function ($id) {
//////    $post_user = Post::find($id)->user->name;
//////    return $post_user;
//////});
//////Route::get('posts', function () {
//////    $user_post = User::find(1)->posts;
//////    foreach ($user_post as $posts) {
//////        echo $posts->title;
//////        echo "<br>";
//////    }
//////});
//////
//////Route::get('/user/roles', function () {
//////    $user_roles = User::find(1);
//////    foreach ($user_roles as $roles) {
//////
//////    }
//////});
//////Route::get('user-country',function (){
//////    $country=Country::find(2);
//////    foreach ($country->posts as $post){
//////        echo $post->title;
//////        echo "<hr>";
//////    }
//////});
////Route::get('user/photo', function () {
////    $user = User::find(1);
////    foreach ($user->photos as $photo) {
////        echo $photo->path;
////        echo "<hr>";
////    }
////});
////Route::get('photo/{id}/post', function ($id) {
////    $photo = Photo::find($id);
////    return $photo->imageable;
////
////});
////Route::get('post/tags', function () {
////    $post = \App\Models\Video::find(1);
////    foreach ($post->tags as $tag) {
////        echo $tag->name;
////        echo "<br>";
////    }
////
////});
////
////Route::get('posts/tags', function () {
////    $tag = \App\Models\Tag::find(1);
////    foreach ($tag->posts as $post) {
////        echo $post->title;
////        echo "<br>";
////    }
////
////});
////
////
////
////
////
////
////
////
////
//Route::get('create', function () {
//    $user = User::find(1);
//    $post = new Post();
//    $post->title = " کراد 1";
//    $post->body = "پستی با عملیات کراد 1";
//    $user->posts()->save($post);
//});
//Route::get('read', function () {
//    $user = User::find(1);
//foreach ($user->posts as $post){
//    echo $post->title;
//    echo "<br>";
//    }
//});
//Route::get('update', function () {
//    $user = User::find(1);
//    $user->posts()->whereId(1)->update(['title'=>"crud update",'body'=>"crud updated"]);
//});
//Route::get('delete', function () {
//    $user = User::find(1);
//    $user->posts()->whereId(1)->delete();
//});
//Route::get('create', function () {
//    $user = User::find(1);
//    $role = new Role();
//    $role->name = "نویسنده";
//    $user->roles()->save($role);
//});
//Route::get('read', function () {
//    $user = User::find(1);
//    foreach ($user->roles as $role) {
//        echo $role->name;
//        echo "<br>";
//    }
//});
//Route::get("update", function () {
//    $user = User::find(1);
//    if ($user->has('roles')) {
//        foreach ($user->roles as $role) {
//            if ($role->name == 'Author') {
//                $role->name = 'نویسنده';
//                $role->save();
//            }
//        }
//
//    }
//});
//Route::get("delete", function () {
//    $user = User::find(1);
//    foreach ($user->roles as $role) {
//        if ($role->name == "نویسنده") {
//
//            $role->delete();
//        }
//    }
//});
//Route::get("detach", function () {
//    $user = User::find(1);
//    $user->roles()->detach();
//});
//Route::get("attach", function () {
//    $user = User::find(1);
//    $user->roles()->attach(1);
//});
//Route::get('sync',function (){
//    $user = User::find(1);
//    $user->roles()->sync([1,3]);
//
//
//});
//Route::get('create', function () {
//    $video = Video::find(1);
//    $video->tags()->create(['name' => 'morph crud']);
//});
//
//
//Route::get('read', function () {
//    $video = Video::find(1);
//    foreach ($video->tags as $tag) {
//        echo $tag->name;
//        echo "<br>";
//    }
//});
//Route::get('update', function () {
//    $video = Video::find(1);
//    $tag = $video->tags;
//    $newTags = $tag->where('id', 3)->first();
//    $newTags->name = "تگ جدید";
//    $newTags->save();
//
//
//});
//Route::get('delete', function () {
//    $video = Video::find(1);
//    $tag = $video->tags;
//    $deletedTag = $tag->where('id', 3)->first();
//    $deletedTag->delete();
//
//
//});
//Route::get('detach', function () {
//    $video = Video::find(1);
//    $video->tags()->detach();
//});
//Route::get('attach', function () {
//    $video = Video::find(1);
//    $video->tags()->attach(1);
//});
//Route::get('sync', function () {
//    $video = Video::find(1);
//    $video->tags()->sync([1, 2]);
//});
//Route::get('file',function (){
//   // $file=\Illuminate\Support\Facades\Storage::disk('public')->get('images/j3Z9xGLjtuy20emUW71tbKaL9jn2MXdiXLfeHAgc.png');
//    echo storage_path('images/j3Z9xGLjtuy20emUW71tbKaL9jn2MXdiXLfeHAgc.png');
//    return Storage::disk('public')->download('images/j3Z9xGLjtuy20emUW71tbKaL9jn2MXdiXLfeHAgc.png');
//});


//Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//    return view('dashboard');
//})->name('dashboard');

//Route::get('/dd', function () {
////    $id = Auth::id();
////    $user = Auth::user();
////    if (Auth::check()) {
////        echo "hello" ." ". $user->name;
////        echo "<br/>";
////        echo "ID" ." ". $id;
////    } else{
////        return redirect()->to('/');
////    }
//    $user = Auth::loginUsingId(3);
//    dd($user);
//});
//Route::get('/', function () {
//    return view('welcome');
//
//});

Auth::routes(['verify' => true]);


Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::resource('posts', PostsController::class);

});
Route::get('/admin', function () {
    echo "hello to admin";

})->middleware('isAdmin:مدیر');
//Route::get('session', function (Request $request) {
//    // $request->session()->put(['username'=>'aidin']);
////    return $request->session()->get('username');
//    // session(['email'=>'aidin@gmail.com']);
//    //  return $request->session()->all();
//    // return $request->session()->forget('username');
////    $request->session()->flush();
////    $request->session()->keep('msg');
////    return $request->session()->all();
//
//
//});
//some problems are fix

