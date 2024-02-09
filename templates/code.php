<?php
// Fonction pour extraire uniquement le code HTML et CSS de la page générée
function extractHtmlAndCss($htmlContent) {
    // Recherche de la balise d'ouverture <style> et de fermeture </style>
    $start = strpos($htmlContent, '<style>');
    $end = strpos($htmlContent, '</style>', $start);
    
    // Si les balises sont trouvées
    if ($start !== false && $end !== false) {
        // Extraire le contenu CSS entre les balises
        $cssContent = substr($htmlContent, $start + strlen('<style>'), $end - $start - strlen('<style>'));
        
        // Supprimer le contenu CSS de la page générée
        $htmlContent = str_replace('<style>' . $cssContent . '</style>', '', $htmlContent);
        
        // Retourner le HTML et le CSS
        return array('html' => $htmlContent, 'css' => $cssContent);
    }
    
    // Si les balises ne sont pas trouvées, retourner le HTML complet
    return array('html' => $htmlContent, 'css' => '');
}

// Extraire le HTML et le CSS de la page générée
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
