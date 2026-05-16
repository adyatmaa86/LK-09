<nav class="sticky top-0 z-50 bg-white/80 dark:bg-slate-900/80 backdrop-blur-md border-b border-slate-100 dark:border-slate-800 transition-colors duration-300">

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex items-center">
                <a href="{{ route('buku.index') }}" class="flex items-center gap-3 group transition-all">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center shadow-lg shadow-indigo-200 group-hover:scale-110 transition-transform duration-300">
                        <img src="{{ asset('images/tabicon.png') }}" alt="Logo" class="w-6 h-6 object-contain brightness-0 invert">
                    </div>
                    <span class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Adyatma<span class="text-indigo-600">Books</span></span>
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="{{ route('buku.index') }}" class="text-sm font-bold {{ request()->routeIs('buku.index') ? 'text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400' }} transition-colors">Beranda</a>
                <a href="{{ route('buku.create') }}" class="text-sm font-bold {{ request()->routeIs('buku.create') ? 'text-indigo-600' : 'text-slate-600 dark:text-slate-400 hover:text-indigo-600 dark:hover:text-indigo-400' }} transition-colors">Tambah Koleksi</a>
                <div class="h-8 w-[1px] bg-slate-100 dark:bg-slate-800"></div>

                <div class="flex items-center gap-3 pl-2">
                    <button type="button" class="theme-toggle-btn w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all duration-300 cursor-pointer">
                        <!-- Dark icon -->
                        <svg class="theme-toggle-dark-icon hidden h-5 w-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <!-- Light icon -->
                        <svg class="theme-toggle-light-icon hidden h-5 w-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                    <span class="text-sm font-bold text-slate-700 dark:text-slate-300 cursor-default">Ceo Adyatma86</span>
                </div>

            </div>


            <!-- Mobile menu button -->
            <div class="md:hidden flex items-center">
                <button id="mobile-menu-button" type="button" class="p-2 rounded-xl bg-slate-50 dark:bg-slate-800 text-slate-600 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 transition-colors">
                    <svg id="hamburger-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden border-t border-slate-100 dark:border-slate-800 bg-white/95 dark:bg-slate-900/95 backdrop-blur-md transition-all duration-300">
        <div class="px-4 pt-4 pb-6 space-y-2">
            <a href="{{ route('buku.index') }}" class="block px-4 py-3 rounded-xl text-base font-bold {{ request()->routeIs('buku.index') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800' }}">Beranda</a>
            <a href="{{ route('buku.create') }}" class="block px-4 py-3 rounded-xl text-base font-bold {{ request()->routeIs('buku.create') ? 'bg-indigo-50 text-indigo-600 dark:bg-indigo-900/30' : 'text-slate-600 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800' }}">Tambah Koleksi</a>
            
            <div class="pt-4 mt-4 border-t border-slate-100 dark:border-slate-800">
                <div class="flex items-center justify-between px-4 py-2">
                    <div class="flex flex-col">
                        <span class="text-xs font-medium text-slate-400 uppercase tracking-wider">Pemilik</span>
                        <span class="text-sm font-bold text-slate-700 dark:text-slate-300">Ceo Adyatma86</span>
                    </div>
                    <button type="button" class="theme-toggle-btn w-10 h-10 rounded-xl bg-slate-100 dark:bg-slate-800 flex items-center justify-center border border-slate-200 dark:border-slate-700 hover:bg-slate-200 dark:hover:bg-slate-700 transition-all duration-300">
                        <svg class="theme-toggle-dark-icon hidden h-5 w-5 text-slate-500 dark:text-slate-400" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                        </svg>
                        <svg class="theme-toggle-light-icon hidden h-5 w-5 text-amber-500" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</nav>
