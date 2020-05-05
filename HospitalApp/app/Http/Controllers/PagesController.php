<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function index(){
        $title='Parameter from controller';
        $data=array(
           'name'=>'yohan',
           'abilities'=>['Web Design','HTML','CSS']
        );
        return view('pages.index')->with($data);
    }

    public function register(){
        return view('pages.registration');
    }
}
