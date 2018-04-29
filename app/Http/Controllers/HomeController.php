<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Checklist_Item;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $checklist_item
            = Checklist_Item::where('checklist_id', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index', compact('checklist_item'));
    }
}
