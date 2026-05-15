<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $buku->title }} | Detail Data Buku Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="bg-[#f8fafc] text-[#1e293b] min-h-screen py-12">
    <div class="max-w-5xl mx-auto px-4">
        <div class="flex flex-col md:flex-row items-start md:items-center justify-between mb-8 gap-4">
            <a href="{{ route('buku.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-indigo-600 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                </svg>
                Kembali ke Koleksi
            </a>
            
            <div class="flex gap-3">
                <a href="{{ route('buku.edit', $buku) }}" class="inline-flex items-center px-5 py-2.5 bg-amber-50 text-amber-600 font-bold rounded-xl hover:bg-amber-100 transition-all border border-amber-100">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                    </svg>
                    Edit Data
                </a>
                <form action="{{ route('buku.destroy', $buku) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus buku ini?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center px-5 py-2.5 bg-rose-50 text-rose-600 font-bold rounded-xl hover:bg-rose-100 transition-all border border-rose-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                        Hapus
                    </button>
                </form>
            </div>
        </div>

        <div class="bg-white rounded-[3rem] shadow-2xl shadow-slate-200/50 overflow-hidden border border-slate-100">
            <div class="grid grid-cols-1 lg:grid-cols-12">
                <!-- Left: Book Cover -->
                <div class="lg:col-span-5 p-8 lg:p-12 bg-slate-50 flex items-center justify-center">
                    <div class="relative group">
                        <div class="absolute -inset-1 bg-gradient-to-r from-indigo-500 to-purple-600 rounded-[2rem] blur opacity-25 group-hover:opacity-40 transition duration-1000 group-hover:duration-200"></div>
                        <div class="relative bg-white rounded-[2rem] overflow-hidden shadow-2xl">
                            @if($buku->cover)
                                <img src="{{ asset('storage/' . $buku->cover) }}" alt="{{ $buku->title }}" class="w-full h-auto object-cover max-w-[320px]">
                            @else
                                <div class="w-full aspect-[3/4] bg-slate-200 flex items-center justify-center min-w-[300px]">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24 text-slate-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                                    </svg>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

                <!-- Right: Book Details -->
                <div class="lg:col-span-7 p-8 lg:p-12">
                    <div class="mb-8">
                        <span class="px-4 py-1.5 bg-indigo-50 text-indigo-600 text-xs font-black rounded-full uppercase tracking-widest mb-4 inline-block">
                            {{ $buku->category }}
                        </span>
                        <h1 class="text-4xl lg:text-5xl font-black text-slate-900 leading-tight mb-4">{{ $buku->title }}</h1>
                        <div class="flex items-center gap-4 text-slate-500">
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                {{ $buku->author }}
                            </span>
                            <span class="w-1.5 h-1.5 rounded-full bg-slate-300"></span>
                            <span class="flex items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-1.5 text-indigo-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                                {{ $buku->year }}
                            </span>
                        </div>
                    </div>

                    <div class="space-y-8">
                        <div>
                            <h3 class="text-sm font-black text-slate-900 uppercase tracking-widest mb-3 flex items-center">
                                <span class="w-8 h-[2px] bg-indigo-600 mr-3"></span>
                                Sinopsis
                            </h3>
                            <p class="text-lg text-slate-600 leading-relaxed">
                                {{ $buku->description }}
                            </p>
                        </div>

                        <div class="grid grid-cols-2 gap-8 pt-8 border-t border-slate-100">
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">Penerbit</h4>
                                <p class="text-lg font-bold text-slate-800">{{ $buku->publisher }}</p>
                            </div>
                            <div>
                                <h4 class="text-xs font-bold text-slate-400 uppercase tracking-wider mb-1">ID Koleksi</h4>
                                <p class="text-lg font-bold text-slate-800">#Book-{{ str_pad($buku->id, 5, '0', STR_PAD_LEFT) }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
