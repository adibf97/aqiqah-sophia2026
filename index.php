<?php
/**
 * Kad Jemputan Majlis Aqiqah Aurora Sophia
 * Edit variables below for your event — no database required.
 */

// —— Event meta ——
$page_title       = 'Kad Jemputan Rumah Terbuka Aidilfitri & Majlis Aqiqah Aurora Sophia';
$event_title1     = 'Majlis Aqiqah';
$event_title2     = 'Rumah Terbuka Aidilfitri';
$invitation_text  = 'Dengan penuh kesyukuran, kami menjemput anda sekeluarga ke majlis aqiqah puteri kami';

// —— Header kad (dalaman) — susun atur seperti rujukan: salam, ibu bapa, jemputan formal ——
$salam_calligraphy_image = ''; // contoh: 'assets/images/salam-calligraphy.png' (PNG/SVG di atas)
$invite_opening_line     = 'Alhamdulillah dengan penuh rasa syukur, kami';
$father_name             = 'MUHAMMAD ADIB FARHAN B HARIS FADILLAH';
$mother_name             = 'ATHIRAH SHAHRINA BT AZAZUL KAMAL SHAHRIR';
$grandma_name            = 'FERAWATI BT SYAMSIR';
$grandpa_name            = 'HARIS FADILLAH B YUSOF';
$daughter_name           = 'AURORA SOPHIA BT MUHAMMAD ADIB FARHAN';
// Ayat sambungan sebelum tajuk majlis (gantung + tajuk + “:”)
$invite_formal_prefix    = 'Dengan berbesar hati ingin menjemput ke Majlis Aqiqah & Rumah Terbuka Aidilfitri cucunda/anakanda kami:';

// —— Muka depan (cover) — nama yang dipaparkan antara pemisah ——
$honoree_name = 'AURORA SOPHIA'; // tukar nama penuh anak

// Latar bunga halaman depan: kosong = gaya CSS; atau letak imej contoh 'assets/images/cover-floral.png'
$cover_floral_image = '';

// —— Date & time (ISO 8601 for calendar / countdown) ——
// Ubah tarikh di sini: format 'Y-m-d' dan masa 'H:i'
$event_date       = '2026-04-18';  // contoh: 15 Jun 2026
$event_time_start = '10:00';
$event_time_end   = '16:00';

// Paparan manusia (Bahasa Melayu)
$event_date_display = 'Ahad, 18 April 2026';
$event_time_display = '10:00 pagi – 2:00 petang';

// —— Lokasi ——
$venue_name = '43, Jalan AU 2A/2, Taman Keramat, 54200 Kuala Lumpur, Selangor';
$address    = '43, Jalan AU 2A/2, Taman Keramat, 54200 Kuala Lumpur, Selangor';

// Pautan peta (Google Maps seperti diminta)
$google_maps_url = 'https://www.google.com/maps/search/?api=1&query=43,+Jalan+AU+2A/2,+Taman+Keramat,+54200+Kuala+Lumpur';

// Waze: carian alamat (buka app pada telefon bila ada)
$waze_url = 'https://waze.com/ul?q=' . rawurlencode($address) . '&navigate=yes';

// Apple Maps
$apple_maps_url = 'https://maps.apple.com/?q=' . rawurlencode($address);

// —— RSVP WhatsApp (kod negara Malaysia tanpa +, contoh: 60123456789) ——
$whatsapp_number = '60123456789'; // tukar ke nombor sebenar
$whatsapp_message  = rawurlencode('Assalamualaikum, saya ingin mengesahkan kehadiran ke Majlis Aqiqah Aurora Sophia.');

// —— Audio latar (letak fail dalam assets/audio/ — kosongkan untuk lumpuhkan) ——
$nasheed_audio_url = 'assets/music/MaherZainmp3.mp3'; // contoh: 'assets/audio/background.mp3'

// Zon masa Malaysia untuk kalendar & kira detik (ISO dengan offset)
$timezone_ical     = 'Asia/Kuala_Lumpur';
$event_start_iso   = $event_date . 'T' . $event_time_start . ':00+08:00';
$event_end_iso     = $event_date . 'T' . $event_time_end . ':00+08:00';

// Baris tarikh masa pada cover (ikut rujukan: AHAD | DD.MM.YYYY)
$malay_days = ['Ahad', 'Isnin', 'Selasa', 'Rabu', 'Khamis', 'Jumaat', 'Sabtu'];
$event_dt   = new DateTime($event_date);
$cover_day  = $malay_days[(int) $event_dt->format('w')];
$cover_date_line = strtoupper($cover_day) . ' | ' . $event_dt->format('d.m.Y');
$t_start = DateTime::createFromFormat('H:i', $event_time_start);
$t_end   = DateTime::createFromFormat('H:i', $event_time_end);
$cover_time_line = $t_start && $t_end
    ? $t_start->format('g:i A') . ' – ' . $t_end->format('g:i A')
    : $event_time_display;
