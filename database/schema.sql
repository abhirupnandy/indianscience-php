-- Indian Science Reports — schema.sql
-- MySQL / MariaDB. Read-only site: no user accounts / auth tables needed.

CREATE DATABASE IF NOT EXISTS indianscience
  CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE indianscience;

-- ---------------------------------------------------------------
-- Institutions
-- ---------------------------------------------------------------
CREATE TABLE institutions (
    id                  INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    grid_id             VARCHAR(50)  NULL,                 -- original GRID identifier, kept for reference
    slug                VARCHAR(160) NOT NULL UNIQUE,       -- iisc-bangalore
    name                VARCHAR(255) NOT NULL,
    institution_type    VARCHAR(100) NULL,                  -- Education, Research, Medical...
    year_established    SMALLINT     NULL,
    city                VARCHAR(120) NULL,
    state               VARCHAR(120) NULL,
    description         TEXT         NULL,
    source_note         VARCHAR(255) NULL,                  -- e.g. "Source: Wikipedia"
    logo_path           VARCHAR(255) NULL,
    is_major            TINYINT(1)   NOT NULL DEFAULT 0,    -- featured on homepage
    created_at          TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    updated_at          TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP
                                     ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_institutions_name (name),
    INDEX idx_institutions_major (is_major)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------
-- Institution key indicators (one row per institution, per period)
-- Kept as a wide table since the metric set is fixed/known, matching
-- the "Key Indicators (2010-2019)" block on the original site.
-- ---------------------------------------------------------------
CREATE TABLE institution_stats (
    id                      INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    institution_id          INT UNSIGNED NOT NULL,
    period_label            VARCHAR(20)  NOT NULL DEFAULT '2010-2019',

    total_papers            INT UNSIGNED NULL,
    total_citations         INT UNSIGNED NULL,
    citations_per_paper     DECIMAL(8,2) NULL,
    h_index                 INT UNSIGNED NULL,
    g_index                 INT UNSIGNED NULL,
    x_index                 INT UNSIGNED NULL,
    xg_index                INT UNSIGNED NULL,

    icp_proportion          DECIMAL(5,2) NULL,   -- International Collaborative Papers %
    male_first_author_pct   DECIMAL(5,2) NULL,
    female_first_author_pct DECIMAL(5,2) NULL,

    open_access_pct         DECIMAL(5,2) NULL,

    twitter_coverage_pct    DECIMAL(5,2) NULL,
    facebook_coverage_pct   DECIMAL(5,2) NULL,
    mendeley_coverage_pct   DECIMAL(5,2) NULL,
    twitter_avg_mentions    DECIMAL(8,2) NULL,
    facebook_avg_mentions   DECIMAL(8,2) NULL,
    mendeley_avg_mentions   DECIMAL(8,2) NULL,

    arwu_rank               VARCHAR(20)  NULL,
    the_rank                VARCHAR(20)  NULL,
    qs_rank                 VARCHAR(20)  NULL,
    leiden_rank              VARCHAR(20)  NULL,
    nirf_rank                VARCHAR(20)  NULL,

    external_data_year       SMALLINT NULL,

    CONSTRAINT fk_stats_institution FOREIGN KEY (institution_id)
        REFERENCES institutions(id) ON DELETE CASCADE,
    UNIQUE KEY uq_institution_period (institution_id, period_label)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------
-- Blog posts
-- ---------------------------------------------------------------
CREATE TABLE posts (
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    slug            VARCHAR(200) NOT NULL UNIQUE,
    title           VARCHAR(255) NOT NULL,
    excerpt         VARCHAR(500) NULL,
    body            MEDIUMTEXT   NOT NULL,           -- store rendered HTML or Markdown
    author          VARCHAR(150) NULL,
    cover_image     VARCHAR(255) NULL,
    is_published    TINYINT(1)   NOT NULL DEFAULT 1,
    published_at    DATETIME     NOT NULL,
    created_at      TIMESTAMP    NOT NULL DEFAULT CURRENT_TIMESTAMP,
    INDEX idx_posts_published (is_published, published_at)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------
-- Publications (papers by the research group, shown on homepage /
-- publications.php)
-- ---------------------------------------------------------------
CREATE TABLE publications (
    id              INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title           VARCHAR(500) NOT NULL,
    authors         VARCHAR(500) NOT NULL,
    url             VARCHAR(500) NULL,
    journal         VARCHAR(255) NULL,
    published_at    DATE NULL,
    is_featured     TINYINT(1) NOT NULL DEFAULT 0,   -- show on homepage
    sort_order      INT NOT NULL DEFAULT 0,
    INDEX idx_publications_featured (is_featured, sort_order)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------
-- Site-wide summary counters shown on the homepage
-- ("Institutions Covered", "Years of Data", "Attributes Computed")
-- ---------------------------------------------------------------
CREATE TABLE site_counters (
    counter_key     VARCHAR(50) PRIMARY KEY,
    counter_value   INT NOT NULL,
    label           VARCHAR(100) NOT NULL
) ENGINE=InnoDB;
-- ---------------------------------------------------------------
-- Visitors
-- ---------------------------------------------------------------
CREATE TABLE visitors (
    id BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
    browser_id CHAR(32) NOT NULL,
    ip_address VARCHAR(45) DEFAULT NULL,
    first_visit DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    last_visit DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    visit_count INT UNSIGNED NOT NULL DEFAULT 1,

    PRIMARY KEY (id),
    UNIQUE KEY browser_id (browser_id),
    KEY idx_ip_address (ip_address),
    KEY idx_last_visit (last_visit)
) ENGINE=InnoDB
  DEFAULT CHARSET=utf8mb4
  COLLATE=utf8mb4_unicode_ci;
