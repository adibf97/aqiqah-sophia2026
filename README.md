# Kad Jemputan Majlis Aqiqah Aurora Sophia

Modern, stylish, and mobile-friendly digital invitation card (Kad Jemputan Majlis Aqiqah) built with **PHP**, **HTML**, **Bootstrap 5**, and **JavaScript**.

## Features
- Soft Islamic-inspired theme (cream, blush pink, sage green) with warm gold accents
- Full-screen **cover page** (“Muka depan jemputan”) then reveals the full invitation
- Event details (tarikh, masa, lokasi) + address section
- Map navigation selector (Waze / Google Maps / Apple Maps)
- Countdown timer
- “Add to Calendar” (downloads an `.ics` file)
- Copy address (clipboard with fallback)
- Optional background nasheed audio (autoplay best-effort)
- Responsive design + gentle animations

## Project Structure
- `index.php` — main invitation page (all event variables are edited here)
- `assets/`
  - `css/style.css` — styling (theme, layout, animations)
  - `js/script.js` — interactions (countdown, modals, copy, calendar, reveal flow)
  - `images/` — images (logo, corner accents, etc.)
  - `music/` — background audio (`MaherZainmp3.mp3`)

## How to Customize
Open `index.php` and edit these variables near the top:
- `$event_title`
- `$invitation_text`
- `$honoree_name`
- `$event_date`, `$event_time_start`, `$event_time_end`
- `$event_date_display`, `$event_time_display`
- `$venue_name`, `$address`
- `$whatsapp_number` (RSVP button, if enabled)
- `$nasheed_audio_url` (set to `''` to disable audio)

## Run Locally (Laragon / PHP)
1. Put this folder inside your local web root (already in `c:\\laragon\\www\\aqiqah-sophia2026`)
2. Start Laragon
3. Open `http://localhost/aqiqah-sophia2026/`

## Deploy to GitHub + Vercel
This project uses **PHP**, and Vercel does **not** run PHP by default. Use a static export.

1. Create a static HTML snapshot (**UTF-8** — do **not** use PowerShell `php index.php > index.html`; it often writes **UTF-16** and breaks `<`, Arabic text, and emojis):
   ```bash
   php export-static.php
   ```
   This writes `index.html` as plain UTF-8 (no BOM).
2. Commit and push both:
   - `index.html`
   - `assets/`
   - (You can keep `index.php` too; Vercel will use `index.html`.)

3. On Vercel:
   - Import from GitHub
   - Framework preset: **None / Static**
   - Ensure `index.html` is at the repository root

## Notes
- If autoplay audio is blocked by the browser, it will start/unmute after the first user gesture (click/touch).
- For GitHub Pages, PHP is not supported; prefer the `index.html` static export as well.

# aqiqah-sophia2026
Kad Jemputan Majlis Aqiqah Sophia &amp; Rumah Terbuka Aidilfitri
