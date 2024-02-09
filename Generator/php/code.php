<?php

function extractHtmlAndCss($htmlContent) {
    $start = strpos($htmlContent, '<style>');
    $end = strpos($htmlContent, '</style>', $start);

    if ($start !== false && $end !== false) {
        $cssContent = substr($htmlContent, $start + strlen('<style>'), $end - $start - strlen('<style>'));
        $htmlContent = str_replace('<style>' . $cssContent . '</style>', '', $htmlContent);
        return array('html' => $htmlContent, 'css' => $cssContent);
    }

    return array('html' => $htmlContent, 'css' => '');
}

$htmlAndCss = extractHtmlAndCss(file_get_contents('generated_site.php'));
$htmlContent = $htmlAndCss['html'];
$cssContent = $htmlAndCss['css'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Source</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }

        #codeContainer {
            margin-bottom: 20px;
        }

        textarea {
            width: 100%;
            height: 300px;
        }

        .copyButton {
            margin-top: 10px;
            display: block;
            padding: 5px 10px;
            background-color: #333;
            color: #fff;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Code Source</h1>

    <div id="codeContainer">
        <h2>Code HTML</h2>
        <textarea readonly><?php echo htmlentities($htmlContent); ?></textarea>
        <button class="copyButton" id="copyHtmlButton">Copier le code HTML</button>
    </div>

    <div id="codeContainer">
        <h2>Code CSS</h2>
        <textarea readonly><?php echo htmlentities($cssContent); ?></textarea>
        <button class="copyButton" id="copyCssButton">Copier le code CSS</button>
    </div>

    <script>
        document.getElementById('copyHtmlButton').addEventListener('click', function() {
            var htmlTextarea = document.querySelectorAll('textarea')[0];
            htmlTextarea.select();
            document.execCommand('copy');
            alert('Le code HTML a été copié dans le presse-papiers.');
        });

        document.getElementById('copyCssButton').addEventListener('click', function() {
            var cssTextarea = document.querySelectorAll('textarea')[1];
            cssTextarea.select();
            document.execCommand('copy');
            alert('Le code CSS a été copié dans le presse-papiers.');
        });
    </script>
</body>
</html>
