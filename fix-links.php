<?php

$folder = __DIR__; // current folder

$files = glob($folder . '/*.html');

foreach ($files as $file) {
    $html = file_get_contents($file);

    // Match all <a href="/something"> and replace with <a href="something.html">
    $html = preg_replace_callback(
        '/<a\s+[^>]*href="\/([^\/"]+)"/i',
        function ($matches) {
            return '<a href="' . $matches[1] . '.html"';
        },
        $html
    );

    file_put_contents($file, $html);
    echo "✅ Fixed links in: " . basename($file) . PHP_EOL;
}

echo "🎉 All internal links have been updated.\n";
