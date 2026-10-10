<?php
$defaultSlides = [
    [
        'image' => url('assets/img/inst/anna.jpg'),
        'eyebrow' => 'Featured Institution',
        'title' => 'Anna University, Chennai',
        'description' => 'Explore the research contributions and academic activities of Anna University, Chennai.',
        'source' => 'timesofindia.indiatimes.com',
    ],
    [
        'image' => url('assets/img/inst/aiims.jpg'),
        'eyebrow' => 'Medical Research',
        'title' => 'All India Institute of Medical Sciences, Delhi',
        'description' => 'Explore the research contributions and academic activities of AIIMS, Delhi.',
        'source' => 'aiims.edu',
    ],
    [
        'image' => url('assets/img/inst/iisc.jpg'),
        'eyebrow' => 'Scientific Research',
        'title' => 'Indian Institute of Science, Bangalore',
        'description' => 'Explore the research contributions and academic activities of the Indian Institute of Science, Bangalore.',
        'source' => 'iisc.ac.in',
    ],
    [
        'image' => url('assets/img/inst/iitkgp.jpg'),
        'eyebrow' => 'Engineering & Technology',
        'title' => 'Indian Institute of Technology Kharagpur',
        'description' => 'Explore the research contributions and academic activities of IIT Kharagpur.',
        'source' => 'iitkgp.wikia.com',
    ],
    [
        'image' => url('assets/img/inst/iitbom.jpg'),
        'eyebrow' => 'Engineering & Technology',
        'title' => 'Indian Institute of Technology Bombay',
        'description' => 'Explore the research contributions and academic activities of IIT Bombay.',
        'source' => 'newsd.in',
    ],
    [
        'image' => url('assets/img/inst/iitmad.jpg'),
        'eyebrow' => 'Engineering & Technology',
        'title' => 'Indian Institute of Technology Madras',
        'description' => 'Explore the research contributions and academic activities of IIT Madras.',
        'source' => 'duexpress.in',
    ],
    [
        'image' => url('assets/img/inst/iitdel.jpg'),
        'eyebrow' => 'Engineering & Technology',
        'title' => 'Indian Institute of Technology Delhi',
        'description' => 'Explore the research contributions and academic activities of IIT Delhi.',
        'source' => 'hindustantimes.com',
    ],
    [
        'image' => url('assets/img/inst/univdel.jpg'),
        'eyebrow' => 'Higher Education',
        'title' => 'University of Delhi',
        'description' => 'Explore the research contributions and academic activities of the University of Delhi.',
        'source' => 'dnaindia.com',
    ],
    [
        'image' => url('assets/img/inst/barc.jpg'),
        'eyebrow' => 'Atomic Research',
        'title' => 'Bhabha Atomic Research Centre, Mumbai',
        'description' => 'Explore the research contributions and scientific activities of Bhabha Atomic Research Centre, Mumbai.',
        'source' => 'indianexpress.com',
    ],
    [
        'image' => url('assets/img/inst/pgimer.jpg'),
        'eyebrow' => 'Medical Research',
        'title' => 'Post Graduate Institute of Medical Education and Research',
        'description' => 'Explore the research contributions and academic activities of PGIMER.',
        'source' => 'mykrisndtkp.com',
    ],
    [
        'image' => url('assets/img/inst/bhu.jpg'),
        'eyebrow' => 'Featured Institution',
        'title' => 'Banaras Hindu University',
        'description' => 'Explore the research contributions and academic activities of Banaras Hindu University.',
        'source' => 'news.careers360.com',
    ],
];

$slides = $slides ?? $defaultSlides;
?>

