# Sela Hero — HERO plugin section

Generated from `<!-- ============================ HERO ============================ -->`
in `27.4.2026-0-7-items.archive/index.html`.

## Files

```
sela-hero/
├── schema.php          — field definitions (text, image, color, font, toggle)
├── section.php         — markup with $settings + $get_img helper
├── style.css           — scoped to .slhe-section, desktop + 768px mobile
├── config.json         — plugin manifest
└── media/              — 8 image files referenced by section.php fallbacks
    ├── hero-graphic.png
    ├── star.gif
    ├── ellipse-cyan.svg
    ├── ellipse-green.svg
    ├── ellipse-blue.svg
    ├── ellipse-pink.svg
    ├── cloud-hero-1.svg
    └── cloud-hero-2.svg
```

## Install

1. Drop the `sela-hero/` folder into the HERO plugin's sections directory
   (typically `wp-content/plugins/hero/sections/sela-hero/`).
2. Upload the contents of `media/` to
   `wp-content/uploads/hero/sections/sela-hero/media/` so the `$get_img`
   fallbacks resolve. Or, set each image field per-page in the admin.
3. Add the section to a page from the HERO admin → Sections list.

## Admin fields

- **Content**: `title` (textarea), `tag_title` (h1–h6/p/span/div),
  `subtitle` (textarea), `tag_subtitle`, `cta_text`, `cta_link`.
- **Typography**: `ff_*`, `fz_*_d`, `fz_*_m`, `fw_*`, `lh_*`, `ls_*` for
  title and subtitle.
- **Colors**: `bg_section`, `color_title`, `color_sub`, `color_btn`, plus
  an individual color for each of the four orbs.
- **Visibility toggles**: `show_orb_*`, `show_robot`, `show_stars`,
  `show_clouds`.
- **Images**: 12 image fields (robot, star, four orb ellipses, six
  clouds). Each falls back to a bundled file under `media/`.

## CSS scope

All rules live under `.slhe-section`. The runtime CSS variables
(`--slhe-*`) are written into a per-instance `<style>` block in
`section.php` so two instances on the same page can have different colors,
fonts, sizes without leaking.

## Mobile breakpoint

Single override at `≤ 768px`: scaled-down orbs, repositioned robot, hidden
stars + clouds, smaller title/subtitle. A second tweak at `≤ 480px` drops
the title to 26px.

## What's NOT included

- The `<!-- TRUSTED BY -->`, `<!-- CLOUD ENGINE -->`, `<!-- TECH EXPERTS -->`
  and other sections from the same `index.html` — those are separate
  HERO sections, not part of this hero export.
- The original three figma.com `mcp/asset/...` URLs that the source
  used for cloud variants 4/5/6. Those would expire; the schema points
  at local SVG fallbacks instead. Admins can paste any image URL in the
  matching field if they want to keep the original Figma asset.
