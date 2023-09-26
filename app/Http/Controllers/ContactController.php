<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index (){
        return view('master.contact.index'); //return the contact pages.
    }
}
