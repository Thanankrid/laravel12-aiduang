<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    // หน้า index: แสดงข่าวทั้งหมด
    public function index() {
        $newsList = News::all();
        return view('news.index', compact('newsList'));
    }

    // หน้า detail: แสดงข่าวตาม id
    public function detail($id) {
        $news = News::findOrFail($id);
        return view('news.detail', compact('news'));
    }
}
