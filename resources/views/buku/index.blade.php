<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Data Buku Digital | Perpustakaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-[#f8fafc] text-[#1e293b] min-h-screen">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Header Section -->
        <div class="flex flex-col md:flex-row md:items-center justify-between mb-10 gap-6">
            <div>
                <h1 class="text-4xl font-bold tracking-tight text-slate-900 mb-2 cursor-default">Manajemen Data Buku Digital</h1>
                <p class="text-slate-500 cursor-default">Sistem Manajemen Data Buku Digital untuk Perpustakaan Digital.</p>
            </div>
            <a href="{{ route('buku.create') }}" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-2xl transition-all duration-300 shadow-lg shadow-indigo-200 transform hover:-translate-y-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>
                Tambah Buku Baru
            </a>
        </div>

        @if(session('success'))
        <div class="mb-8 p-4 bg-emerald-50 border border-emerald-100 text-emerald-700 rounded-2xl flex items-center animate-fade-in-down">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
        @endif

        <!-- Search & Filter Section -->
        <form action="{{ route('buku.do-search') }}" method="POST" class="bg-white p-4 rounded-3xl shadow-sm border border-slate-100 mb-8 flex flex-col md:flex-row gap-4 items-center">
            @csrf
            <div class="relative flex-1 w-full">
                <span class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none text-slate-400">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                </span>
                <input type="text" name="search" value="{{ session('buku_search') }}" placeholder="Cari judul, penulis, atau kategori..." class="block w-full pl-11 pr-4 py-3 bg-slate-50 border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all">
            </div>
            <div class="relative w-full md:w-auto custom-dropdown" data-auto-submit="true">
                <input type="hidden" name="category" class="dropdown-input" value="{{ session('buku_category', 'Semua Kategori') }}">
                <button type="button" class="dropdown-btn flex items-center justify-between gap-3 bg-slate-50 rounded-2xl py-3 px-5 focus:ring-2 focus:ring-indigo-500 transition-all text-slate-700 cursor-pointer w-full md:min-w-[200px] hover:bg-slate-100">
                    <div class="flex items-center gap-2">
                        <span class="text-indigo-500">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                        </span>
                        <span class="dropdown-text font-semibold text-sm">{{ session('buku_category', 'Semua Kategori') }}</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform duration-300 dropdown-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>
                <div class="dropdown-menu absolute top-full left-0 right-0 mt-2 bg-white rounded-2xl shadow-2xl border border-slate-100 overflow-hidden z-50 hidden opacity-0 translate-y-2 transition-all duration-300">
                    <div class="p-2 space-y-0.5">
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category', 'Semua Kategori') == 'Semua Kategori' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Semua Kategori">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
                            <span class="text-sm font-medium">Semua Kategori</span>
                        </div>
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category') == 'Fiksi' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Fiksi">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                            <span class="text-sm font-medium">Fiksi</span>
                        </div>
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category') == 'Non-Fiksi' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Non-Fiksi">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                            <span class="text-sm font-medium">Non-Fiksi</span>
                        </div>
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category') == 'Teknologi' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Teknologi">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                            <span class="text-sm font-medium">Teknologi</span>
                        </div>
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category') == 'Sains' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Sains">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                            <span class="text-sm font-medium">Sains</span>
                        </div>
                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 transition-colors {{ session('buku_category') == 'Sejarah' ? 'bg-indigo-50 text-indigo-700' : 'text-slate-600' }}" data-value="Sejarah">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                            <span class="text-sm font-medium">Sejarah</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-2 w-full md:w-auto">
                <button type="submit" class="inline-flex items-center px-6 py-3 bg-slate-900 text-white font-semibold rounded-2xl hover:bg-slate-800 transition-all">
                    Cari
                </button>
                @if(session('buku_search') || (session('buku_category') && session('buku_category') != 'Semua Kategori'))
                <a href="{{ route('buku.clear-search') }}" class="inline-flex items-center px-6 py-3 bg-rose-50 text-rose-600 font-semibold rounded-2xl hover:bg-rose-100 transition-all">
                    Reset
                </a>
                @endif
            </div>
        </form>

        <!-- Book Grid -->
        @if($bukus->count() > 0)
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            @foreach($bukus as $buku)
            <div class="group bg-white rounded-[2rem] overflow-hidden border border-slate-100 shadow-sm hover:shadow-xl transition-all duration-500 flex flex-col h-full transform hover:-translate-y-2">
                <div class="relative aspect-[3/4] overflow-hidden">
                    @if($buku->cover)
                        <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->title }}" class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110">
                    @else
                        <div class="w-full h-full bg-slate-100 flex items-center justify-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-slate-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                            </svg>
                        </div>
                    @endif
                    <div class="absolute top-4 right-4">
                        <span class="px-3 py-1 bg-white/90 glass text-indigo-600 text-xs font-bold rounded-full uppercase tracking-wider cursor-default">
                            {{ $buku->category }}
                        </span>
                    </div>
                </div>
                <div class="p-6 flex flex-col flex-1">
                    <div class="mb-4">
                        <p class="text-xs font-medium text-slate-400 mb-1 cursor-default">{{ $buku->author }} • {{ $buku->year }}</p>
                        <h3 class="text-lg font-bold text-slate-900 leading-tight line-clamp-2 group-hover:text-indigo-600 transition-colors cursor-default">{{ $buku->title }}</h3>
                    </div>
                    <p class="text-sm text-slate-500 line-clamp-3 mb-6 flex-1 cursor-default">{{ $buku->description }}</p>
                    
                    <div class="flex items-center justify-between pt-4 border-t border-slate-50">
                        <div class="flex gap-2">
                            <a href="{{ route('buku.edit', $buku) }}" class="p-2 text-slate-400 hover:text-amber-500 hover:bg-amber-50 rounded-xl transition-all">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                </svg>
                            </a>
                            <form action="{{ route('buku.destroy', $buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2 text-slate-400 hover:text-rose-500 hover:bg-rose-50 rounded-xl transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                        <a href="{{ route('buku.show', $buku) }}" class="text-sm font-semibold text-indigo-600 hover:text-indigo-700">Detail →</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        
        <div class="mt-12">
            {{ $bukus->links() }}
        </div>
        @else
        <div class="bg-white rounded-[2rem] p-20 text-center border border-slate-100 shadow-sm">
            <div class="bg-slate-50 w-24 h-24 rounded-full flex items-center justify-center mx-auto mb-6 text-slate-300">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
            </div>
            <h3 class="text-xl font-bold text-slate-900 mb-2">Belum ada koleksi buku</h3>
            <p class="text-slate-500 mb-8">Mulai tambahkan buku pertama Anda ke perpustakaan digital ini.</p>
            <a href="{{ route('buku.create') }}" class="inline-flex items-center px-8 py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-indigo-200 transform hover:-translate-y-1">
                Tambah Buku Pertama
            </a>
        </div>
        @endif
    </div>

    <script src="{{ asset('js/dropdown.js') }}"></script>
</body>
</html>
