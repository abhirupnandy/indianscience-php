# Indian Science Reports — simple rebuild (vanilla PHP)

Single front-controller, no framework, no admin/auth (read-only site).

## Structure

```
index.php          Router + front controller (the ONLY entry point)
config.php          Loads .env, opens $pdo, defines SITE_* constants
.env                 DB credentials (git-ignored, blocked from web access)
.env.example          Template for .env

includes/
  functions.php        e(), url(), format_*(), partial(), db_find(), abort_404()

partials/            Shared chrome + reusable components
  header.php / footer.php / nav.php
  institution-card.php / post-card.php / stat-block.php

pages/               One file per route. Pure content — no header/footer
                      calls inside them; index.php wraps them.
  home.php, institutions.php, institution.php, blog.php, blog-post.php,
  publications.php, research-output.php, citations.php, ... , 404.php

assets/              css/js/img — served directly, untouched by the router
database/            schema.sql + seed.sql
```

## How routing works

Every request hits `index.php` (via `.htaccess`), which matches the URL
path against a small `$routes` table:

```php
'institution/{slug}' => 'institution.php',
```

`{slug}` becomes `$params['slug']` inside `pages/institution.php`. The
matched page is buffered, then wrapped with `partials/header.php` /
`partials/footer.php` — so a page can set `$pageTitle` at the top and it'll
correctly appear in `<title>`.

Adding a new page = add one line to `$routes` in `index.php` + one file in
`pages/`.

## Local setup

1. Copy `.env.example` to `.env` and fill in real DB credentials (a
   pre-filled `.env` is included here for local testing — replace it).
2. Load the schema:
   ```
   mysql -u root -p < database/schema.sql
   mysql -u root -p < database/seed.sql
   ```
3. Serve with PHP's built-in server:
   ```
   php -S localhost:8000
   ```
   (No `-t public` needed — this structure serves straight from the
   project root. `index.php` handles routing itself, so `.htaccess`
   rewriting isn't required for local testing either — just visit
   `http://localhost:8000/institution/iisc-bangalore` directly.)

   For real Apache hosting, point the vhost's document root at this
   folder and make sure `mod_rewrite` + `AllowOverride All` are enabled
   so `.htaccess` takes effect.

## Adding content

- **Institutions** → insert into `institutions` + `institution_stats`.
- **Blog posts** → insert into `posts`. `body` is stored as trusted HTML
  (echoed unescaped in `pages/blog-post.php`) — sanitize before inserting.
- **Publications** → insert into `publications`; `is_featured = 1` shows
  it on the homepage.

## Notes / TODOs

- The 8 report pages (`pages/research-output.php` etc.) are scaffolded
  with the right headings but no chart/table logic yet — the original
  site's underlying numbers weren't available to port over.
- Institution logos referenced by `logo_path` aren't included — drop
  images into `assets/img/institutions/`.
- `.env` here has placeholder credentials for local testing only —
  replace before deploying, and make sure your host actually blocks
  direct `.env` access (the `.htaccess` rule handles Apache; on other
  servers, move `.env` outside the web root instead).
