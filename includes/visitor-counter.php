<?php

/**
 * Database Visitor Counter
 *
 * File:
 *     includes/visitor-counter.php
 *
 * Requirements:
 *     - $pdo must already be available
 *     - visitors table must exist
 *
 * Browser identification:
 *     - localStorage
 *     - 32-character browser ID
 *
 * Database:
 *     visitors.browser_id is UNIQUE
 */


// ------------------------------------------------------------
// Visitor IP
// ------------------------------------------------------------

$visitorIp = $_SERVER['REMOTE_ADDR'] ?? null;

if (
    $visitorIp !== null &&
    filter_var($visitorIp, FILTER_VALIDATE_IP) === false
) {
    $visitorIp = null;
}


// ------------------------------------------------------------
// AJAX visitor registration
// ------------------------------------------------------------

if (
    $_SERVER['REQUEST_METHOD'] === 'POST' &&
    isset($_POST['register_visitor'])
) {

    header('Content-Type: application/json; charset=UTF-8');


    // --------------------------------------------------------
    // Browser ID
    // --------------------------------------------------------

    $browserId = trim(
        (string) ($_POST['browser_id'] ?? ''),
    );


    // Must be exactly 32 hexadecimal characters.

    if (
        !preg_match('/^[a-f0-9]{32}$/', $browserId)
    ) {

        http_response_code(400);

        echo json_encode([
            'success' => false,
            'message' => 'Invalid browser identifier.',
        ]);

        exit;
    }


    try {

        // ----------------------------------------------------
        // Check whether this browser already exists
        // ----------------------------------------------------

        $stmt = $pdo->prepare(
            'SELECT id, visit_count
             FROM visitors
             WHERE browser_id = ?
             LIMIT 1',
        );

        $stmt->execute([$browserId]);

        $existingVisitor = $stmt->fetch(PDO::FETCH_ASSOC);


        if ($existingVisitor) {

            // ------------------------------------------------
            // Existing browser
            //
            // Do NOT increase the total visitor count.
            // ------------------------------------------------

            $update = $pdo->prepare(
                'UPDATE visitors
                 SET last_visit = CURRENT_TIMESTAMP,
                     visit_count = visit_count + 1,
                     ip_address = ?
                 WHERE id = ?',
            );

            $update->execute([
                $visitorIp,
                $existingVisitor['id'],
            ]);
        } else {

            // ------------------------------------------------
            // New browser
            // ------------------------------------------------

            $insert = $pdo->prepare(
                'INSERT INTO visitors
                    (
                        browser_id,
                        ip_address,
                        first_visit,
                        last_visit,
                        visit_count
                    )
                 VALUES
                    (
                        ?,
                        ?,
                        CURRENT_TIMESTAMP,
                        CURRENT_TIMESTAMP,
                        1
                    )',
            );

            $insert->execute([
                $browserId,
                $visitorIp,
            ]);
        }


        // ----------------------------------------------------
        // Get total unique visitors
        // ----------------------------------------------------

        $countStmt = $pdo->query(
            'SELECT COUNT(*) FROM visitors',
        );

        $totalVisitors = (int) $countStmt->fetchColumn();


        echo json_encode([
            'success' => true,
            'total' => $totalVisitors,
        ]);

        exit;
    } catch (PDOException $e) {

        http_response_code(500);

        echo json_encode([
            'success' => false,
            'message' => 'Unable to register visitor.',
        ]);

        exit;
    }
}


// ------------------------------------------------------------
// Get current total
// ------------------------------------------------------------

$visitorTotal = 0;

try {

    $stmt = $pdo->query(
        'SELECT COUNT(*) FROM visitors',
    );

    $visitorTotal = (int) $stmt->fetchColumn();
} catch (PDOException $e) {

    $visitorTotal = 0;
}

?>

