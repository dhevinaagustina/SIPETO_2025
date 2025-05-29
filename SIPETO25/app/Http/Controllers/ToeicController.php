<?php
// app/Http/Controllers/ToeicController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ToeicController extends Controller
{
    public function index()
    {
        return view('toeic.resources');
    }

    public function understanding()
    {
        return view('toeic.articles.understanding');
    }

    public function strategies()
    {
        return view('toeic.articles.strategies');
    }

    public function practice()
    {
        return view('toeic.articles.practice');
    }
}