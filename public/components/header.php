<header class="<?php echo $color ?? 'bg-blue-500' ?> py-4 px-8 flex justify-center w-screen">
    <div class="container mx-0 md:mx-auto flex justify-between items-center z-[99]">
        <a href="/">
            <h1 class="text-3xl font-bold text-white font-belanosima">
                Elezione
            </h1>
        </a>
        <nav class="flex items-center">
            <button onclick="menuSettings(event)" id="menu-btn" class="z-50">
                <span class="material-symbols-outlined text-white md:hidden">
                    menu
                </span>
            </button>

            <!-- header link area -->
            <div id="menu" class="fixed md:items-center -right-80 top-0 flex h-screen flex-col bg-slate-600 pe-4 ps-3 pt-10 duration-300 shadow-md shadow-slate-500 md:shadow-none md:relative md:right-0 md:h-auto md:flex-row md:bg-transparent md:pt-0">
                <a href="/" class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-300 md:my-0 md:w-auto">Home</a>

                <a href="/#pricing" class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-300 md:my-0 md:w-auto">Pricing</a>

                <a href="/about" class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-300 md:my-0 md:w-auto">About</a>

                <a href="/contact" class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-300 md:my-0 md:w-auto">Contact</a>

                <a href="/faq" class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-300 md:my-0 md:w-auto">FAQ</a>

                <a href="/login" class="md:mx-2 ms-5 px-2 my-2 py-2 md:py-1 w-60 rounded-sm font-semibold hover:bg-sky-950 duration-200 ease-in text-center text-sky-500 md:my-0 md:w-auto bg-white">Login</a>
            </div>
        </nav>
    </div>
</header>