?>
<!DOCTYPE html>
<html lang="ms">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo htmlspecialchars($page_title); ?>">
    <title><?php echo htmlspecialchars($page_title); ?></title>
    
    <!-- Favicon -->
    <link rel="icon" type="image/jpeg" href="assets/images/Alogo.jpg">
    <link rel="apple-touch-icon" href="assets/images/Alogo.jpg">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Amiri:wght@400;700&family=Great+Vibes&family=Playfair+Display:ital,wght@0,400;0,600;0,700;1,400&family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body class="invitation-body cover-active">

    <!-- Muka depan jemputan -->
    <div id="coverPage" class="cover-page" role="dialog" aria-modal="true" aria-labelledby="coverTitle" aria-describedby="coverDesc">
        <?php if ($cover_floral_image !== '') : ?>
        <div class="cover-floral-bg" style="background-image: url('<?php echo htmlspecialchars($cover_floral_image, ENT_QUOTES, 'UTF-8'); ?>');" aria-hidden="true"></div>
        <?php endif; ?>
        <div class="cover-floral-frame" aria-hidden="true">
            <span class="cover-corner cover-corner--tl"></span>
            <span class="cover-corner cover-corner--tr"></span>
            <span class="cover-corner cover-corner--bl"></span>
            <span class="cover-corner cover-corner--br"></span>
        </div>
        <div class="cover-content">
            <p class="cover-bismillah" lang="ar" dir="rtl">بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ</p>
            <p class="cover-label" id="coverDesc">Jemputan</p>
            <div class="cover-divider" aria-hidden="true">
                <span class="cover-divider-line"></span>
                <span class="cover-divider-ornament">◇</span>
                <span class="cover-divider-line"></span>
            </div>
            <h1 class="cover-title-script" id="coverTitle"><?php echo htmlspecialchars($event_title1); ?></h1>
            &
            <h1 class="cover-title-script" id="coverTitle"><?php echo htmlspecialchars($event_title2); ?></h1>
            <div class="cover-divider" aria-hidden="true">
                <span class="cover-divider-line"></span>
                <span class="cover-divider-ornament">◇</span>
                <span class="cover-divider-line"></span>
            </div>
            <p class="cover-dateline"><?php echo htmlspecialchars($cover_date_line); ?></p>
            <p class="cover-timeline"><?php echo htmlspecialchars($cover_time_line); ?></p>
            <button type="button" class="btn btn-cover-open" id="btnOpenInvitation">
                Buka Jemputan
            </button>
        </div>
    </div>

    <!-- Latar animasi -->
    <div class="bg-shapes" aria-hidden="true">
        <span class="shape shape-1"></span>
        <span class="shape shape-2"></span>
        <span class="shape shape-3"></span>
        <span class="shape shape-4"></span>
    </div>

    <main id="mainInvitation" class="main-invitation container py-4 py-md-5 min-vh-100 d-flex align-items-center justify-content-center" tabindex="-1" hidden>
        <div class="row justify-content-center w-100">
            <div class="col-12 col-lg-10 col-xl-8">
                <article class="invitation-card card border-0 shadow-lg reveal-on-scroll" data-reveal>
                    <div class="card-body p-4 p-md-5">

                        <header class="invitation-header-hero text-center mb-4 reveal-on-scroll position-relative mx-auto" data-reveal>
                            <span class="invite-floral-accent invite-floral-accent--tl" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--tr" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--bl" aria-hidden="true"></span>
                            <span class="invite-floral-accent invite-floral-accent--br" aria-hidden="true"></span>

                            <?php if ($salam_calligraphy_image !== '') : ?>
                            <img
                                class="invite-salam-img img-fluid mx-auto d-block mb-4"
                                src="<?php echo htmlspecialchars($salam_calligraphy_image, ENT_QUOTES, 'UTF-8'); ?>"
                                alt="Assalamualaikum Warahmatullahi Wabarakatuh"
                                width="420"
                                height="120"
                                loading="eager"
                                decoding="async">
                            <?php else : ?>
                            <p class="invite-salam-arabic mb-4 px-2 fs-4" lang="ar" dir="rtl">
                                السَّلَامُ عَلَيْكُمْ وَرَحْمَةُ اللهِ وَبَرَكَاتُهُ
                            </p>
                            <?php endif; ?>

                            <p class="invite-serif invite-opening mb-3 px-1 fade-in-down">
                                <?php echo htmlspecialchars($invite_opening_line); ?>
                            </p>

                            <div class="invite-parents mb-3 fade-in-down delay-1">
                                <div class="mb-3">
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($grandma_name); ?></p>
                                    <p class="invite-parent-name mb-1"><?php echo htmlspecialchars($grandpa_name); ?></p>
                                </div>
                                <div class="d-flex align-items-center justify-content-center gap-3 mb-3">
                                    <span class="cover-divider-line" style="max-width: 2rem;"></span>
                                    <span class="invite-ampersand">&amp;</span>
                                    <span class="cover-divider-line" style="max-width: 2rem;"></span>
                                </div>
                                <div>
                                    <p class="invite-parent-name mb-1"><?php echo htmlspecialchars($father_name); ?></p>
                                    <p class="invite-parent-name mb-0"><?php echo htmlspecialchars($mother_name); ?></p>
                                </div>
                            </div>

                            <p class="invite-serif invite-formal mb-0 px-1 fade-in-down delay-2">
                                <span><?php echo htmlspecialchars($invite_formal_prefix); ?></span><br><br>
                                <p class="invite-parent-name"><?php echo htmlspecialchars($daughter_name); ?></p>
                            </p>
                        </header>

                        <hr class="divider my-4 reveal-on-scroll" data-reveal>

                        <!-- Butiran majlis -->
                        <section class="mb-4 reveal-on-scroll" data-reveal>
                            <h2 class="h5 font-display text-center mb-4 section-title">Butiran Majlis</h2>
                            <div class="row g-3">
                                <div class="col-md-4">
                                    <div class="detail-tile h-100 p-3 rounded-4 text-center">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">📅</span>
                                        <p class="small text-muted mb-1">Tarikh</p>
                                        <p class="fw-semibold mb-0"><?php echo htmlspecialchars($event_date_display); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="detail-tile h-100 p-3 rounded-4 text-center">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">🕐</span>
                                        <p class="small text-muted mb-1">Masa</p>
                                        <p class="fw-semibold mb-0"><?php echo htmlspecialchars($event_time_display); ?></p>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <button type="button"
                                        class="detail-tile h-100 p-3 rounded-4 text-center w-100 d-flex flex-column align-items-center justify-content-center"
                                        title="Ketik untuk buka peta"
                                        style="cursor: pointer; text-align: center;"
                                        data-bs-toggle="modal"
                                        data-bs-target="#mapSelectionModal">
                                        <span class="detail-icon d-inline-flex mb-2" aria-hidden="true">📍</span>
                                        <p class="small text-muted mb-1">Lokasi</p>
                                        <p class="fw-semibold mb-2"><?php echo htmlspecialchars($venue_name); ?></p>
                                        <p class="small text-body mb-3 lh-sm" id="fullAddress" style="font-size: 0.8rem;"><?php echo htmlspecialchars($address); ?></p>
                                        <span class="badge rounded-pill mt-auto py-2 px-3 w-100" style="background: linear-gradient(135deg, var(--peach) 0%, var(--blush-pink) 100%); color: var(--charcoal); font-weight: 600; box-shadow: 0 4px 10px rgba(255, 203, 164, 0.3); font-family: var(--font-body); font-size: 0.75rem; letter-spacing: 0.05em;">
                                            BUKA PETA <span aria-hidden="true">↗</span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </section>

                        <!-- Kira detik -->
                        <section class="countdown-wrap text-center mb-4 p-4 p-md-5 rounded-4 reveal-on-scroll position-relative overflow-hidden" data-reveal
                            id="countdownSection"
                            data-event-datetime="<?php echo htmlspecialchars($event_start_iso); ?>"
                            style="background: linear-gradient(135deg, rgba(255, 245, 228, 0.8) 0%, rgba(250, 218, 221, 0.4) 100%); border: 1px solid rgba(212, 175, 55, 0.2); box-shadow: inset 0 0 20px rgba(255, 255, 255, 0.5);">
                            
                            <!-- Hiasan latar belakang untuk countdown -->
                            <span class="position-absolute top-0 start-0 translate-middle opacity-25" style="font-size: 6rem; color: var(--gold);">✧</span>
                            <span class="position-absolute bottom-0 end-0 translate-middle-x opacity-25" style="font-size: 5rem; color: var(--peach);">✧</span>

                            <h2 class="h5 font-display text-center mb-4" style="color: var(--gold); letter-spacing: 0.1em;">Menghitung Hari</h2>
                            
                            <div class="countdown d-flex flex-wrap justify-content-center gap-3 gap-md-4 position-relative z-1" id="countdown" role="timer" aria-live="polite">
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-days">00</span>
                                    <span class="cd-label">Hari</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-hours">00</span>
                                    <span class="cd-label">Jam</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-mins">00</span>
                                    <span class="cd-label">Minit</span>
                                </div>
                                <div class="cd-unit d-flex flex-column align-items-center justify-content-center shadow-sm">
                                    <span class="cd-num" id="cd-secs">00</span>
                                    <span class="cd-label">Saat</span>
                                </div>
                            </div>
                            <p class="small mt-4 mb-0 d-none font-display fst-italic" id="countdownDone" style="color: var(--sage-dark); font-size: 1.1rem;">Alhamdulillah — majlis telah bermula.</p>
                        </section>

                        <!-- Tindakan -->
                        <section class="d-flex flex-column flex-sm-row flex-wrap gap-2 justify-content-center align-items-stretch reveal-on-scroll" data-reveal>
                            <a class="btn btn-accent btn-pill px-4"
                               id="btnAddCalendar"
                               href="#"
                               data-cal-title="<?php echo htmlspecialchars($event_title, ENT_QUOTES, 'UTF-8'); ?>"
                               data-cal-start="<?php echo htmlspecialchars($event_start_iso); ?>"
                               data-cal-end="<?php echo htmlspecialchars($event_end_iso); ?>"
                               data-cal-location="<?php echo htmlspecialchars($address, ENT_QUOTES, 'UTF-8'); ?>"
                               data-cal-details="<?php echo htmlspecialchars($invitation_text, ENT_QUOTES, 'UTF-8'); ?>">
                                Tambah ke Kalendar
                            </a>
                        </section>

                        <?php if (!empty($nasheed_audio_url)) : ?>
                        <div class="text-center mt-4 pt-3 border-top reveal-on-scroll" data-reveal>
                            <p class="small text-muted mb-2">Background Music</p>
                            <button type="button" class="btn btn-sm btn-outline-accent btn-pill" id="btnAudioToggle" aria-pressed="false">
                                <span id="audioIcon">▶</span> Play / Pause
                            </button>
                            <audio id="bgAudio" loop preload="metadata" src="<?php echo htmlspecialchars($nasheed_audio_url); ?>"></audio>
                        </div>
                        <?php endif; ?>

                        <footer class="text-center mt-4 pt-3 small text-muted reveal-on-scroll" data-reveal>
                            <p class="mb-0 font-display fst-italic">Jazakumullahu khairan</p>
                        </footer>

                    </div>
                </article>
            </div>
        </div>
    </main>

    <!-- Modal Pilihan Peta -->
    <div class="modal fade" id="mapSelectionModal" tabindex="-1" aria-labelledby="mapSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 rounded-4 shadow-lg" style="background: var(--cream); overflow: hidden;">
                <div class="modal-header border-0 pb-0 position-relative">
                    <h5 class="modal-title font-display fw-bold text-center w-100 mt-2" id="mapSelectionModalLabel" style="color: var(--gold);">Buka Peta</h5>
                    <button type="button" class="btn-close position-absolute top-0 end-0 m-3" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body p-4 pt-3">
                    <div class="d-grid gap-3">
                        <a href="<?php echo htmlspecialchars($waze_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-pill d-flex align-items-center justify-content-center gap-2" style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <span style="font-size: 1.2rem; line-height: 1;">🚙</span> Waze
                        </a>
                        <a href="<?php echo htmlspecialchars($google_maps_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-pill d-flex align-items-center justify-content-center gap-2" style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <span style="font-size: 1.2rem; line-height: 1;">🗺️</span> Google Maps
                        </a>
                        <a href="<?php echo htmlspecialchars($apple_maps_url); ?>" target="_blank" rel="noopener noreferrer" class="btn btn-pill d-flex align-items-center justify-content-center gap-2" style="background: #fff; border: 1px solid rgba(212, 175, 55, 0.3); color: var(--charcoal); box-shadow: 0 4px 10px rgba(0,0,0,0.05); font-weight: 600;">
                            <span style="font-size: 1.2rem; line-height: 1;">🍎</span> Apple Maps
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer copyright (sentiasa dipaparkan) -->
    <footer class="page-footer" aria-label="Copyright">
        © <?php echo htmlspecialchars(date('Y')); ?> Adib Farhan
    </footer>

    <!-- Data untuk JavaScript (peta & peranti) -->
    <script>
        window.AQIQA_EVENT = {
            googleMapsUrl: <?php echo json_encode($google_maps_url, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            wazeUrl: <?php echo json_encode($waze_url, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            address: <?php echo json_encode($address, JSON_HEX_TAG | JSON_HEX_AMP | JSON_UNESCAPED_UNICODE); ?>,
            hasAudio: <?php echo !empty($nasheed_audio_url) ? 'true' : 'false'; ?>
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="assets/js/script.js"></script>
    <noscript>
        <style>#coverPage{display:none!important}#mainInvitation{display:block!important}[hidden]#mainInvitation{display:block!important}</style>
    </noscript>
</body>
</html>
