<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku | {{ $buku->title }}</title>
    <link rel="icon" type="image/png" href="{{ asset('images/tabicon.png') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="{{ asset('js/theme-init.js') }}"></script>


    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="bg-[#f8fafc] text-[#1e293b] dark:bg-slate-900 dark:text-slate-100 min-h-screen flex flex-col transition-colors duration-300">

    <x-navbar />
    <div class="py-12">

    <div class="max-w-3xl mx-auto px-4">
        <a href="{{ route('buku.index') }}" class="inline-flex items-center text-sm font-semibold text-slate-500 hover:text-indigo-600 mb-8 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
            </svg>
            Kembali ke Daftar
        </a>

        <div class="bg-white dark:bg-slate-800 rounded-[2.5rem] shadow-xl shadow-slate-200/50 overflow-hidden border border-slate-100 dark:border-slate-700">

            <div class="p-8 sm:p-12">
                <div class="mb-10">
                    <h1 class="text-3xl font-bold text-slate-900 dark:text-white mb-2 cursor-default">Manajemen Data Buku Digital</h1>

                    <p class="text-slate-500 cursor-default">Perbarui informasi buku <span class="font-bold text-indigo-600">"{{ $buku->title }}"</span>.</p>
                </div>

                <form action="{{ route('buku.update', $buku) }}" method="POST" enctype="multipart/form-data" class="space-y-8" novalidate>
                    @csrf
                    @method('PUT')
                    
                    @if($errors->any())
                    <div class="p-4 bg-rose-50 border border-rose-100 rounded-2xl">
                        <div class="flex">
                            <svg class="h-5 w-5 text-rose-400 mr-3" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd" />
                            </svg>
                            <div>
                                <h3 class="text-sm font-bold text-rose-800">Terdapat kesalahan pada input Anda:</h3>
                                <ul class="mt-1 text-sm text-rose-700 list-disc list-inside">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endif
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <!-- Judul -->
                        <div class="col-span-full">
                            <label for="title" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Judul Buku</label>

                            <input type="text" name="title" id="title" value="{{ old('title', $buku->title) }}" required
                                class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-900/50 dark:text-white border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all placeholder:text-slate-400 @error('title') ring-2 ring-rose-500 @enderror"

                                placeholder="Masukkan judul lengkap buku">
                            @error('title') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Penulis -->
                        <div>
                            <label for="author" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Penulis</label>

                            <input type="text" name="author" id="author" value="{{ old('author', $buku->author) }}" required
                                class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-900/50 dark:text-white border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all @error('author') ring-2 ring-rose-500 @enderror"

                                placeholder="Nama penulis">
                            @error('author') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Penerbit -->
                        <div>
                            <label for="publisher" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Penerbit</label>

                            <input type="text" name="publisher" id="publisher" value="{{ old('publisher', $buku->publisher) }}" required
                                class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-900/50 dark:text-white border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all @error('publisher') ring-2 ring-rose-500 @enderror"

                                placeholder="Nama penerbit">
                            @error('publisher') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Tahun Terbit -->
                        <div>
                            <label for="year" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Tahun Terbit</label>

                            <input type="number" name="year" id="year" value="{{ old('year', $buku->year) }}" required
                                class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-900/50 dark:text-white border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all @error('year') ring-2 ring-rose-500 @enderror"

                                placeholder="Contoh: 2024">
                            @error('year') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>

                        <!-- Kategori -->
                        <div>
                            <label for="category" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Kategori</label>

                            <div class="relative custom-dropdown">
                                <input type="hidden" name="category" class="dropdown-input" value="{{ old('category', $buku->category) }}" required>
                                <button type="button" class="dropdown-btn flex items-center justify-between gap-3 bg-slate-50 dark:bg-slate-900/50 rounded-2xl py-4 px-5 focus:ring-2 focus:ring-indigo-500 transition-all text-slate-700 dark:text-slate-300 cursor-pointer w-full @error('category') ring-2 ring-rose-500 @enderror hover:bg-slate-100 dark:hover:bg-slate-900">

                                    <div class="flex items-center gap-2">
                                        <span class="dropdown-text font-semibold text-sm">{{ old('category', $buku->category) ?: 'Pilih Kategori' }}</span>
                                    </div>
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-slate-400 transition-transform duration-300 dropdown-chevron" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu absolute top-full left-0 right-0 mt-2 bg-white dark:bg-slate-800 rounded-2xl shadow-2xl border border-slate-100 dark:border-slate-700 overflow-hidden z-50 hidden opacity-0 translate-y-2 transition-all duration-300">

                                    <div class="p-2 space-y-0.5">
                                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors {{ old('category', $buku->category) == 'Fiksi' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300' : 'text-slate-600 dark:text-slate-400' }}" data-value="Fiksi">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-purple-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                                            <span class="text-sm font-medium">Fiksi</span>
                                        </div>
                                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors {{ old('category', $buku->category) == 'Non-Fiksi' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300' : 'text-slate-600 dark:text-slate-400' }}" data-value="Non-Fiksi">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>
                                            <span class="text-sm font-medium">Non-Fiksi</span>
                                        </div>
                                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors {{ old('category', $buku->category) == 'Teknologi' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300' : 'text-slate-600 dark:text-slate-400' }}" data-value="Teknologi">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                                            <span class="text-sm font-medium">Teknologi</span>
                                        </div>
                                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors {{ old('category', $buku->category) == 'Sains' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300' : 'text-slate-600 dark:text-slate-400' }}" data-value="Sains">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" /></svg>
                                            <span class="text-sm font-medium">Sains</span>
                                        </div>
                                        <div class="dropdown-item flex items-center gap-3 px-4 py-2.5 rounded-xl cursor-pointer hover:bg-indigo-50 dark:hover:bg-indigo-900/30 transition-colors {{ old('category', $buku->category) == 'Sejarah' ? 'bg-indigo-50 text-indigo-700 dark:bg-indigo-900/50 dark:text-indigo-300' : 'text-slate-600 dark:text-slate-400' }}" data-value="Sejarah">

                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-rose-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                                            <span class="text-sm font-medium">Sejarah</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @error('category') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <!-- Deskripsi -->
                    <div>
                        <label for="description" class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Deskripsi / Sinopsis</label>

                        <textarea name="description" id="description" rows="5" required
                            class="w-full px-5 py-4 bg-slate-50 dark:bg-slate-900/50 dark:text-white border-none rounded-2xl focus:ring-2 focus:ring-indigo-500 transition-all resize-none @error('description') ring-2 ring-rose-500 @enderror"
                            placeholder="Tuliskan ringkasan isi buku...">{{ old('description', $buku->description) }}</textarea>

                        @error('description') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>

                    <!-- Sampul Buku -->
                    <div>
                        <label class="block text-sm font-bold text-slate-700 dark:text-slate-300 mb-2">Sampul Buku</label>

                        <div class="mt-2 flex justify-center px-6 pt-5 pb-6 border-2 border-slate-100 dark:border-slate-700 border-dashed rounded-3xl bg-slate-50/50 dark:bg-slate-900/50 hover:bg-slate-50 dark:hover:bg-slate-900 transition-colors group">

                            <div class="space-y-1 text-center">
                                <svg class="mx-auto h-12 w-12 text-slate-300 group-hover:text-indigo-400 transition-colors" stroke="currentColor" fill="none" viewBox="0 0 48 48" aria-hidden="true">
                                    <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="flex text-sm text-slate-600">
                                    <label for="cover" class="relative cursor-pointer bg-transparent rounded-md font-bold text-indigo-600 hover:text-indigo-500 focus-within:outline-none transition-colors">
                                        <span>Unggah file baru</span>
                                        <input id="cover" name="cover" type="file" class="sr-only" accept="image/*" onchange="previewImage(event)">
                                    </label>
                                    <p class="pl-1">atau seret dan lepas</p>
                                </div>
                                <p class="text-xs text-slate-400">PNG, JPG, GIF hingga 2MB (Biarkan kosong jika tidak ingin mengubah)</p>
                            </div>
                        </div>
                        
                        <div class="mt-4 flex gap-8">
                            @if($buku->cover)
                            <div>
                                <p class="text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Sampul Saat Ini:</p>
                                <img src="{{ asset('storage/' . $buku->cover) }}" alt="Sampul Saat Ini" class="w-32 h-auto rounded-xl shadow-md border border-slate-200">
                            </div>
                            @endif
                            
                            <div id="image-preview-container" class="hidden">
                                <p class="text-xs font-bold text-slate-500 mb-2 uppercase tracking-wider">Pratinjau Baru:</p>
                                <img id="image-preview" src="#" alt="Pratinjau" class="w-32 h-auto rounded-xl shadow-md border border-slate-200">
                            </div>
                        </div>
                        @error('cover') <p class="mt-2 text-sm text-rose-500">{{ $message }}</p> @enderror
                    </div>

                    <div class="pt-6">
                        <button type="submit" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl transition-all shadow-lg shadow-indigo-100 transform hover:-translate-y-1 cursor-pointer">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    </div> <!-- End py-12 -->

    <div class="mt-auto">
        <x-footer />
    </div>

    <script src="{{ asset('js/preview.js') }}"></script>

    <script src="{{ asset('js/dropdown.js') }}"></script>
</body>
</html>
