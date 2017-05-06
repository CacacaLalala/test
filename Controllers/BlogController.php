<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use DB;
use Auth;
use Crypt;

class BlogController extends Controller
{
//


    //add a post
    public function add(Request $request) {
        $content = $request->input('content');
        $title=$request->input('title');
        $user = Auth::user();
        $date = date('Y-m-d H:i:s', time());
        $id=$user->id;
        $is_success = DB::insert('insert into blog (content,title,author,created_at,updated_at) 
VALUES (?,?,?,?,?)', [$content, $title, $id,$date, $date]);

      return redirect()->action('BlogController@myself');
    }


    //get a post
    public function get($uid){
//        echo '123';
//        dd(route('getPost', 10));
//        return 'this function will do something';
        $blog = DB::select('select * from blog where uid = ?', [(int)$uid]);
        dd($blog);
        return view('BlogTest');
    }
    //更新内容
    public function update(Request $request, $id) {
        $content = $request->input('content');

        $num = DB::update('update blog set content = ? where id = ?' , [$content, $id]);
        echo $num;
    }
    //删除评论
    public function delete($id)
    {
        $num = DB::delete('delete from comment where comment_id = ? ' , [$id]);
        return redirect()->action('BlogController@myself');
    }
    //删除帖子
    public function deletepost($id)
    {

        $num = DB::delete('delete from blog where uid = ? ' , [$id]);
        return redirect()->action('BlogController@myself');
    }
    //评论
    public function comment(Request $request,$blog_id)
    {   $user=Auth::user();
        $uid=$user->id;
        $date = date('Y-m-d H:i:s', time());
        $comment=$request->input('content');
        $is_success=DB::insert('insert into comment(comment_id,blog_id,create_at,content) values(?,?,?,?)',[$uid,$blog_id,$date,$comment]);
        return redirect()->action('BlogController@Havealook');
    }

    public function getregister()
    {
        return view('auth.register');
    }
    public function postregister(Request $request)
    {
        $name = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        $password_confirmation = $request->input('password_confirmation');
        if ($password_confirmation == $password) {
           DB::insert('insert into users(name,email,password) values(?,?,?)', [$name, $email, $password]);
        }
    }
    //当前用户个人主页
    public function myself()
    {   $user_id=Auth::user()['id'];
        $article=DB::table('blog')->get();
        $comment=DB::table('comment')->get();
        $date = date('Y-m-d H:i:s', time());
        return view('blog.formyself',[
            'articles'=>$article,
            'comments'=>$comment,
            'user_id'=>$user_id,
        ]);
    }
    //博客浏览
    public function Havealook()
    {
        $article=DB::table('blog')->get();
        $comment=DB::table('comment')->get();


        return view('Blog.Have a look',[
            'articles'=>$article,
            'comments'=>$comment,
        ]);
    }
    //管理帖子界面
    public function Admin()
    {
        $article=DB::table('blog')->get();
        $admin_user=DB::table('admin')->get();
        $user_email=Auth::user()['email'];
        $comment=DB::table('comment')->get();

        if(Auth::check())
        {return view('blog.Admin',[
            'articles'=>$article,
            'user_email'=>$user_email,
            'admin_user'=>$admin_user,
            'comment'=>$comment,
        ]);}
        else
        {return view('auth.login');}
    }
    //管理用户界面
    public function user_admin()
    {
        $users=DB::table('users')->get();
        $admin_user=DB::table('admin')->get();
        $user=Auth::user();
        $user_email=$user->email;

        return view('blog.user_admin',[
            'user_email'=>$user_email,
            'admin_user'=>$admin_user,
            'users'=>$users,
        ]);
    }
    //查看自己的帖子
    public function look($uid)
    {
        $article=DB::table('blog')->get();
        return view('Blog.look',[
            'articles'=>$article,
            'uid'=>$uid,
        ]);
    }
    //更新自己的帖子
    public function change($uid)
    {
        $article=DB::table('blog')->get();
        return view('Blog.change',[
            'articles'=>$article,
            'uid'=>$uid,
        ]);
    }
    public function changeinsert(Request $request,$uid)
    {   $title=$request->input('change');
        $content=$request->input('changesecond');
       DB::table('blog')
           ->where('uid',$uid)
           ->update(['title'=>$title,'content'=>$content]);
    }
    //从管理界面进入用户主页
    public function adminlook($id)
    {   $article=DB::table('blog')->get();
        $comment=DB::table('comment')->get();
        return view('Blog.formyself',[
            'articles'=>$article,
            'id'=>$id,
            'comments'=>$comment,
        ]);
    }
    //从管理界面删除用户
    public function admindelete($id)
    {
        $num = DB::delete('delete from  users where id = ? ' , [$id]);
        return redirect()->action('BlogController@user_admin');
    }
    public function changepass($id)
    {
        $user=DB::table('users')->get();
        return view('Blog.changepass',[
            'users'=>$user,
            'uid'=>$id,
        ]);
    }
    public function changepassinsert(Request $request,$id)
    {
        $newpass=$request->input('newpass');
        $is_success=
            DB::table('users')
                ->where('id',$id)
                ->update(['password'=>Bcrypt($newpass)
                ]);
        if($is_success)
        {
            return redirect()->action('BlogController@myself');
        }
    }
}
