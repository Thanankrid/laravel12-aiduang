@props(['news'])

<div class="max-w-sm rounded overflow-hidden shadow-lg m-4 bg-white">
    <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $news->title }}</div>
        <p class="text-gray-700 text-base">
            {{ Str::limit($news->content, 100) }}...
        </p>
    </div>
    <div class="px-6 pt-4 pb-2">
        <a href="{{ route('news.detail', $news->id) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            อ่านต่อ
        </a>
    </div>
</div>
