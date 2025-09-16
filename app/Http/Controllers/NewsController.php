<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\News;

class NewsController extends Controller
{
    /**
     * แสดงหน้าหลัก พร้อมข่าวล่าสุด 10 ข่าว
     */
    public function index()
    {
        $newsList = News::orderBy('created_at', 'desc')->take(10)->get();
        return view('index', compact('newsList'));
    }

    /**
     * แสดงรายละเอียดข่าว
     */
    public function detail($id)
    {
        $news = News::findOrFail($id);
        return view('news-detail', compact('news'));
    }

    /**
     * เพิ่มข่าวใหม่
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'content' => 'required|string', // ต้องกรอก content
        ]);

        News::create($request->only('title', 'summary', 'image', 'content'));

        return redirect()->back()->with('success', 'เพิ่มข่าวเรียบร้อยแล้ว');
    }

    /**
     * แก้ไขข่าว
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'summary' => 'nullable|string',
            'image' => 'nullable|string|max:255',
            'content' => 'required|string', // ต้องกรอก content
        ]);

        $news = News::findOrFail($id);
        $news->update($request->only('title', 'summary', 'image', 'content'));

        return redirect()->back()->with('success', 'แก้ไขข่าวเรียบร้อยแล้ว');
    }

    /**
     * ลบข่าว
     */
    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();

        return redirect()->back()->with('success', 'ลบข่าวเรียบร้อยแล้ว');
    }
}
