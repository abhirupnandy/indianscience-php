<?php
// $pdo is available globally (set up in config.php)

$majorInstitutions = $pdo->query(
    "SELECT * FROM institutions WHERE is_major = 1 ORDER BY name ASC LIMIT 11"
)->fetchAll();

$counters = $pdo->query("SELECT * FROM site_counters")->fetchAll();

$featuredPublications = $pdo->query(
    "SELECT * FROM publications WHERE is_featured = 1 ORDER BY sort_order ASC, published_at DESC LIMIT 5"
)->fetchAll();

$recentPosts = $pdo->query(
    "SELECT * FROM posts WHERE is_published = 1 ORDER BY published_at DESC LIMIT 4"
)->fetchAll();
?>
<section class="hero">
    <div class="container">
        <h1>Indian Science Reports</h1>
        <p><?= e(SITE_DESCRIPTION) ?></p>
    </div>
</section>

<section class="major-institutions">
    <div class="container">
        <h2>Major Institutions</h2>
        <div class="institution-grid">
            <?php foreach ($majorInstitutions as $institution): ?>
                <?php partial('institution-card', ['institution' => $institution]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="counters">
    <div class="container counters-inner">
        <?php foreach ($counters as $counter): ?>
            <?php partial('stat-block', [
                'label' => $counter['label'],
                'value' => format_number($counter['counter_value']) . ($counter['counter_key'] === 'attributes' ? '+' : ''),
            ]); ?>
        <?php endforeach; ?>
    </div>
</section>

<section class="report-links">
    <div class="container">
        <a href="<?= url('reports/research-output') ?>">
            <h3>Research Output</h3>
            <p>India's overall Research Output, CAGR, Rank, Subject-area Distribution and Comparison with other major countries.</p>
        </a>
        <a href="<?= url('reports/citations') ?>">
            <h3>Citations</h3>
            <p>Total citations to Indian Research output, Relative Citation Ratio, Highly Cited Papers of India.</p>
        </a>
        <a href="<?= url('reports/collaboration') ?>">
            <h3>Collaboration</h3>
            <p>Domestic and International Collaboration, subject-area patterns, and Citation Impact.</p>
        </a>
        <a href="<?= url('reports/gender') ?>">
            <h3>Gender Distribution</h3>
            <p>Proportion of Female and Male 1st authored papers and their collaboration/impact.</p>
        </a>
        <a href="<?= url('reports/open-access') ?>">
            <h3>Open Access</h3>
            <p>Volume of Indian Research Output in Open Access and relation to research funding.</p>
        </a>
    </div>
</section>

<section class="institution-search">
    <div class="container">
        <h2>Search for Institution by name</h2>
        <form action="<?= url('institutions') ?>" method="get">
            <input type="text" name="q" placeholder="e.g. Indian Institute of Science">
            <button type="submit">Search</button>
        </form>
        <p><a href="<?= url('institutions') ?>">Click here for full list</a></p>
    </div>
</section>

<section class="recent-publications">
    <div class="container">
        <h2>Recent Publications</h2>
        <ul>
            <?php foreach ($featuredPublications as $pub): ?>
                <li>
                    <p class="authors"><?= e($pub['authors']) ?></p>
                    <h3><a href="<?= e($pub['url']) ?>"><?= e($pub['title']) ?></a></h3>
                </li>
            <?php endforeach; ?>
        </ul>
        <a href="<?= url('publications') ?>">View all our other Publications</a>
    </div>
</section>

<?php if ($recentPosts): ?>
<section class="recent-posts">
    <div class="container">
        <h2>From the Blog</h2>
        <div class="post-grid">
            <?php foreach ($recentPosts as $post): ?>
                <?php partial('post-card', ['post' => $post]); ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?php endif; ?>
