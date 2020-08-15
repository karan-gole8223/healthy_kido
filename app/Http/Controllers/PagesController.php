<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index()
    {
        $title= 'Healthy Kido Blogging ';
        return view('pages.index')-> with('title', $title);
    }
    public function about()
    {
        $title= 'this is about page3333333';
        return view('pages.about')->with('title', $title);
    }
    public function services()
    {
        //$title= 'this is services page333';
         $data= array(
             'title'=> 'services',
             'services'=>['web design', 'seo', 'digital marketing']
         );
        return view('pages.services')->with($data);
    }

}