<section
    class="group relative mx-auto w-full max-w-6xl overflow-hidden rounded-2xl border border-slate-200 bg-slate-900 shadow-xl shadow-slate-950/10 dark:border-slate-800 dark:shadow-black/30 sm:rounded-3xl"
    data-carousel
    aria-roledescription="carousel"
    aria-label="Featured research">

    <!-- =========================================================
         SLIDES
    ========================================================== -->

    <div class="relative h-[420px] overflow-hidden sm:h-[460px] lg:h-[520px]">

        <?php foreach ($slides as $index => $slide) { ?>

            <article
                class="absolute inset-0 transition-opacity duration-700 ease-in-out <?= $index === 0 ? 'opacity-100' : 'pointer-events-none opacity-0' ?>"
                data-slide="<?= $index ?>"
                aria-roledescription="slide"
                aria-label="Slide <?= $index + 1 ?> of <?= count($slides) ?>"
                aria-hidden="<?= $index === 0 ? 'false' : 'true' ?>">

                <!-- Image -->

                <img
                    src="<?= e($slide['image'] ?? '') ?>"
                    alt="<?= e($slide['title'] ?? 'Featured research') ?>"
                    class="h-full w-full object-cover"
                    <?= $index === 0 ? 'fetchpriority="high"' : 'loading="lazy"' ?>>


                <!-- Image overlay -->

                <div
                    class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/55 to-slate-950/10"
                    aria-hidden="true"></div>

                <div
                    class="absolute inset-0 bg-gradient-to-r from-slate-950/45 via-transparent to-transparent"
                    aria-hidden="true"></div>


                <!-- Content -->

                <div class="absolute inset-x-0 bottom-0">

                    <div class="max-w-4xl px-5 pb-24 pt-12 sm:px-8 sm:pb-28 lg:px-12">

                        <?php if (! empty($slide['eyebrow'])) { ?>

                            <div class="mb-4 flex items-center gap-3">

                                <span class="h-px w-8 bg-indigo-400"></span>

                                <p class="text-[11px] font-semibold uppercase tracking-[0.22em] text-indigo-300 sm:text-xs">
                                    <?= e($slide['eyebrow']) ?>
                                </p>

                            </div>

                        <?php } ?>


                        <?php if (! empty($slide['title'])) { ?>

                            <h2 class="max-w-3xl text-2xl font-bold leading-tight tracking-tight text-white sm:text-3xl lg:text-4xl xl:text-[42px]">
                                <?= e($slide['title']) ?>
                            </h2>

                        <?php } ?>


                        <?php if (! empty($slide['description'])) { ?>

                            <p class="mt-4 max-w-2xl text-sm leading-6 text-slate-200 sm:text-base sm:leading-7">
                                <?= e($slide['description']) ?>
                            </p>

                        <?php } ?>


                        <?php if (! empty($slide['source'])) { ?>

                            <div class="mt-5 flex items-center gap-2 text-xs text-slate-300">

                                <svg
                                    class="h-3.5 w-3.5 text-slate-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="1.8"
                                    aria-hidden="true">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M13 16h-1v-4h-1m1-8a9 9 0 100 18 9 9 0 000-18z" />
                                </svg>

                                <span>
                                    Source: <?= e($slide['source']) ?>
                                </span>

                            </div>

                        <?php } ?>

                    </div>

                </div>

            </article>

        <?php } ?>

    </div>


    <!-- =========================================================
         CONTROLS
    ========================================================== -->

    <div class="absolute inset-x-0 bottom-0 z-20">

        <div class="flex items-center justify-between gap-4 bg-gradient-to-t from-slate-950/90 to-transparent px-5 pb-5 pt-12 sm:px-8">

            <!-- Previous / Next -->

            <div class="flex items-center gap-2">

                <button
                    type="button"
                    class="carousel-btn-prev flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white backdrop-blur-md transition hover:border-white/40 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/60"
                    aria-label="Previous slide">
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m15 18-6-6 6-6" />
                    </svg>
                </button>


                <button
                    type="button"
                    class="carousel-btn-next flex h-10 w-10 items-center justify-center rounded-full border border-white/20 bg-white/10 text-white backdrop-blur-md transition hover:border-white/40 hover:bg-white/20 focus:outline-none focus:ring-2 focus:ring-white/60"
                    aria-label="Next slide">
                    <svg
                        class="h-4 w-4"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="m9 18 6-6-6-6" />
                    </svg>
                </button>

            </div>


            <!-- Dots -->

            <div
                class="carousel-dots flex items-center gap-1.5 rounded-full border border-white/10 bg-black/20 px-3 py-2 backdrop-blur-md"
                role="tablist"
                aria-label="Carousel navigation">

                <?php foreach ($slides as $index => $slide) { ?>

                    <button
                        type="button"
                        class="carousel-dot h-1.5 rounded-full transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-white/70 focus:ring-offset-2 focus:ring-offset-transparent <?= $index === 0 ? 'w-7 bg-white' : 'w-1.5 bg-white/40 hover:bg-white/70' ?>"
                        data-target="<?= $index ?>"
                        role="tab"
                        aria-label="Go to slide <?= $index + 1 ?>"
                        aria-selected="<?= $index === 0 ? 'true' : 'false' ?>"></button>

                <?php } ?>

            </div>

        </div>

    </div>


    <!-- Progress -->

    <div
        class="carousel-progress absolute bottom-0 left-0 z-30 h-0.5 bg-indigo-400 transition-all duration-100 ease-linear"
        style="width: 0%"
        aria-hidden="true"></div>

