{{-- resources/views/navbar.blade.php --}}
<nav x-data="{ open: false }" class="bg-purple-800 text-white shadow-md sticky top-0 z-50">
    <div class="container mx-auto px-6 py-3 flex justify-between items-center">
        <a href="/index" class="text-2xl font-bold">PangNews ✨</a>

        <div class="md:hidden">
            <button @click="open = !open">
                <i class="fas" :class="{ 'fa-bars': !open, 'fa-times': open }"></i>
            </button>
        </div>

        <div class="hidden md:flex space-x-6 items-center">
            <a href="/index" class="hover:text-purple-200">หน้าแรก</a>
            <a href="#" class="hover:text-purple-200">ข่าวดารา</a>
            <a href="#" class="hover:text-purple-200">ข่าวหนัง/ซีรีส์</a>
        </div>
    </div>

    <div x-show="open" class="md:hidden px-6 pb-4 space-y-2">
        <a href="/index" class="block hover:text-purple-200">หน้าแรก</a>
        <a href="#" class="block hover:text-purple-200">ข่าวดารา</a>
        <a href="#" class="block hover:text-purple-200">ข่าวหนัง/ซีรีส์</a>
    </div>
</nav>
