<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function display_page1() {
        $name = "Jeric Dela Cruzs";
        $section = "BSIT 4-2";
        $age = 21;
        return view('page1')
        ->with(compact('name', 'section', 'age'));
    }

    public function display_page2() {
        $word = "Hello Kitty";
        $word1 = "Hello World";
        $word2 = "Hello Laravel";
        return view('page2')
        ->with(compact('word', 'word1', 'word2'));
    }

    // public function display_student() {
    //     return view('student');
    // }
    // public function display_faculty() {
    //     return view('faculty');
    // }
    // public function display_subject() {
    //     return view('subject');
    // }
}
