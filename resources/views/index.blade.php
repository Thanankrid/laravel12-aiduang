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
        body {
            font-family: 'Kanit', sans-serif;
        }

        .img-hover img {
            transition: transform 0.5s ease, filter 0.5s ease;
        }

        .img-hover:hover img {
            transform: scale(1.08) rotate(0.5deg);
            filter: brightness(1.1);
        }

        .blink {
            animation: blinker 1.5s linear infinite;
        }

        @keyframes blinker {
            50% {
                opacity: 0.3;
            }
        }

        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .line-clamp-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .overlay-gradient {
            position: absolute;
            bottom: 0;
            width: 100%;
            height: 50%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.6), transparent);
        }
    </style>
</head>

<body class="bg-gradient-to-b from-purple-50 via-pink-50 to-red-50">

    {{-- Navbar --}}
    @include('navbar')

    {{-- Header --}}
    <header
        class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white py-16 text-center shadow-lg relative overflow-hidden">
        <h1 class="text-4xl sm:text-5xl font-extrabold mb-4 animate-pulse">🌟 THANANKRID NEWS 🌟</h1>
        <p class="text-lg sm:text-xl font-medium mb-6">อัปเดตทุกเรื่องราววงการบันเทิง สดใหม่ทันใจ</p>
    </header>

    <main class="container mx-auto py-12 px-4">

        {{-- Section ข่าวล่าสุด --}}
        <div class="flex items-center mb-8">
            <h2 class="text-2xl font-bold border-l-4 border-purple-500 pl-3 flex items-center">
                <i class="fas fa-newspaper mr-2 text-purple-500"></i> ข่าวล่าสุด
            </h2>
            <span class="ml-3 bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-md blink">สด!</span>
        </div>

        @if ($newsList->count() > 0)
            @php $firstNews = $newsList->first(); @endphp

            {{-- ข่าวแรกใหญ่ --}}
            <div class="mb-12 md:flex md:space-x-8">

                {{-- ================= ส่วนของรูปภาพ (ฝั่งซ้าย) ================= --}}
                <div class="md:w-1/2 img-hover overflow-hidden rounded-2xl shadow-lg bg-white relative group">
                    <a href="{{ route('news.detail', $firstNews->id) }}">
                        <img src="{{ $firstNews->image }}" alt="{{ $firstNews->title }}"
                            class="w-full h-full object-cover object-center rounded-2xl">
                        <div class="overlay-gradient rounded-b-2xl"></div>
                        <h2
                            class="absolute bottom-4 left-4 text-white text-2xl sm:text-3xl font-bold drop-shadow-lg group-hover:text-yellow-300 transition duration-300">
                            {{ $firstNews->title }}
                        </h2>
                    </a>
                </div>

                {{-- ================= ส่วนของข้อความ (ฝั่งขวา) ================= --}}
                <div class="md:w-1/2 flex flex-col justify-center mt-6 md:mt-0">
                    <p class="text-gray-700 mb-6 line-clamp-3">{{ $firstNews->summary }}</p>

                    {{-- ปุ่มอ่านต่อที่แก้แล้ว (ใช้ self-start) --}}
                    <a href="{{ route('news.detail', $firstNews->id) }}"
                        class="inline-block bg-purple-600 text-white px-4 py-2 rounded-full font-medium shadow hover:bg-purple-700 transition duration-300 text-sm self-start">
                        อ่านต่อ...
                    </a>
                </div>

            </div>

            {{-- Grid ข่าวเล็ก --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
                @foreach ($newsList->skip(1)->take(9) as $news)
                    <div
                        class="bg-white rounded-xl shadow hover:shadow-2xl overflow-hidden img-hover flex flex-col transition duration-300 group">
                        <a href="{{ route('news.detail', $news->id) }}" class="flex flex-col h-full relative">
                            <div class="w-full aspect-square overflow-hidden flex-shrink-0 relative">
                                <img src="{{ $news->image ?? 'https://via.placeholder.com/400x400' }}"
                                    alt="{{ $news->title }}" class="w-full h-full object-cover object-center">
                                <div class="overlay-gradient"></div>
                            </div>
                            <div class="p-4 flex-1 flex flex-col">
                                <h4
                                    class="text-lg font-bold mb-2 text-gray-800 line-clamp-2 group-hover:text-pink-500 transition duration-300">
                                    {{ $news->title }}
                                </h4>
                                <p class="text-gray-600 mb-4 flex-1 line-clamp-3">{{ $news->summary }}</p>
                                <span class="text-sm text-pink-600 hover:underline">อ่านต่อ</span>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p class="text-center text-gray-500 text-lg mt-10">ยังไม่มีข่าว</p>
        @endif
    </main>

    {{-- Footer --}}
    <footer
        class="bg-gradient-to-r from-purple-600 via-pink-500 to-red-500 text-white py-8 text-center mt-16 shadow-inner">
        <p class="text-sm sm:text-base">© 2025 PangNews ✨ จัดทำโดย <span class="font-bold">Thanankrid Chaichana</span>
        </p>
    </footer>

</body>

</html>
