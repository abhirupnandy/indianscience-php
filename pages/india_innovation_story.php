<?php

$pageTitle = "India's Innovation Story";

$pageDescription =
    'PATHWAYS TO PROGRESS: ANALYSIS AND INSIGHTS INTO INDIA’S INNOVATION STORY';

$breadcrumbs = [
    [
        'label' => 'Home',
        'path' => '',
    ],
    [
        'label' => "India's Innovation Story",
        'path' => null,
    ],
];

$sections = [
    'Executive Summary',
];

$tags = [
    'India Innovation Story',
    'Innovation Ecosystem',
    'Global  Competitiveness',
    'Policy Coordination',
];

?>

<div class="w-full max-w-full">

    <!-- =========================================================
         PAGE HEADER
         ========================================================= -->

    <section
        class="border-b border-gray-200 bg-gray-50
               dark:border-gray-800 dark:bg-gray-900/50">
        <div
            class="mx-auto w-full max-w-7xl px-4 py-10
                   sm:px-6 sm:py-12
                   lg:px-8 lg:py-14">

            <!-- Breadcrumb -->
            <nav
                aria-label="Breadcrumb"
                class="mb-5">
                <ol
                    class="flex flex-wrap items-center gap-x-2 gap-y-1
                           text-sm text-gray-500
                           dark:text-gray-400">

                    <?php foreach ($breadcrumbs as $index => $breadcrumb): ?>

                        <li class="flex items-center gap-2">

                            <?php if ($breadcrumb['path'] !== null): ?>

                                <a
                                    href="<?= url($breadcrumb['path']) ?>"
                                    class="transition hover:text-gray-900
                                           dark:hover:text-white">
                                    <?= e($breadcrumb['label']) ?>
                                </a>

                            <?php else: ?>

                                <span
                                    class="<?= $index ===
                                    count($breadcrumbs) - 1
                                        ? 'font-medium text-gray-900 dark:text-white'
                                        : '' ?>">
                                    <?= e($breadcrumb['label']) ?>
                                </span>

                            <?php endif; ?>


                            <?php if ($index < count($breadcrumbs) - 1): ?>

                                <svg
                                    class="h-4 w-4 shrink-0 text-gray-400"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2">
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="m9 5 7 7-7 7"/>
                                </svg>

                            <?php endif; ?>

                        </li>

                    <?php endforeach; ?>

                </ol>
            </nav>


            <!-- Title -->
            <h1
                class="text-3xl font-bold tracking-tight
                       text-gray-900
                       sm:text-4xl
                       dark:text-white">
                <?= e($pageTitle) ?>
            </h1>


            <!-- Description -->
            <p
                class="mt-4 max-w-4xl text-base leading-7
                       text-gray-600
                       sm:text-lg sm:leading-8
                       dark:text-gray-400">
                <?= e($pageDescription) ?>
            </p>

        </div>
    </section>


    <!-- =========================================================
         MAIN CONTENT + SIDEBAR
         ========================================================= -->

    <section class="w-full">

        <div
            class="mx-auto grid w-full max-w-7xl grid-cols-1
                   gap-10 px-4 py-10
                   sm:px-6 sm:py-12
                   lg:grid-cols-[minmax(0,1fr)_280px]
                   lg:gap-14 lg:px-8 lg:py-14">

            <!-- =================================================
                 MAIN CONTENT
                 ================================================= -->

            <article
                class="min-w-0 max-w-none text-base leading-7
                       text-gray-700
                       dark:text-gray-300">

                <section
                    id="executive-summary"
                    class="scroll-mt-24">
                    <h2
                        class="text-2xl font-bold tracking-tight
                               text-gray-900
                               dark:text-white">
                        Executive Summary
                    </h2>

                    <p class="mt-4 text-justify">
                        Innovation has emerged as one of the most powerful drivers shaping nations in the 21st century,
                        serving not only as a catalyst for economic growth but also as an enabler of social
                        transformation, global competitiveness, and resilience. For India, innovation holds
                        special significance, as it carries the dual potential to propel the country into the
                        ranks of leading knowledge economies while simultaneously addressing longstanding
                        developmental challenges in health, education, agriculture, sustainability, and inclusive
                        growth. Recognising this, NITI Aayog has undertaken this report, Pathways to Progress: A
                        nalysis and Insights into India’s Innovation Story, to provide a comprehensive assessment
                        of India’s innovation journey, benchmark its performance against global peers, evaluate
                        structural strengths and weaknesses, and lay out actionable pathways for the future.

                        <br/>The report begins by establishing the motivation and objectives of this exercise,
                        emphasising the need for a holistic understanding of innovation. Innovation is no longer
                        limited to scientific discovery or technological invention; it encompasses the generation,
                        diffusion, and application of ideas across economic, cultural, and social domains. The report
                        argues that innovation flourishes in ecosystems that combine enabling policies, institutional
                        frameworks, skilled human capital, financial incentives, and collaborative engagement among
                        academia, industry, and government. Accordingly, it defines innovation in a broad sense and
                        examines the variety of models that shape it – from state-led mission programmes and
                        market-driven entrepreneurship to grassroots creativity and frugal innovations that
                        address context-specific challenges. Over the past decade, India’s innovation ecosystem
                        has expanded rapidly, underpinned by strong government initiatives. Mission-mode
                        programmes such as the Atal Innovation Mission, Make in India, Digital India, and
                        Startup India have created nationwide momentum, fostering a culture of experimentation and
                        entrepreneurship. Complementing these, sector-specific initiatives by central ministries and
                        departments have promoted innovation in biotechnology, electronics, space, renewable energy,
                        and other strategic areas. Intermediary organisations and technology boards have bridged
                        research and commercial application, while funding schemes and innovation councils have
                        strengthened academic and research institutions, enabling them to contribute meaningfully
                        to the broader innovation landscape. States have emerged as active players, launching
                        innovation missions, startup policies, and sector-specific incubators, ensuring that
                        innovation extends beyond metropolitan hubs. The private sector and industry associations
                        have also invested significantly in research and development, often establishing collaborative
                        platforms, corporate accelerators, and innovation challenges. India’s grassroots and social
                        innovators remain an integral component, demonstrating frugal, high-impact approaches that
                        cater to local needs. National events such as the India International Science Festival and
                        Startup Mahakumbh have further amplified the visibility and vibrancy of the ecosystem.
                        <br/>India’s global innovation performance reflects steady progress. The country has risen
                        consistently in international benchmarks, such as Global Innovation Index (GII), where India
                        has improved ranking from 81st in 2015 to 38th in 2025. India now hosts the world’s
                        third-largest startup ecosystem, with over a hundred unicorns, and has shown sustained growth
                        in publications, patents, trademarks, and other intellectual property indicators. Leadership
                        in geographical indications and the creative economy highlights India’s rich cultural and
                        knowledge assets. While these trends affirm India’s position as a credible global innovation
                        player, gaps remain in the commercialisation of research, expansion into high-technology
                        exports, and development of deep-tech ventures.
                        <br/>A closer examination of the ecosystem reveals both dynamism and asymmetry.
                        The startup ecosystem thrives as a driver of employment, product development, and
                        market expansion. Inclusive innovation, particularly in frugal and social domains,
                        extends technological solutions to underserved populations. Yet, university-industry
                        government collaboration, essential for translating research into practical outcomes,
                        remains relatively weak compared to international standards. Structural and institutional
                        challenges persist, including fragmentation across ministries and states, skewed funding
                        models, inadequate support for early-stage and deep-tech ventures, regulatory and bureaucratic
                        hurdles, uneven infrastructure, and critical skills gaps in frontier domains such as
                        artificial intelligence, biotechnology, and semiconductors. Weak intellectual property
                        frameworks, limited global integration, and underdeveloped state-level innovation policies
                        further underscore the need for systemic strengthening. Looking forward, the report presents
                        a strategic roadmap to strengthen India’s innovation ecosystem. It advocates scaling
                        successful models across regions, diversifying the role of technology business incubators
                        into robust intermediaries, and prioritising knowledge creation and dissemination through
                        investment in research, development and open science initiatives. Encouraging mobility
                        between academia and industry will enable cross-pollination of ideas and skills, while
                        dedicated funding and infrastructure will support deep technologies. Reforming intellectual
                        property policies to improve protection and commercialisation, establishing science,
                        technology, and innovation intermediary bodies, and creating an overarching coordinating entity
                        will provide coherence to the ecosystem. Strengthening state-level capacities through
                        decentralised funding, shared infrastructure, and targeted training will ensure that innovation
                        is geographically balanced and inclusive.
                        <br/>The report concludes that India’s innovation journey has reached a pivotal moment.
                        The foundations of a vibrant ecosystem are in place, but the next phase must move beyond
                        capacity building to achieving leadership in advanced technologies and inclusive innovation
                        models. The task ahead is to integrate fragmented efforts, deepen collaboration among academia,
                        industry, and government, and embrace bold reforms that align India’s innovation system with
                        global best practices while addressing domestic priorities. By weaving together scale and
                        inclusivity, and frontier science with grassroots ingenuity, India has the potential to emerge
                        as not only a global innovation hub but also a nation where innovation directly enhances
                        societal well-being, economic resilience, and sustainable development.
                    </p>

                </section>

            </article>


            <!-- =================================================
                 RIGHT SIDEBAR
                 ================================================= -->

            <aside
                class="lg:sticky lg:top-24 lg:self-start">

                <div
                    class="overflow-hidden rounded-2xl border
                           border-gray-200 bg-white
                           dark:border-gray-800 dark:bg-gray-900">

                    <!-- On this page -->
                    <div class="p-5">

                        <h3
                            class="text-sm font-semibold uppercase
                                   tracking-wider text-gray-900
                                   dark:text-white">
                            On this page
                        </h3>

                        <nav class="mt-4">

                            <ul class="space-y-1">
                                <?php foreach (
                                    $sections as $index => $section
                                ): ?>
                                    <li>
                                        <a
                                            href="#<?= e(
                                                strtolower(
                                                    preg_replace(
                                                        '/[^a-z0-9]+/i',
                                                        '-',
                                                        $section,
                                                    ),
                                                ),
                                            ) ?>"
                                            class="block rounded-lg px-3 py-2
                                                   text-sm leading-5
                                                   text-gray-600 transition
                                                   hover:bg-gray-100
                                                   hover:text-gray-900
                                                   dark:text-gray-400
                                                   dark:hover:bg-gray-800
                                                   dark:hover:text-white">
                                            <?= e($section) ?>
                                        </a>

                                    </li>

                                <?php endforeach; ?>

                            </ul>

                        </nav>

                    </div>


                    <!-- Divider -->
                    <div
                        class="border-t border-gray-200
                               dark:border-gray-800"></div>


                    <!-- Tags -->
                    <div class="p-5">

                        <h3
                            class="text-sm font-semibold uppercase
                                   tracking-wider text-gray-900
                                   dark:text-white">
                            Tags
                        </h3>

                        <div class="mt-4 flex flex-wrap gap-2">

                            <?php foreach ($tags as $tag): ?>

                                <span
                                    class="rounded-full border
                                           border-gray-200 bg-gray-50
                                           px-3 py-1.5 text-xs font-medium
                                           text-gray-600
                                           dark:border-gray-700
                                           dark:bg-gray-800
                                           dark:text-gray-300">
                                    <?= e($tag) ?>
                                </span>

                            <?php endforeach; ?>

                        </div>

                    </div>



                </div>
                <!-- Citation Report -->
                <div
                        class="border-t border-gray-200 pt-5
           dark:border-gray-800">

                    <h3
                            class="text-sm font-semibold uppercase
               tracking-wider text-gray-900
               dark:text-white">
                        Please cite this report as:
                    </h3>

                    <p class="mt-3 text-xs leading-5 text-gray-600 dark:text-gray-400">
                        Data presented on this page are based on the following report.
                        Select your preferred citation style.
                    </p>

                    <?php
                    $reportUrl = 'https://indianscience.net/data/INDIA%E2%80%99S%20INNOVATION%20STORY.pdf';

                    $citations = [
                            'apa' => 'Saraswat, V. K., Singh, V. K., Bhattacharya, S., Kanaujia, A., Sonkusare, A., Thyagaraju, B. M., Dhamija, A., Chanana, P., Agarwal, T., Kaur, S., Narang, D., & Suroor, N. (2025). *Pathways to progress: Analysis and insights into India’s innovation story*. NITI Aayog.',

                            'mla' => 'Saraswat, V. K., et al. *Pathways to Progress: Analysis and Insights into India’s Innovation Story*. NITI Aayog, 2025.',

                            'harvard' => 'Saraswat, V.K. et al. (2025) *Pathways to Progress: Analysis and Insights into India’s Innovation Story*. New Delhi: NITI Aayog.',

                            'vancouver' => 'Saraswat VK, Singh VK, Bhattacharya S, Kanaujia A, Sonkusare A, Thyagaraju BM, et al. Pathways to Progress: Analysis and Insights into India’s Innovation Story. New Delhi: NITI Aayog; 2025.',

                            'bibtex' => '@techreport{saraswat2025pathways,
  title       = {Pathways to Progress: Analysis and Insights into India’s Innovation Story},
  author      = {Saraswat, V. K. and Singh, Vivek Kumar and Bhattacharya, Sujit and Kanaujia, Anurag and Sonkusare, Ashok and Thyagaraju, B. M. and Dhamija, Akanksha and Chanana, Pratibha and Agarwal, Tusha and Kaur, Simarjot and Narang, Deepak and Suroor, Naba},
  institution = {NITI Aayog},
  address     = {New Delhi, India},
  year        = {2025}
}',
                    ];
                    ?>

                    <div class="mt-4">

                        <label
                                for="report-citation-style"
                                class="mb-2 block text-xs font-medium
                   text-gray-700 dark:text-gray-300">
                            Citation style
                        </label>

                        <select
                                id="report-citation-style"
                                class="w-full rounded-lg border border-gray-300
                   bg-white px-3 py-2.5 text-sm text-gray-900
                   focus:border-amber-500 focus:outline-none
                   focus:ring-1 focus:ring-amber-500
                   dark:border-gray-700 dark:bg-gray-900
                   dark:text-white">

                            <option value="apa">APA 7th edition</option>
                            <option value="mla">MLA 9th edition</option>
                            <option value="harvard">Harvard</option>
                            <option value="vancouver">Vancouver</option>
                            <option value="bibtex">BibTeX</option>

                        </select>

                    </div>

                    <div
                            class="mt-3 rounded-lg border border-gray-200
               bg-gray-50 p-3 dark:border-gray-700
               dark:bg-gray-800/60">

                        <p
                                id="report-citation-text"
                                class="whitespace-pre-wrap break-words
                   text-xs leading-5 text-gray-700
                   dark:text-gray-300"><?= htmlspecialchars($citations['apa'], ENT_QUOTES, 'UTF-8') ?></p>

                    </div>

                    <div class="mt-4 grid grid-cols-1 gap-3 sm:grid-cols-2">

                        <button
                                type="button"
                                id="copy-report-citation"
                                class="inline-flex items-center justify-center gap-2
                   rounded-lg border border-gray-300
                   bg-white px-4 py-2.5 text-sm font-medium
                   text-gray-800 transition hover:bg-gray-100
                   dark:border-gray-700 dark:bg-gray-900
                   dark:text-gray-200 dark:hover:bg-gray-800">

                            <svg
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    aria-hidden="true">
                                <rect x="8" y="8" width="13" height="13" rx="2"/>
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>
                            </svg>

                            <span id="copy-report-citation-label">Copy citation</span>

                        </button>

                        <a
                                href="<?= htmlspecialchars($reportUrl, ENT_QUOTES, 'UTF-8') ?>"
                                target="_blank"
                                rel="noopener noreferrer"
                                class="inline-flex items-center justify-center gap-2
                   rounded-lg bg-gray-900 px-4 py-2.5
                   text-sm font-medium text-white transition
                   hover:bg-gray-700 dark:bg-white
                   dark:text-gray-900 dark:hover:bg-gray-200">

                            <svg
                                    class="h-4 w-4 shrink-0"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                    aria-hidden="true">
                                <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M12 3v12m0 0 4-4m-4 4-4-4M5 21h14"/>
                            </svg>

                            Download Report

                        </a>

                    </div>

                </div>





            </aside>

        </div>

    </section>
