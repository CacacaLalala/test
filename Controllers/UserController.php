<?php
/**
 * Created by PhpStorm.
 * User: ningge
 * Date: 2017/3/28
 * Time: 19:28
 */

namespace App\Http\Controllers;


class UserController extends Controller
{
public function _contruct()
{
    $this->middleware('auth');

}
public function home()
{
    return view('home');
}


}