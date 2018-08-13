<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function new() {
    //  echo "our own new page";
      return view('new');
    }
}