</div>
<script>
    (() => {
        const citations = <?= json_encode(
                $citations,
                JSON_HEX_TAG | JSON_HEX_APOS | JSON_HEX_AMP | JSON_HEX_QUOT
        ) ?>;

        const styleSelect = document.getElementById('report-citation-style');
        const citationText = document.getElementById('report-citation-text');
        const copyButton = document.getElementById('copy-report-citation');
        const copyLabel = document.getElementById('copy-report-citation-label');

        if (!styleSelect || !citationText || !copyButton || !copyLabel) {
            return;
        }

        styleSelect.addEventListener('change', () => {
            citationText.textContent = citations[styleSelect.value] || '';
            copyLabel.textContent = 'Copy citation';
        });

        copyButton.addEventListener('click', async () => {
            const text = citations[styleSelect.value] || '';

            try {
                await navigator.clipboard.writeText(text);
                copyLabel.textContent = 'Copied!';
            } catch (error) {
                const textarea = document.createElement('textarea');
                textarea.value = text;
                textarea.style.position = 'fixed';
                textarea.style.opacity = '0';

                document.body.appendChild(textarea);
                textarea.select();

                const copied = document.execCommand('copy');
                textarea.remove();

                copyLabel.textContent = copied
                    ? 'Copied!'
                    : 'Copy failed';
            }

            window.setTimeout(() => {
                copyLabel.textContent = 'Copy citation';
            }, 2000);
        });
    })();
</script>