<div
    class="mt-4 space-y-4"
    data-visitor-counter
    data-register-url="<?= e($_SERVER['REQUEST_URI'] ?? '/') ?>">

    <!-- =====================================================
         TOTAL VISITORS
    ====================================================== -->

    <div class="flex items-center gap-4">

        <div class="flex h-12 w-12 shrink-0 items-center justify-center rounded-xl bg-[#1A4D8F]/10 text-[#1A4D8F] dark:bg-[#1A4D8F]/20 dark:text-blue-300">

            <svg
                class="h-6 w-6"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.7"
                aria-hidden="true">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M15 19a4 4 0 00-8 0m4-8a3 3 0 100-6 3 3 0 000 6zm9 8a4 4 0 00-5.5-3.68M17 5a3 3 0 010 6" />
            </svg>

        </div>


        <div>

            <p
                class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white"
                data-visitor-total>
                <?= number_format($visitorTotal) ?>
            </p>

            <p class="text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-400">
                Total Visitors
            </p>

        </div>

    </div>


    <!-- =====================================================
         CURRENT IP
    ====================================================== -->

    <div class="rounded-xl border border-gray-200 bg-white px-4 py-3 dark:border-gray-800 dark:bg-gray-950">

        <div class="flex items-center justify-between gap-4">

            <div>

                <p class="text-xs font-medium uppercase tracking-wider text-gray-500 dark:text-gray-500">
                    Your IP Address
                </p>

                <p class="mt-1 font-mono text-sm font-medium text-gray-800 dark:text-gray-200">
                    <?= e($visitorIp ?? 'Unavailable') ?>
                </p>

            </div>


            <svg
                class="h-5 w-5 shrink-0 text-gray-400 dark:text-gray-600"
                fill="none"
                viewBox="0 0 24 24"
                stroke="currentColor"
                stroke-width="1.7"
                aria-hidden="true">
                <path
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    d="M12 21a9 9 0 100-18 9 9 0 000 18zm0-13v4m0 4h.01" />
            </svg>

        </div>

    </div>

</div>


<script>
    (function() {

        const counter =
            document.querySelector('[data-visitor-counter]');

        if (!counter) {
            return;
        }


        // --------------------------------------------------------
        // Browser ID
        // --------------------------------------------------------

        const storageKey = 'isr_browser_id';


        function generateBrowserId() {

            const bytes =
                new Uint8Array(16);

            crypto.getRandomValues(bytes);

            return Array.from(bytes)
                .map(byte =>
                    byte.toString(16).padStart(2, '0')
                )
                .join('');

        }


        let browserId = null;


        try {

            browserId =
                localStorage.getItem(storageKey);

        } catch (error) {

            browserId = null;

        }


        /*
         * Create an ID for this browser if one does not exist.
         */

        if (
            !browserId ||
            !/^[a-f0-9]{32}$/.test(browserId)
        ) {

            browserId =
                generateBrowserId();

            try {

                localStorage.setItem(
                    storageKey,
                    browserId
                );

            } catch (error) {

                // Continue using the generated ID.
            }
        }


        // --------------------------------------------------------
        // Register visitor
        // --------------------------------------------------------

        const formData =
            new FormData();

        formData.append(
            'register_visitor',
            '1'
        );

        formData.append(
            'browser_id',
            browserId
        );


        fetch(
                counter.dataset.registerUrl, {
                    method: 'POST',
                    body: formData,
                    credentials: 'same-origin',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                }
            )
            .then(response => {

                if (!response.ok) {
                    throw new Error(
                        'Visitor registration failed.'
                    );
                }

                return response.json();

            })
            .then(data => {

                if (!data.success) {
                    return;
                }


                // ----------------------------------------------------
                // Update visible counter
                // ----------------------------------------------------

                const total =
                    counter.querySelector(
                        '[data-visitor-total]'
                    );

                if (
                    total &&
                    typeof data.total !== 'undefined'
                ) {

                    total.textContent =
                        Number(data.total)
                        .toLocaleString();

                }

            })
            .catch(error => {

                console.warn(
                    'Visitor counter:',
                    error.message
                );

            });

    })();
</script>