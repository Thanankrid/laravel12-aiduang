<?php

use App\Models\Product;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\NewsController;


Route::get('/', function () {
    return Inertia::render('welcome');
})->name('home');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';

Route::get("/homepage", function () {
    return "<h1>This is home page Thanankrid eiei </h1>";
});

Route::get("/blog/{id}", function ($id) {
    return "<h1>This is blog page : {$id} </h1>";
});

Route::get("/hello", function () {
    return view("hello");
});

Route::get('/greeting', function () {
    $name = 'James';
    $last_name = 'Mars';
    return view('greeting', compact('name', 'last_name'));
});

Route::get('/bootstrap-example', function () {
    return view('bootstrap-example');
});

Route::get("/gallery", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    $god = "https://www.blackoutx.com/wp-content/uploads/2021/04/Thor.jpg";
    $spider = "https://icdn5.digitaltrends.com/image/spiderman-far-from-home-poster-2-720x720.jpg";

    return view("test/index", compact("ant", "bird", "cat", "god", "spider"));
});

Route::get("/gallery/ant", function () {
    $ant = "https://cdn3.movieweb.com/i/article/Oi0Q2edcVVhs4p1UivwyyseezFkHsq/1107:50/Ant-Man-3-Talks-Michael-Douglas-Update.jpg";
    return view("test/ant", compact("ant"));
});

Route::get("/gallery/bird", function () {
    $bird = "https://images.indianexpress.com/2021/03/falcon-anthony-mackie-1200.jpg";
    return view("test/bird", compact("bird"));
});

Route::get("/gallery/cat", function () {
    $cat = "http://www.onyxtruth.com/wp-content/uploads/2017/06/black-panther-movie-onyx-truth.jpg";
    return view("test/cat", compact("cat"));
});



Route::get("/teacher", function () {
    return view("teacher");
});

Route::get("/student", function () {
    return view("student");
});

Route::get("/theme", function () {
    return view("theme");
});



Route::get('/active/index', function () {
    return view('active/index');
})->name('index');




Route::get("/active-bootstrap", function () {
    return view("active-bootstrap");
});




Route::get('/active/about', function () {
    return view('active/about');
})->name('about');

Route::get('/active/services', function () {
    return view('active/services');
})->name('services');

Route::get('/active/portfolio', function () {
    return view('active/portfolio');
})->name('portfolio');

Route::get('/active/team', function () {
    return view('active/team');
})->name('team');

Route::get('/active/blog', function () {
    return view('active/blog');
})->name('blog');

Route::get('/active/blog-detail', function () {
    return view('active/blog-detail');
})->name('blog-detail');

Route::get('/active/contact', function () {
    return view('active/contact');
})->name('contact');



Route::get('/test', function () {
    return view('test');
})->name('test');


Route::get('/coronavirus', function () {
    $reports = [
        (object) ["country" => "China", "date" => "2020-04-19", "total" => "2765", "active" => "790", "death" => "47", "recovered" => "1928"],
        (object) ["country" => "Thailand", "date" => "2020-04-18", "total" => "2733", "active" => "899", "death" => "47", "recovered" => "1787"],
        (object) ["country" => "Thailand", "date" => "2020-04-17", "total" => "2700", "active" => "964", "death" => "47", "recovered" => "1689"],
        (object) ["country" => "Thailand", "date" => "2020-04-16", "total" => "2672", "active" => "1033", "death" => "46", "recovered" => "1593"],
        (object) ["country" => "Thailand", "date" => "2020-04-15", "total" => "2643", "active" => "1103", "death" => "43", "recovered" => "1497"],
    ];
    return view("coronavirus", compact("reports"));
})->name('coronavirus');


Route::get('/active/teacher', function () {
    $teachers = json_decode(file_get_contents('https://raw.githubusercontent.com/arc6828/laravel8/main/public/json/teachers.json'));
    return view("active.teacher", compact("teachers"));
})->name('active.teacher');


/* Route::get('/category/sport', function () {
    return "<h1>This is sport Category Page</h1>";
});
Route::get('/category/politic', function () {
    return "<h1>This is politic Category Page</h1>";
});
Route::get('/category/entertain', function () {
    return "<h1>This is entertain Category Page</h1>";
});
Route::get('/category/auto', function () {
    return "<h1>This is auto Category Page</h1>";
}); */



Route::get('/category/sport', [CategoryController::class, "sport"]);
Route::get('/category/politic', [CategoryController::class, "politic"]);
Route::get('/category/entertain', [CategoryController::class, "entertain"]);
Route::get('/category/auto', [CategoryController::class, "auto"]);


// use App\Models\Product;
// use Illuminate\Support\Facades\DB;

Route::get('query/sql', function () {
    $products = DB::select("SELECT * FROM products");
    // $products = DB::select("SELECT * FROM products WHERE price > 100");
    return view('query-test', compact('products'));
});

Route::get('query/builder', function () {
    $products = DB::table('products')->get();
    // $products = DB::table('products')->where('price', '>', 100)->get();
    return view('query-test', compact('products'));
});




Route::get('product-index', function () {
    $products = Product::get();
    return view('query-test', compact('products'));
})->name("product.index");


Route::get('product-form', function () {    
    return view('product-form');
})->name("product.form");


Route::get('barchart', function () {    
    return view('barchart');
})->name('barchart');


Route::post('/product-submit', function (Request $request) {    
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:0',
        'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
    ]);    

    // ตรวจสอบว่ามีการอัปโหลดรูปภาพ
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
        $url = Storage::url($imagePath);
        $data["image"] =$url;
    }

    // บันทึกข้อมูลในฐานข้อมูล
    Product::create($data);

    return redirect()->route('product.index')->with('success', 'เพิ่มสินค้าแล้ว!');
})->name('product.submit');





/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route นี้จะทำงานเมื่อเข้า http://127.0.0.1:8000/index
Route::get('/index', function () {
    $newsList = News::latest()->paginate(10);
    return view('index', ['newsList' => $newsList]);
})->name('news.index');


// Route สำหรับหน้ารายละเอียดข่าว
Route::get('/news/{id}', function ($id) {
    $news = News::findOrFail($id);
    return view('news-detail', ['news' => $news]);
})->name('news.detail');

// สำคัญ: ตรวจสอบให้แน่ใจว่าไม่มี Route::get('/', ...); อื่นในไฟล์นี้
// การที่ไม่มี Route สำหรับ '/' จะทำให้หน้านั้นเป็น 404 Not Found







// CRUD สำหรับข่าว
Route::prefix('news')->name('demo.news.')->group(function() {
    Route::post('/store', [NewsController::class, 'store'])->name('store');
    Route::put('/update/{id}', [NewsController::class, 'update'])->name('update');
    Route::delete('/destroy/{id}', [NewsController::class, 'destroy'])->name('destroy');
});

