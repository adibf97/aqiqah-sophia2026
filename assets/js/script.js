/**
 * Kad Jemputan — navigasi peta, kalendar, kira detik, salin alamat, scroll
 */
(function () {
    'use strict';

    var cfg = window.AQIQA_EVENT || {};

    /**
     * Kenal pasti peranti mudah alih (ringkas)
     */
    function isMobileDevice() {
        return /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(
            navigator.userAgent
        );
    }

    /**
     * Buka Waze pada mudah alih, Google Maps pada desktop / fallback
     */
    function openMapsNavigation() {
        var waze = cfg.wazeUrl;
        var gmaps = cfg.googleMapsUrl;

        if (isMobileDevice() && waze) {
            window.location.href = waze;
        } else if (gmaps) {
            window.open(gmaps, '_blank', 'noopener,noreferrer');
        }
    }

    function bindMapButtons() {
        // Logik lama telah digantikan dengan Bootstrap Modal (data-bs-toggle="modal")
        // Fungsi ini dikekalkan kosong jika ada butang lain yang perlukan logik manual
    }

    /**
     * Salin alamat ke papan keratan
     */
    function bindCopyAddress() {
        var btn = document.getElementById('btnCopyAddress');
        var feedback = document.getElementById('copyFeedback');
        if (!btn) return;

        btn.addEventListener('click', function () {
            var text = btn.getAttribute('data-address') || cfg.address || '';

            function showMsg(msg) {
                if (feedback) {
                    feedback.textContent = msg;
                    setTimeout(function () {
                        feedback.textContent = '';
                    }, 2800);
                }
            }

            if (navigator.clipboard && navigator.clipboard.writeText) {
                navigator.clipboard.writeText(text).then(
                    function () {
                        showMsg('Alamat disalin.');
                    },
                    function () {
                        fallbackCopy(text, showMsg);
                    }
                );
            } else {
                fallbackCopy(text, showMsg);
            }
        });
    }

    function fallbackCopy(text, showMsg) {
        var ta = document.createElement('textarea');
        ta.value = text;
        ta.setAttribute('readonly', '');
        ta.style.position = 'fixed';
        ta.style.left = '-9999px';
        document.body.appendChild(ta);
        ta.select();
        try {
            document.execCommand('copy');
            showMsg('Alamat disalin.');
        } catch (e) {
            showMsg('Salin manual: ' + text);
        }
        document.body.removeChild(ta);
    }

    /**
     * Tambah ke kalendar — fail .ics (serasi Apple, Google import, dll.)
     */
    function pad(n) {
        return n < 10 ? '0' + n : String(n);
    }

    function formatIcsDate(d) {
        return (
            d.getUTCFullYear() +
            pad(d.getUTCMonth() + 1) +
            pad(d.getUTCDate()) +
            'T' +
            pad(d.getUTCHours()) +
            pad(d.getUTCMinutes()) +
            pad(d.getUTCSeconds()) +
            'Z'
        );
    }

    function bindAddToCalendar() {
        var link = document.getElementById('btnAddCalendar');
        if (!link) return;

        link.addEventListener('click', function (e) {
            e.preventDefault();

            var title = link.getAttribute('data-cal-title') || 'Majlis Aqiqah';
            var startStr = link.getAttribute('data-cal-start');
            var endStr = link.getAttribute('data-cal-end');
            var loc = link.getAttribute('data-cal-location') || '';
            var details = link.getAttribute('data-cal-details') || '';

            if (!startStr || !endStr) return;

            var start = new Date(startStr);
            var end = new Date(endStr);

            if (isNaN(start.getTime()) || isNaN(end.getTime())) return;

            var dtStamp = formatIcsDate(new Date());
            var dtStart = formatIcsDate(start);
            var dtEnd = formatIcsDate(end);

            var ics = [
                'BEGIN:VCALENDAR',
                'VERSION:2.0',
                'PRODID:-//Aqiqah Invitation//EN',
                'CALSCALE:GREGORIAN',
                'METHOD:PUBLISH',
                'BEGIN:VEVENT',
                'UID:' + dtStamp + '-aqiqah@invitation',
                'DTSTAMP:' + dtStamp,
                'DTSTART:' + dtStart,
                'DTEND:' + dtEnd,
                'SUMMARY:' + escapeIcsText(title),
                'DESCRIPTION:' + escapeIcsText(details),
                'LOCATION:' + escapeIcsText(loc),
                'END:VEVENT',
                'END:VCALENDAR'
            ].join('\r\n');

            var blob = new Blob([ics], { type: 'text/calendar;charset=utf-8' });
            var url = URL.createObjectURL(blob);
            var a = document.createElement('a');
            a.href = url;
            a.download = 'majlis-aqiqah-aurora-sophia.ics';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
            URL.revokeObjectURL(url);
        });
    }

    function escapeIcsText(s) {
        if (!s) return '';
        return String(s)
            .replace(/\\/g, '\\\\')
            .replace(/;/g, '\\;')
            .replace(/,/g, '\\,')
            .replace(/\n/g, '\\n');
    }

    /**
     * Kiraan detik ke tarikh majlis
     */
    function bindCountdown() {
        var section = document.getElementById('countdownSection');
        if (!section) return;

        var iso = section.getAttribute('data-event-datetime');
        if (!iso) return;

        var target = new Date(iso);
        if (isNaN(target.getTime())) return;

        var elDays = document.getElementById('cd-days');
        var elHours = document.getElementById('cd-hours');
        var elMins = document.getElementById('cd-mins');
        var elSecs = document.getElementById('cd-secs');
        var done = document.getElementById('countdownDone');
        var container = document.getElementById('countdown');

        function tick() {
            var now = new Date().getTime();
            var diff = target - now;

            if (diff <= 0) {
                if (container) container.classList.add('d-none');
                if (done) done.classList.remove('d-none');
                return;
            }

            var s = Math.floor(diff / 1000);
            var days = Math.floor(s / 86400);
            var hours = Math.floor((s % 86400) / 3600);
            var mins = Math.floor((s % 3600) / 60);
            var secs = s % 60;

            if (elDays) elDays.textContent = pad2(days);
            if (elHours) elHours.textContent = pad2(hours);
            if (elMins) elMins.textContent = pad2(mins);
            if (elSecs) elSecs.textContent = pad2(secs);
        }

        function pad2(n) {
            return n < 10 ? '0' + n : String(n);
        }

        tick();
        setInterval(tick, 1000);
    }

    /**
     * Audio main / jeda (jika elemen wujud)
     */
    function bindAudio() {
        if (!cfg.hasAudio) return;

        var btn = document.getElementById('btnAudioToggle');
        var audio = document.getElementById('bgAudio');
        var icon = document.getElementById('audioIcon');
        if (!btn || !audio) return;

        btn.addEventListener('click', function () {
            if (audio.paused) {
                audio.play().catch(function () { });
                btn.setAttribute('aria-pressed', 'true');
                if (icon) icon.textContent = '❚❚';
            } else {
                audio.pause();
                btn.setAttribute('aria-pressed', 'false');
                if (icon) icon.textContent = '▶';
            }
        });
    }

    /**
     * Animasi apabila skrol (Intersection Observer)
     * @param {string} [rootSelector] - contoh '#mainInvitation' jika skop hanya dalam kontena itu
     */
    function bindScrollReveal(rootSelector) {
        var root = rootSelector ? document.querySelector(rootSelector) : document;
        if (!root) return;

        var nodes = root.querySelectorAll('.reveal-on-scroll[data-reveal]');
        if (!nodes.length) return;

        if (!('IntersectionObserver' in window)) {
            nodes.forEach(function (el) {
                el.classList.add('is-visible');
            });
            return;
        }

        var io = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            },
            { root: null, rootMargin: '0px 0px -8% 0px', threshold: 0.1 }
        );

        nodes.forEach(function (el) {
            io.observe(el);
        });
    }

    /**
     * Halaman depan → klik "Buka Jemputan" → papar kad penuh
     */
    function bindCoverReveal() {
        var cover = document.getElementById('coverPage');
        var btn = document.getElementById('btnOpenInvitation');
        var main = document.getElementById('mainInvitation');
        if (!cover || !btn || !main) return;

        var reducedMotion =
            window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

        function showMainContent() {
            cover.style.display = 'none';
            cover.setAttribute('aria-hidden', 'true');
            document.body.classList.remove('cover-active');
            main.removeAttribute('hidden');
            window.scrollTo(0, 0);
            try {
                main.focus();
            } catch (e) { }

            bindScrollReveal('#mainInvitation');

            // Autoplay audio when cover is opened
            if (cfg.hasAudio) {
                var audio = document.getElementById('bgAudio');
                var btnAudio = document.getElementById('btnAudioToggle');
                var icon = document.getElementById('audioIcon');
                if (audio) {
                    audio.play().then(function () {
                        if (btnAudio) btnAudio.setAttribute('aria-pressed', 'true');
                        if (icon) icon.textContent = '❚❚';
                    }).catch(function (e) {
                        console.log("Autoplay prevented by browser:", e);
                    });
                }
            }
        }

        btn.addEventListener('click', function () {
            var finished = false;

            function finishOnce() {
                if (finished) return;
                finished = true;
                showMainContent();
            }

            if (reducedMotion) {
                cover.classList.add('is-leaving');
                finishOnce();
                return;
            }

            cover.classList.add('is-leaving');

            function onCoverAnimEnd(ev) {
                if (ev.animationName !== 'coverExit') return;
                cover.removeEventListener('animationend', onCoverAnimEnd);
                finishOnce();
            }

            cover.addEventListener('animationend', onCoverAnimEnd);
            window.setTimeout(function () {
                cover.removeEventListener('animationend', onCoverAnimEnd);
                finishOnce();
            }, 700);
        });
    }

    function init() {
        bindMapButtons();
        bindCopyAddress();
        bindAddToCalendar();
        bindCountdown();
        bindAudio();

        if (document.body.classList.contains('cover-active')) {
            bindCoverReveal();
        } else {
            bindScrollReveal();
        }
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }
})();
