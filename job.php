<?php
$lockFile = 'script.lock';

// Überprüfen, ob das Skript bereits ausgeführt wird
if (file_exists($lockFile)) {
    die("Das Skript wird bereits ausgeführt");
}

// Hallo 2
// Sperren der Datei für andere Skripte
$handle = fopen($lockFile, 'w');
if (!flock($handle, LOCK_EX | LOCK_NB)) {
    die("Das Skript wird bereits ausgeführt");
}

// Hier kannst du den Code deines Skripts einfügen
// ...

// Freigeben der Sperre und Schließen der Datei
flock($handle, LOCK_UN);
fclose($handle);
unlink($lockFile);
?>