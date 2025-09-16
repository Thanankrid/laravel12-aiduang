<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>🌟 THANANKRID NEWS ข่าวบันเทิงสุดปัง 🌟</title>

    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://unpkg.com/alpinejs" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body { font-family: 'Kanit', sans-serif; }
        .img-hover img { transition: transform 0.5s ease, filter 0.5s ease; }
        .img-hover:hover img { transform: scale(1.08) rotate(0.5deg); filter: brightness(1.1); }
        .blink { animation: blinker 1.5s linear infinite; }
        @keyframes blinker { 50% { opacity: 0.3; } }
        .line-clamp-2 { display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; }
        .line-clamp-3 { display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; }
        .overlay-gradient { position: absolute; bottom: 0; width: 100%; height: 50%; background: linear-gradient(to top, rgba(0,0,0,0.6), transparent); }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-50 via-pink-50 to-red-50">

    {{-- Navbar --}}
    @include('navbar')

    {{-- Header --}}
    <header class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white py-16 text-center shadow-lg relative overflow-hidden">
        <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 animate-pulse">🌟 THANANKRID NEWS 🌟</h1>
        <p class="text-lg sm:text-xl font-medium mb-6">อัปเดตทุกเรื่องราววงการบันเทิง สดใหม่ทันใจ</p>
    </header>

    <main class="container mx-auto py-12 px-4" x-data="{ addOpen: false, editOpen: {} }">

        {{-- Section ข่าวล่าสุด --}}
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-2xl font-bold border-l-4 border-purple-500 pl-3 flex items-center">
                <i class="fas fa-newspaper mr-2 text-purple-500"></i> ข่าวล่าสุด
            </h2>
            <button @click="addOpen = !addOpen" class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 transition">
                เพิ่มข่าว
            </button>
        </div>

        {{-- ฟอร์มเพิ่มข่าว --}}
        <div x-show="addOpen" class="mb-8 bg-white p-4 rounded-lg shadow">
            <form action="{{ route('demo.news.store') }}" method="POST">
                @csrf
                <div class="flex flex-col sm:flex-row sm:space-x-2 space-y-2 sm:space-y-0">
                    <input type="text" name="title" placeholder="Title" class="border rounded px-2 py-1 w-full" required>
                    <input type="text" name="summary" placeholder="Summary" class="border rounded px-2 py-1 w-full">
                    <input type="text" name="image" placeholder="Image URL" class="border rounded px-2 py-1 w-full">
                </div>
                <textarea name="content" placeholder="เนื้อหาข่าว" class="border rounded px-2 py-1 w-full mt-2" required></textarea>
                <div class="mt-2 flex space-x-2">
                    <button type="submit" class="bg-blue-500 text-white px-4 py-1 rounded hover:bg-blue-600">บันทึก</button>
                    <button type="button" @click="addOpen=false" class="bg-gray-300 px-4 py-1 rounded hover:bg-gray-400">ยกเลิก</button>
                </div>
            </form>
        </div>

        @if ($newsList->count() > 0)
            @php $firstNews = $newsList->first(); @endphp

            {{-- ข่าวแรกใหญ่ --}}
            <div class="mb-12 md:flex md:space-x-8 relative">

                {{-- รูปภาพ --}}
                <div class="md:w-1/2 img-hover overflow-hidden rounded-2xl shadow-lg bg-white relative group">
                    <a href="{{ route('news.detail', $firstNews->id) }}">
                        <img src="{{ $firstNews->image }}" alt="{{ $firstNews->title }}" class="w-full h-full object-cover object-center rounded-2xl">
                        <div class="overlay-gradient rounded-b-2xl"></div>
                        <h2 class="absolute bottom-4 left-4 text-white text-2xl sm:text-3xl font-bold drop-shadow-lg group-hover:text-yellow-300 transition duration-300">
                            {{ $firstNews->title }}
                        </h2>
                    </a>
                </div>

                {{-- ข้อความ + ปุ่ม Edit/Delete --}}
                <div class="md:w-1/2 flex flex-col justify-center mt-6 md:mt-0 relative">
                    <p class="text-gray-700 mb-4 line-clamp-3">{{ $firstNews->summary }}</p>
                    <a href="{{ route('news.detail', $firstNews->id) }}" class="inline-block bg-purple-600 text-white px-4 py-2 rounded-full font-medium shadow hover:bg-purple-700 transition duration-300 text-sm self-start mb-2">
                        อ่านต่อ...
                    </a>

                    {{-- ปุ่มแก้ไข / ลบ --}}
                    <div class="flex space-x-2">
                        <button @click="editOpen[{{ $firstNews->id }}] = !editOpen[{{ $firstNews->id }}]" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-sm">แก้ไข</button>
                        <form action="{{ route('demo.news.destroy', $firstNews->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('ลบข่าวนี้?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">ลบ</button>
                        </form>
                    </div>

                    {{-- ฟอร์มแก้ไข --}}
                    <div x-show="editOpen[{{ $firstNews->id }}]" class="mt-2 bg-gray-50 p-2 rounded">
                        <form action="{{ route('demo.news.update', $firstNews->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="text" name="title" value="{{ $firstNews->title }}" class="border rounded px-2 py-1 mb-1 w-full" required>
                            <input type="text" name="summary" value="{{ $firstNews->summary }}" class="border rounded px-2 py-1 mb-1 w-full" required>
                            <input type="text" name="image" value="{{ $firstNews->image }}" class="border rounded px-2 py-1 mb-1 w-full">
                            <textarea name="content" class="border rounded px-2 py-1 mb-1 w-full" required>{{ $firstNews->content }}</textarea>
                            <div class="flex space-x-2">
                                <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">บันทึก</button>
                                <button type="button" @click="editOpen[{{ $firstNews->id }}]=false" class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400 text-sm">ยกเลิก</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- Grid ข่าวเล็ก --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($newsList->skip(1)->take(9) as $news)
                    <div class="bg-white rounded-xl shadow hover:shadow-2xl overflow-hidden img-hover flex flex-col transition duration-300 group relative p-2">
                        <a href="{{ route('news.detail', $news->id) }}" class="flex flex-col h-full relative">
                            <div class="w-full aspect-square overflow-hidden flex-shrink-0 relative">
                                <img src="{{ $news->image ?? 'https://via.placeholder.com/400x400' }}" alt="{{ $news->title }}" class="w-full h-full object-cover object-center rounded-lg">
                                <div class="overlay-gradient rounded-b-lg"></div>
                            </div>
                            <div class="p-2 flex-1 flex flex-col">
                                <h4 class="text-lg font-bold mb-2 text-gray-800 line-clamp-2 group-hover:text-pink-500 transition duration-300">{{ $news->title }}</h4>
                                <p class="text-gray-600 mb-2 flex-1 line-clamp-3">{{ $news->summary }}</p>
                                <span class="text-sm text-pink-600 hover:underline">อ่านต่อ</span>
                            </div>
                        </a>

                        {{-- ปุ่มแก้ไข / ลบ --}}
                        <div class="flex space-x-2 mt-2">
                            <button @click="editOpen[{{ $news->id }}] = !editOpen[{{ $news->id }}]" class="bg-yellow-400 text-white px-3 py-1 rounded hover:bg-yellow-500 text-sm">แก้ไข</button>
                            <form action="{{ route('demo.news.destroy', $news->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('ลบข่าวนี้?')" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600 text-sm">ลบ</button>
                            </form>
                        </div>

                        {{-- ฟอร์มแก้ไข --}}
                        <div x-show="editOpen[{{ $news->id }}]" class="mt-2 bg-gray-50 p-2 rounded">
                            <form action="{{ route('demo.news.update', $news->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="text" name="title" value="{{ $news->title }}" class="border rounded px-2 py-1 mb-1 w-full" required>
                                <input type="text" name="summary" value="{{ $news->summary }}" class="border rounded px-2 py-1 mb-1 w-full" required>
                                <input type="text" name="image" value="{{ $news->image }}" class="border rounded px-2 py-1 mb-1 w-full">
                                <textarea name="content" class="border rounded px-2 py-1 mb-1 w-full" required>{{ $news->content }}</textarea>
                                <div class="flex space-x-2">
                                    <button type="submit" class="bg-blue-500 text-white px-3 py-1 rounded hover:bg-blue-600 text-sm">บันทึก</button>
                                    <button type="button" @click="editOpen[{{ $news->id }}]=false" class="bg-gray-300 px-3 py-1 rounded hover:bg-gray-400 text-sm">ยกเลิก</button>
                                </div>
                            </form>
                        </div>

                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg mt-10">ยังไม่มีข่าว</p>
        @endif
    </main>

    {{-- Footer --}}
    <footer class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white py-8 text-center mt-16 shadow-inner">
        <p class="text-sm sm:text-base">© 2025 PangNews ✨ จัดทำโดย <span class="font-bold">Thanankrid Chaichana</span></p>
    </footer>

</body>
</html>
