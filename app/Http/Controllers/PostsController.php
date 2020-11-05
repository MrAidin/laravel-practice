<?php

namespace App\Http\Controllers;

use App\Events\PostViewEvent;
use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::with('user')->get();
        //$posts[0];
        return view('posts.index', compact(['posts']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('file');
        //نام اصلی فایلی که کاربر فرستاده
        // echo $file->getClientOriginalName();
        //نوع فایل ارسالی را نمایش میدهد
        //  echo"<br>". $file->getClientMimeType();
        //ته آپلود سایز رو نمایش میده
        // echo $file->getMaxFileSize();


//        $this->validate($request, [
//            'title' => 'required|max:2',
//            'description' => 'required',
//        ], [
//            'title.required' => 'عنوان مورد نظر را وارد کنید.',
//            'title.max' => 'تعداد کارکتر ها باید بیشز دو تا باشد',
//            'description.required' => 'مطلب مورد نظر را وارد کنید .'
//        ]);

        $post = new Post();
        if ($file = $request->file('file')) {
            $name = $file->getClientOriginalName();
            $file->store('public/images');
            $file->move('images', $name);
            $post->path = $name;
        }
        $post->title = $request->title;
        $post->body = $request->description;
        $post->user_id = 1;
        $post->save();
        return redirect('posts');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        event(new PostViewEvent($post));
        return view('posts.show', compact(['post']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $user = Auth::user();
        return view('posts.edit', compact(['post']));

//        if ($user->can('update', $post)) {
//            return view('posts.edit', compact(['post']));
//
//        }else{
//            return 'شما اجازه دسرسی ندارید';
//
//        }


//        if (Gate::denies('edit-post', $post)) {
//
//
//        } else {
//            return view('posts.edit', compact(['post']));
//
//        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->title = $request->title;
        $post->body = $request->description;
        $post->save();
        return redirect('posts');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect('posts');


    }


}

//    public function showMyView($id, $name, $password)
//    {
//        //   return view('pages.my')->with('id',$id);
//        return view('pages.my', compact(['id', 'name', 'password']));
//    }
//
//    public function contact()
//    {
//        $people = ['آیدین', 'علی', 'حسن', 'مجید'];
//        return view('pages.contact', compact('people'));
//    }
//
//    public function insert()
//    {
//        DB::insert('insert into posts(title,body,user_id)values (?,?,?)', ['پست زرت', 'این پست رو با زرت نوشتم',1]);
//
//    }
//
//    public function select()
//    {
//        $posts = DB::select('select * from posts');
//        return $posts;
//
//    }
//
//    public function updates()
//    {
//        $post = DB::update('update posts set title="بروز شده است" where id=?', [4]);
//        return $post;
//
//    }
//
//    public function deletes()
//    {
//        $post = DB::delete('delete from posts where id=?', [3]);
//        return $post;
//
//    }
//
//    public function getAllPosts()
//    {
//        $posts = Post::findOrFail(100);
//        return $posts;
//    }
//
//    public function savePosts()
//    {
////        $post = new Post();
////        $post->title = 'post5';
////        $post->body = 'create post with eloquent';
////        $post->save();
//        $post = Post::create(['title' => 'post6', 'body' => 'create post with eloquent']);
//
//    }
//
//    public function updatePost()
//    {
//        // $post = Post::where('id', 5)->update(['title' => 'updated Post', 'body' => 'updated']);
//        //    return $post;
//        $post = Post::findOrFail(4);
//        $post->title = 'updated';
//        $post->save();
//
//    }
//
//    public function NewDeletePost()
//    {
//        $post = Post::Where('id', 9)->delete();
////        $post->delete();
////        Post::destroy([2,4]);
//        if ($post) {
//            echo "deleted";
//        } else {
//            echo " not delete";
//        }
//
//
//    }
//
//    public function workWithTrash()
//    {
////        $post=Post::withTrashed()->get();
////        return $post;
//        $post = Post::onlyTrashed()->where('id', 10)->get();
//        return $post;
//    }
//
//    public function restorePost()
//    {
//        Post::onlyTrashed()->where('id', 10)->restore();
//
//    }
//
//    public function forceDelete()
//    {
//        Post::onlyTrashed()->where('id', 10)->forceDelete();
//
//
//    }
//}
