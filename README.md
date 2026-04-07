# PLX Parallax

Responsive WordPress theme with a parallax front page, Customizer controls for gradients and imagery, Google Font selection, and behavior toggles for sticky header, smooth scroll, and mobile parallax handling.

## WordPress Theme Structure

This repository is organized as a classic WordPress theme:

- `style.css`: required WordPress theme stylesheet and theme header metadata
- `theme.json`: editor and global style manifest for modern WordPress
- `functions.php`: theme setup, assets, supports, and runtime settings
- `header.php`, `footer.php`, `index.php`: core template files
- `front-page.php`, `page.php`, `single.php`: content templates
- `inc/`: theme PHP includes
- `assets/js/`: theme JavaScript

## Requirements

- WordPress `6.0+`
- PHP `7.4+`

## Features

- Parallax hero with adjustable motion depth
- Customizer controls for:
  - gradient colors and angle
  - hero and intro images
  - Google Font selection
  - primary, accent, surface, and text colors
  - sticky header, smooth scroll, content width, and mobile behavior
- Responsive layout for desktop, tablet, and mobile

## Installation

1. Place the theme folder in `wp-content/themes/plx_theme`
2. Activate `PLX Parallax` in WordPress admin
3. Assign a menu to `Primary Menu`
4. Optionally set a static homepage to make full use of `front-page.php`

## Notes

- `style.css` and `index.php` are present, which are the minimum required files for a valid WordPress theme.
- `theme.json` is included so the theme also behaves correctly with the block editor and site-wide editor settings.