</section>


<script>
    (function() {

        const root = document.currentScript.previousElementSibling;

        if (!root) {
            return;
        }

        const slides = root.querySelectorAll('[data-slide]');
        const dots = root.querySelectorAll('.carousel-dot');
        const prevBtn = root.querySelector('.carousel-btn-prev');
        const nextBtn = root.querySelector('.carousel-btn-next');
        const progress = root.querySelector('.carousel-progress');

        if (!slides.length) {
            return;
        }

        let current = 0;
        let timer = null;
        let progressTimer = null;

        const interval = 6000;
        const progressInterval = 50;

        let elapsed = 0;
        let paused = false;


        function updateProgress() {

            if (!progress) {
                return;
            }

            progress.style.width = `${Math.min((elapsed / interval) * 100, 100)}%`;
        }


        function resetProgress() {

            elapsed = 0;

            if (progress) {
                progress.style.width = '0%';
            }
        }


        function startProgress() {

            clearInterval(progressTimer);

            progressTimer = setInterval(() => {

                if (paused) {
                    return;
                }

                elapsed += progressInterval;

                if (elapsed >= interval) {
                    elapsed = interval;
                }

                updateProgress();

            }, progressInterval);
        }


        function stopAutoPlay() {

            clearInterval(timer);
            timer = null;
        }


        function startAutoPlay() {

            stopAutoPlay();

            timer = setInterval(() => {

                if (!paused) {
                    showSlide(current + 1);
                }

            }, interval);
        }


        function showSlide(index) {

            current = (index + slides.length) % slides.length;

            slides.forEach((slide, i) => {

                const active = i === current;

                slide.classList.toggle('opacity-100', active);
                slide.classList.toggle('opacity-0', !active);
                slide.classList.toggle('pointer-events-none', !active);

                slide.setAttribute(
                    'aria-hidden',
                    String(!active)
                );

            });


            dots.forEach((dot, i) => {

                const active = i === current;

                dot.classList.toggle('w-7', active);
                dot.classList.toggle('w-1.5', !active);

                dot.classList.toggle('bg-white', active);
                dot.classList.toggle('bg-white/40', !active);

                dot.setAttribute(
                    'aria-selected',
                    String(active)
                );

            });


            resetProgress();
        }


        function nextSlide() {

            showSlide(current + 1);
            startAutoPlay();

        }


        function previousSlide() {

            showSlide(current - 1);
            startAutoPlay();

        }


        prevBtn?.addEventListener('click', previousSlide);

        nextBtn?.addEventListener('click', nextSlide);


        dots.forEach((dot) => {

            dot.addEventListener('click', () => {

                showSlide(
                    Number(dot.dataset.target)
                );

                startAutoPlay();

            });

        });


        /*
         * Pause while the user is interacting with
         * the carousel.
         */

        root.addEventListener('mouseenter', () => {
            paused = true;
        });

        root.addEventListener('mouseleave', () => {
            paused = false;
        });


        root.addEventListener('focusin', () => {
            paused = true;
        });

        root.addEventListener('focusout', () => {
            paused = false;
        });


        /*
         * Keyboard navigation.
         */

        root.addEventListener('keydown', (event) => {

            if (event.key === 'ArrowLeft') {

                event.preventDefault();
                previousSlide();

            }

            if (event.key === 'ArrowRight') {

                event.preventDefault();
                nextSlide();

            }

        });


        /*
         * Respect reduced-motion preferences.
         */

        const reducedMotion = window.matchMedia(
            '(prefers-reduced-motion: reduce)'
        ).matches;

        if (reducedMotion) {

            slides.forEach((slide) => {
                slide.classList.remove(
                    'transition-opacity',
                    'duration-700'
                );
            });

        }


        /*
         * Start carousel.
         */

        startProgress();

        if (!reducedMotion) {
            startAutoPlay();
        }


        /*
         * Pause when browser tab is hidden.
         */

        document.addEventListener('visibilitychange', () => {

            if (document.hidden) {

                paused = true;
                stopAutoPlay();

            } else {

                paused = false;
                startAutoPlay();

            }

        });

    })();
</script>