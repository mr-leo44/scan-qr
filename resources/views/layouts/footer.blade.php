    <div class="bg-footer py-4">
        <p class="px-8 text-white text-lg uppercase font-bold mt-10">contenu</p>
        <div class="px-8 text-white font-bold text-lg mt-8 flex flex-col">
            <a href="https://www.schoolap.com/lecons" class="my-1">Leçons</a>
            <a href="https://www.schoolap.com/exetats" class="my-1"> Item-Exetat</a>
            <a href="https://www.schoolap.com/fiches" class="my-1">Fiche</a>
        </div>
        @php
            use Carbon\Carbon;
        @endphp
        <div class="mt-28 py-3 text-center text-white">©{{ Carbon::now()->year }} | Tous droits reservés.</div>

    </div>
    </body>

    </html>
