</main>

<footer
    class="w-full border-t border-gray-200 bg-white
           dark:border-gray-800 dark:bg-gray-950"
>
    <div class="w-full max-w-full px-4 py-8 sm:px-6 lg:px-8">

        <!-- Footer content -->
        <div
            class="flex flex-col gap-6
                   lg:flex-row lg:items-center lg:justify-between"
        >

            <!-- Footer links -->
            <nav
                aria-label="Footer navigation"
                class="flex flex-wrap items-center justify-center
                       gap-x-6 gap-y-3 lg:justify-start"
            >

                <a
                    href="<?= url('about') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    About
                </a>

                <a
                    href="<?= url('team') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Contributors
                </a>

                <a
                    href="<?= url('methodology') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Data &amp; Methodology
                </a>

                <a
                    href="<?= url('institutions') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Institutional Reports
                </a>

                <a
                    href="<?= url('publications') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Related Publications
                </a>

                <a
                    href="<?= url('terms') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Terms of Use
                </a>

                <a
                    href="<?= url('blog') ?>"
                    class="text-sm text-gray-600 transition
                           hover:text-gray-900
                           dark:text-gray-400
                           dark:hover:text-white"
                >
                    Blog
                </a>

            </nav>


            <!-- Copyright -->
            <p
                class="shrink-0 text-center text-sm text-gray-500
                       lg:text-right
                       dark:text-gray-500"
            >
                &copy; <?= date('Y') ?> Indian Science Reports.
            </p>

        </div>

    </div>
</footer>

</body>
</html>