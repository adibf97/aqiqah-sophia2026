<?php
/**
 * Jana index.html (UTF-8, tanpa BOM) untuk Vercel / hosting statik.
 * Jangan guna PowerShell `php index.php > index.html` — ia sering tulis UTF-16 dan rosakkan < dan teks Arab.
 *
 * Jalankan: php export-static.php
 */
declare(strict_types=1);

$root = __DIR__;
$out  = $root . DIRECTORY_SEPARATOR . 'index.html';

ob_start();
include $root . DIRECTORY_SEPARATOR . 'index.php';
$html = ob_get_clean();

if ($html === '' || $html === false) {
    fwrite(STDERR, "export-static.php: tiada output dari index.php\n");
    exit(1);
}

// Pastikan UTF-8 tulen (tiada BOM)
if (strncmp($html, "\xEF\xBB\xBF", 3) === 0) {
    $html = substr($html, 3);
}

$written = file_put_contents($out, $html, LOCK_EX);
if ($written === false) {
    fwrite(STDERR, "export-static.php: gagal tulis {$out}\n");
    exit(1);
}

echo "OK: wrote {$out} ({$written} bytes)\n";
