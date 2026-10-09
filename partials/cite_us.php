<div
    class="mx-auto mt-6 max-w-7xl rounded-xl border
           border-blue-200 bg-blue-50 px-5 py-5
           text-sm leading-relaxed text-gray-700 shadow-sm
           dark:border-blue-900/50 dark:bg-blue-950/30
           dark:text-gray-300">

    <div class="flex gap-3">

        <!-- Citation icon -->
        <div
            class="mt-0.5 flex h-9 w-9 shrink-0 items-center
                   justify-center rounded-xl bg-blue-100
                   text-blue-600 dark:bg-blue-900/60
                   dark:text-blue-400">

            <svg
                xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="1.7"
                class="h-5 w-5"
                aria-hidden="true">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M8 5H6a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-2M8 5a2 2 0 0 0 2 2h4a2 2 0 0 0 2-2M8 5a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2m-5 9h7m-7 4h7m-7-8h2m3-2 3-3m0 0h-3m3 0v3"/>
            </svg>

        </div>

        <div class="min-w-0 flex-1">

            <!-- Heading -->
            <h3
                class="font-semibold text-blue-900
                       dark:text-blue-300">
                Cite Indian Science Reports
            </h3>

            <p class="mt-1">
                If you use data or indicators from this portal in your
                research, please cite the following publication.
            </p>

            <!-- Citation style selector -->
            <div
                class="mt-4 flex flex-col gap-3
                       sm:flex-row sm:items-center sm:justify-between">

                <label
                    for="isr-citation-style"
                    class="text-xs font-semibold uppercase
                           tracking-wider text-gray-600
                           dark:text-gray-400">
                    Citation style
                </label>

                <select
                    id="isr-citation-style"
                    class="w-full rounded-lg border border-blue-200
                           bg-white px-3 py-2 text-sm text-gray-800
                           outline-none transition
                           focus:border-blue-500 focus:ring-2
                           focus:ring-blue-500/20
                           dark:border-blue-900 dark:bg-gray-900
                           dark:text-gray-200 sm:max-w-52">

                    <option value="apa">APA 7th edition</option>
                    <option value="harvard">Harvard</option>
                    <option value="vancouver">Vancouver</option>
                    <option value="bibtex">BibTeX</option>

                </select>

            </div>

            <!-- Citation output -->
            <div
                class="mt-3 rounded-lg border border-blue-200/80
                       bg-white/80 p-4 dark:border-blue-900/60
                       dark:bg-gray-900/60">

                <p
                    id="isr-citation-output"
                    class="whitespace-pre-wrap break-words text-sm
                           leading-7 text-gray-700
                           dark:text-gray-300"
                    aria-live="polite">Singh, V. K., Nandy, A., Singh, P., et al. (2022). Indian Science Reports: A web-based scientometric portal for mapping Indian research competencies at overall and institutional levels. Scientometrics. https://doi.org/10.1007/s11192-022-04395-6</p>

            </div>

            <!-- Actions -->
            <div
                class="mt-3 flex flex-wrap items-center gap-3">

                <button
                    type="button"
                    id="isr-copy-citation"
                    class="inline-flex items-center gap-2 rounded-lg
                           bg-blue-700 px-4 py-2 text-sm font-semibold
                           text-white transition hover:bg-blue-800
                           focus-visible:outline-none
                           focus-visible:ring-2
                           focus-visible:ring-blue-500
                           focus-visible:ring-offset-2
                           dark:focus-visible:ring-offset-gray-950">

                    <svg
                        id="isr-copy-icon"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="h-4 w-4"
                        aria-hidden="true">
                        <rect
                            width="14"
                            height="14"
                            x="8"
                            y="8"
                            rx="2"/>
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 8V5a2 2 0 0 0-2-2H5a2 2 0 0 0-2 2v9a2 2 0 0 0 2 2h3"/>
                    </svg>

                    <span id="isr-copy-label">Copy citation</span>

                </button>

                <a
                    href="https://doi.org/10.1007/s11192-022-04395-6"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="inline-flex items-center gap-1.5
                           px-2 py-2 text-sm font-semibold
                           text-blue-700 transition hover:text-blue-900
                           dark:text-blue-400
                           dark:hover:text-blue-300">

                    View publication

                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                        fill="none"
                        stroke="currentColor"
                        stroke-width="1.8"
                        class="h-4 w-4"
                        aria-hidden="true">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M14 4h6v6m-11 4L20 4M18 13v5a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h5"/>
                    </svg>

                </a>

            </div>

        </div>

    </div>

</div>

<script>
    (() => {
        const styleSelect = document.getElementById('isr-citation-style');
        const output = document.getElementById('isr-citation-output');
        const copyButton = document.getElementById('isr-copy-citation');
        const copyLabel = document.getElementById('isr-copy-label');

        if (!styleSelect || !output || !copyButton || !copyLabel) {
            return;
        }

        const citations = {
            apa: 'Singh, V. K., Nandy, A., Singh, P., et al. (2022). Indian Science Reports: A web-based scientometric portal for mapping Indian research competencies at overall and institutional levels. Scientometrics. https://doi.org/10.1007/s11192-022-04395-6',

            harvard: 'Singh, V.K., Nandy, A., Singh, P. et al. (2022) “Indian Science Reports: a web-based scientometric portal for mapping Indian research competencies at overall and institutional levels”, Scientometrics. Available at: https://doi.org/10.1007/s11192-022-04395-6.',

            vancouver: 'Singh VK, Nandy A, Singh P, et al. Indian Science Reports: a web-based scientometric portal for mapping Indian research competencies at overall and institutional levels. Scientometrics. 2022. doi:10.1007/s11192-022-04395-6.',

            bibtex: `@article{singh2022indian,
  title   = {Indian Science Reports: a web-based scientometric portal for mapping Indian research competencies at overall and institutional levels},
  author  = {Singh, V. K. and Nandy, A. and Singh, P. and others},
  journal = {Scientometrics},
  year    = {2022},
  doi     = {10.1007/s11192-022-04395-6},
  url     = {https://doi.org/10.1007/s11192-022-04395-6}
}`
        };

        styleSelect.addEventListener('change', () => {
            output.textContent = citations[styleSelect.value] || citations.apa;
            copyLabel.textContent = 'Copy citation';
            copyButton.disabled = false;
        });

        copyButton.addEventListener('click', async () => {
            const citation = output.textContent;

            try {
                await navigator.clipboard.writeText(citation);
                copyLabel.textContent = 'Copied!';
            } catch (error) {
                const range = document.createRange();
                range.selectNodeContents(output);

                const selection = window.getSelection();
                selection.removeAllRanges();
                selection.addRange(range);

                copyLabel.textContent = 'Select and copy';
            }
        });
    })();
</script>
