<?php namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class PagesController extends Controller {

	public function about()
    {
        $name = 'Jeffrey <span style="color: red;">  Way</span>';


        return view('pages.about')->with('name', $name);
    }

}


