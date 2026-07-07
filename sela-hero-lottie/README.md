# Sela Hero — Lottie

HERO section with Lottie background (desktop + mobile) and the same hero typography/CTA as `sela-hero`.

## Files

```
sela-hero-lottie/
├── schema.php
├── section.php
├── style.css
├── config.json
└── media/
    ├── lottie-desktop.json   (1440×704)
    └── lottie-mobile.json    (704×1440)
```

- **Type / slug:** `sela-hero-lottie`
- **Admin label:** `Sela Hero — Lottie`
- **CSS prefix:** `slhl-`

## Install — manual (recommended)

1. Copy the entire `sela-hero-lottie/` folder to:
   `wp-content/uploads/hero/sections/sela-hero-lottie/`
2. Ensure `schema.php` is directly inside that folder:
   `.../sela-hero-lottie/schema.php`
3. Refresh HERO admin → the section should appear as **Sela Hero — Lottie**.

## Install — ZIP upload in HERO admin

**Important:** the ZIP must contain the section files at the **root** of the archive — not wrapped in a `sela-hero-lottie/` folder.

Correct ZIP structure:

```
schema.php
section.php
style.css
config.json
media/lottie-desktop.json
media/lottie-mobile.json
```

Wrong (causes `schema.php not found after extraction`):

```
sela-hero-lottie/schema.php   ← extra folder level
```

From this repo, create the correct upload ZIP:

```powershell
Compress-Archive -Path "sela-hero-lottie\*" -DestinationPath "sela-hero-lottie-upload.zip"
```

Then upload `sela-hero-lottie-upload.zip` in HERO admin.

## Admin fields

- **Content:** title, subtitle, CTA text/link
- **Lottie:** `lottie_desktop`, `lottie_mobile` (JSON URL — upload to Media Library and paste URL)
- **Style:** fonts, sizes, colors (same as `sela-hero`)
