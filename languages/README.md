Place translation files for the `plx-parallax` text domain in this directory.

Included locales:
- `sv_SE`
- `de_DE`
- `es_ES`

Files:
- `plx-parallax.pot`
- `plx-parallax-sv_SE.po` / `plx-parallax-sv_SE.mo`
- `plx-parallax-de_DE.po` / `plx-parallax-de_DE.mo`
- `plx-parallax-es_ES.po` / `plx-parallax-es_ES.mo`

WordPress will load the matching translation according to the site's language setting.

To regenerate the language packs after adding new strings:
- Run `python tools/generate_i18n.py`
