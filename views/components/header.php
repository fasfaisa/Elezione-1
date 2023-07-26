<header class= "<?php echo $color ?? 'bg-blue-500' ?> py-4 px-8 flex justify-center">
    <div class="container mx-0 md:mx-auto flex justify-between items-center">
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
            <div
                id="menu"
                class="fixed -right-80 top-0 z-40 flex h-screen flex-col bg-blue-400 pe-4 ps-3 pt-10 duration-300 shadow-md shadow-slate-500 md:shadow-none md:relative md:right-0 md:h-auto md:flex-row md:bg-transparent md:pt-0"
            >
                <a
                    href="/"
                    class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-200 md:my-0 md:w-auto"
                >Home</a
                >

                <a
                    href="/#pricing"
                    class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-200 md:my-0 md:w-auto"
                >Pricing</a
                >

                <a
                    href="/about"
                    class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-200 md:my-0 md:w-auto"
                >About</a
                >

                <a
                    href="/contact"
                    class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-200 md:my-0 md:w-auto"
                >Contact</a
                >

                <a
                    href="/faq"
                    class="mx-4 my-3 w-60 font-semibold text-white hover:text-amber-200 md:my-0 md:w-auto"
                >FAQ</a
                >
            </div>
        </nav>
    </div>
</header>