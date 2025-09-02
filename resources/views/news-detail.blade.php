<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $news->title }} | PangNews</title>

    <!-- Tailwind CSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        body { font-family: 'Kanit', sans-serif; }
        .news-content p {
            margin-bottom: 1.5rem;
            line-height: 1.8;
            font-size: 1.125rem;
        }
    </style>
</head>
<body class="bg-gray-100">

    {{-- Nav responsive --}}
    <nav x-data="{ open: false }" class="bg-purple-800 text-white shadow-md sticky top-0 z-50">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ route('news.index') }}" class="text-2xl font-bold">PangNews ✨</a>

            {{-- Hamburger --}}
            <div class="md:hidden">
                <button @click="open = !open">
                    <i class="fas" :class="{ 'fa-bars': !open, 'fa-times': open }"></i>
                </button>
            </div>

            {{-- Menu desktop --}}
            <div class="hidden md:flex space-x-6 items-center">
                <a href="{{ route('news.index') }}" class="hover:text-purple-200">หน้าแรก</a>
                <a href="#" class="hover:text-purple-200">ข่าวดารา</a>
                <a href="#" class="hover:text-purple-200">ข่าวหนัง/ซีรีส์</a>
            </div>
        </div>

        {{-- Menu mobile --}}
        <div x-show="open" class="md:hidden px-6 pb-4 space-y-2">
            <a href="{{ route('news.index') }}" class="block hover:text-purple-200">หน้าแรก</a>
            <a href="#" class="block hover:text-purple-200">ข่าวดารา</a>
            <a href="#" class="block hover:text-purple-200">ข่าวหนัง/ซีรีส์</a>
        </div>
    </nav>

    {{-- เนื้อหาข่าว --}}
    <main class="container mx-auto py-10 px-6">
        <article class="max-w-4xl mx-auto bg-white rounded-xl shadow-lg p-6 md:p-10">

            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">{{ $news->title }}</h1>

            <div class="text-gray-500 text-sm mb-6">
                <span>เผยแพร่เมื่อ: {{ $news->created_at->format('d F Y') }}</span>
            </div>

            @if($news->image)
            <div class="mb-8 rounded-lg overflow-hidden shadow-md">
                <img src="{{ $news->image }}" alt="{{ $news->title }}" class="w-full h-auto object-cover">
            </div>
            @endif

            <div class="news-content text-gray-800">
                {!! $news->content !!}
            </div>

            <hr class="my-8 border-gray-200">

            <div class="text-center">
                <p class="text-gray-600 mb-3">อ้างอิงข้อมูลจาก:</p>
                <a href="{{ $news->source }}" target="_blank" rel="noopener noreferrer"
                    class="inline-block bg-purple-600 text-white font-bold py-3 px-8 rounded-full hover:bg-purple-700 transition-colors duration-300">
                    <i class="fas fa-link mr-2"></i> อ่านต้นฉบับ
                </a>
            </div>

        </article>

        <div class="text-center mt-12">
            <a href="{{ route('news.index') }}" class="text-purple-600 font-semibold hover:underline">
                <i class="fas fa-arrow-left mr-2"></i> กลับสู่หน้าแรก
            </a>
        </div>
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-6 text-center mt-10">
        <p class="text-sm">© 2025 PangNews ✨ จัดทำโดย <span class="text-pink-400 font-semibold">Thanankrid Chaichana</span></p>
    </footer>

    {{-- Alpine.js สำหรับ Hamburger --}}
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.12.0/dist/cdn.min.js" defer></script>

</body>
</html>
