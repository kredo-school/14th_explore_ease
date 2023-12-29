<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
        // show dashboard page
        public function index()
        {
            return view('contact');
        }
}
