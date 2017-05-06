<?php

 namespace App\Http\Controllers;

 use app\LinkList;
 use Illuminate\Http\Request;
 use Illuminate\Routing\Controller;
 use Illuminate\Support\Facades\DB;


 class linklistcontroller extends \App\Http\Controllers\Controller
 {
     //初始页面
     public function welcome()
     {
         return view('link');
     }
     //插入数据
     public function construct(Request $request)
     {
         return view('linklist.first');

     }
     //在指定位置插入数据
     public function insertview()
     {
         return view('linklist.two');
     }
     //数组元素个数
     public function size()
     {
         $maxid=DB::select('select max(id) from linklist');
         dd($maxid);
     }

     //返回最后一条
     public function pop()
     {
         $data=DB::table('linklist')->OrderBy('id','desc')->first();
         dd($data);
     }
     //删除指定位置的数据
     public function deleteview()
     {
         return view('linklist.four');
     }
     public function delete(Request $request)
     {   $id=$request->input('id');
        $is_success=DB::table('linklist')
             ->where('id',$id)
             ->delete();
         DB::table('linklist')->where('id','>',$id)->decrement('id');
         if($is_success)
         {
             echo '已成功删除选定数据';
         }
     }
     //在指定位置插入数据
     public function insert(Request $request)
     {
         $id=$request->input('id');
         $data=$request->input('data');
        $is_success= DB::insert('insert into linklist (id, value) values (?, ?)', [$id,$data]);
         DB::table('linklist')->where('id','>=',$id)->increment('id');
         DB::table('linklist')->where('value',$data)->decrement('id');
         if($is_success)
             echo'已成功插入一条数据';
         else
             echo'错误提示';

     }
     //插入数据
     public function do_construct(Request $request)
     {

         $data=$request->input('data');
         $datalist=explode(" ",$data);

       foreach($datalist as $keys=>$value)
         {
             DB::insert('insert into linklist(id,value) values(?,?)',[$keys,$value]);
         }
         echo '成功啦';

     }
     //打印链表
     public function print_list()
     {
        $list=DB::table('linklist')->get();

         return view('linklist.three',[
             'List'=>$list,
         ]);
     }

 }