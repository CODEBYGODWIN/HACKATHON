<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($_POST['siteName']) ? $_POST['siteName'] : 'Site Généré'; ?></title>
<style>
  body {
    margin: 0;
    padding: 0;
    background: <?php echo $_POST['siteBackgroundColor']; ?>;
    font-family: <?php echo $_POST['siteFont']; ?>, sans-serif; /* Utilisation de la police choisie */
    color : <?php echo $_POST['sitePoliceColor']; ?>;
  }

  #content {
    text-align: center;
    margin-top: 20px;
  }

  .button-links {
    text-align: center;
    margin-top: 20px;
  }

  .button-links a {
    display: inline-block;
    margin: 5px;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    text-decoration: none;
  }


  .form-field {
    margin-bottom: 10px;
  }

  .form-field label {
    display: block;
  }

  .form-field input[type="text"] {
    width: 100%;
    box-sizing: border-box;
  }
  
  #submitBtn {
    display: <?php echo isset($_POST['addForm']) && $_POST['addForm'] == 'yes' ? 'block' : 'none'; ?>;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #333;
    color: #fff;
    border: none;
    cursor: pointer;
  }
</style>
</head>
<body>
  <div id="content">
    <h1><?php echo isset($_POST['siteName']) ? $_POST['siteName'] : 'Site Généré'; ?></h1>
    <p><?php echo isset($_POST['siteContent']) ? $_POST['siteContent'] : ''; ?></p>

  </div>

  <?php
  if (isset($_POST['addLinks']) && $_POST['addLinks'] == 'yes') {
    echo '<div class="button-links">';
    for ($i = 1; $i <= 5; $i++) {
      if (!empty($_POST['link'.$i])) {
        echo '<a href="'.$_POST['link'.$i].'" target="_blank">'.$_POST['buttonName'.$i].'</a>';
      }
    }
    echo '</div>';
  }

  if (isset($_POST['addForm']) && $_POST['addForm'] == 'yes') {
    echo '<form>';
    for ($i = 1; $i <= 5; $i++) {
      if (!empty($_POST['formInput'.$i])) {
        echo '<div class="form-field">';
        echo '<label for="formInput'.$i.'">'.$_POST['formInput'.$i].':</label>';
        echo '<input type="text" id="formInput'.$i.'" name="formInput'.$i.'" placeholder="'.$_POST['formInput'.$i].'">';
        echo '</div>';
      }
    }
    echo '<button type="submit" id="submitBtn">Envoyer</button>'; // Bouton d'envoi du formulaire
    echo '</form>';
  }
  ?>


  <div class="button-links">
    <a href="code.php" target="_blank">Voir le code source</a>
    <a href="generator.html" target="_blank">Créer une nouvelle page</a>
  </div>
</body>
</html>