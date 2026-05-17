<footer class="bg-white dark:bg-slate-900 border-t border-slate-100 dark:border-slate-800 py-8 md:py-12 mt-10 md:mt-20 transition-colors duration-300">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8 md:gap-12 mb-8 md:mb-12 text-center md:text-left">
            <div class="col-span-1 md:col-span-2 flex flex-col items-center md:items-start">
                <a href="{{ route('buku.index') }}" class="flex items-center gap-3 mb-4 md:mb-6">
                    <div class="w-8 h-8 bg-indigo-600 rounded-lg flex items-center justify-center shadow-lg shadow-indigo-200">
                        <img src="{{ asset('images/tabicon.png') }}" alt="Logo" class="w-5 h-5 object-contain brightness-0 invert">
                    </div>
                    <span class="text-xl font-black text-slate-900 dark:text-white tracking-tight">Adyatma<span class="text-indigo-600">Books</span></span>
                </a>
                <p class="text-slate-500 text-sm leading-relaxed max-w-sm cursor-default">
                    Platform manajemen perpustakaan digital modern untuk memudahkan pengelolaan koleksi buku Anda secara efisien dan terorganisir.
                </p>
            </div>
            
            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 md:mb-6 cursor-default">Navigasi</h4>
                <ul class="space-y-3 md:space-y-4">
                    <li><a href="{{ route('buku.index') }}" class="text-slate-500 hover:text-indigo-600 text-sm transition-colors">Beranda</a></li>
                    <li><a href="{{ route('buku.create') }}" class="text-slate-500 hover:text-indigo-600 text-sm transition-colors">Tambah Buku</a></li>
                </ul>
            </div>

            <div class="flex flex-col items-center md:items-start">
                <h4 class="text-sm font-bold text-slate-900 dark:text-white uppercase tracking-widest mb-4 md:mb-6 cursor-default">Kontak</h4>
                <p class="text-slate-500 text-sm mb-4 cursor-default">
                    Jl. S. Supriadi No.22, Sukun, Kec. Sukun<br>
                    Kota Malang, Jawa Timur 65147
                </p>
                <div class="flex gap-4">
                    <a href="https://wa.me/6285259445820" target="_blank" class="w-10 h-10 rounded-full bg-[#25D366]/10 flex items-center justify-center text-[#25D366] hover:bg-[#25D366] hover:text-white transition-all shadow-sm" title="Hubungi via WhatsApp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946.003-6.556 5.338-11.891 11.893-11.891 3.181.001 6.167 1.24 8.413 3.488 2.246 2.248 3.484 5.232 3.484 8.412-.003 6.557-5.338 11.892-11.893 11.892-1.997-.001-3.951-.5-5.688-1.448l-6.309 1.656zm6.29-4.143c1.589.943 3.385 1.44 5.216 1.441h.005c5.676 0 10.294-4.617 10.297-10.293.001-2.752-1.071-5.339-3.016-7.283-1.944-1.945-4.531-3.015-7.284-3.015-5.676 0-10.293 4.617-10.297 10.293-.001 2.016.525 3.985 1.524 5.736l-.16.454-1.066 3.89 3.985-1.047.456-.176zm12.181-5.467c-.329-.165-1.952-.963-2.253-1.073-.301-.11-.52-.165-.74.165-.219.33-.85 1.073-1.041 1.292-.191.219-.383.247-.712.082-.329-.165-1.389-.512-2.645-1.633-.977-.872-1.636-1.948-1.827-2.277-.191-.33-.021-.508.144-.672.148-.147.329-.385.493-.577.165-.192.219-.33.329-.549.11-.22.055-.412-.027-.577-.082-.165-.74-1.785-1.014-2.444-.267-.641-.539-.553-.74-.563l-.63-.011c-.22 0-.576.082-.878.411-.302.33-1.152 1.126-1.152 2.744 0 1.619 1.179 3.184 1.343 3.404.165.22 2.32 3.54 5.62 4.965.785.34 1.397.543 1.874.694.788.25 1.506.215 2.073.129.632-.095 1.952-.797 2.226-1.564.274-.767.274-1.427.192-1.564-.082-.137-.301-.22-.63-.385z"/></svg>
                    </a>
                    <a href="https://www.instagram.com/adyatmagomo/" target="_blank" class="relative w-10 h-10 rounded-full flex items-center justify-center transition-all shadow-sm overflow-hidden group" title="Kunjungi Instagram">
                        <div class="absolute inset-0 bg-gradient-to-tr from-[#f09433] via-[#dc2743] to-[#bc1888] opacity-10 group-hover:opacity-100 transition-opacity duration-300"></div>
                        <svg class="w-5 h-5 relative z-10 text-[#dc2743] group-hover:text-white transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>
                    </a>
                </div>
            </div>
        </div>
        
        <div class="pt-8 border-t border-slate-100 dark:border-slate-800 flex flex-col md:flex-row justify-between items-center gap-4 text-center">
            <p class="text-slate-400 text-xs cursor-default">
                &copy; {{ date('Y') }} AdyatmaBooks. Dikelola oleh <span class="font-bold text-slate-600 dark:text-slate-300">Ceo Adyatma86</span>. Semua hak dilindungi.
            </p>
            <div class="flex flex-wrap justify-center gap-4 md:gap-6">
                <a href="javascript:void(0)" id="syarat-ketentuan" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 text-xs transition-colors">Syarat & Ketentuan</a>
                <a href="javascript:void(0)" id="kebijakan-privasi" class="text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 text-xs transition-colors">Kebijakan Privasi</a>
            </div>
        </div>
    </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

