<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($_POST['siteName']) ? $_POST['siteName'] : 'Site Généré'; ?></title>
<style>
  body {
    margin: 40px;
    padding: 0;
    background: <?php echo $_POST['siteBackgroundColor']; ?>;
    font-family: <?php echo $_POST['siteFont']; ?>, sans-serif;
    color : <?php echo $_POST['sitePoliceColor']; ?>;

    min-height: 100vh;
  }



  h1{
    text-align: center;
  }

main{
  flex:1;
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






.div_form{
  display: flex;
  align-items: center;
  flex-direction: column; 
}





  form {
    display: flex;
    flex-direction: column; 
    width: 450px; 

    background-color:white ;
    border: 2px solid grey;
    border-radius: 20px;
    padding:20px;
    margin-top: 20px;


  }

  .form-field {
    margin-bottom: 10px;
    width: 400px;

  }

  .form-field label {
    display: block;
    text-align: center; 

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

.codeAndBack{
  display: flex;
  align-items: center;
  justify-content: space-between;
  bottom: 50px;


}



  .code{
    /* position: absolute;
    bottom: 50px;
    left: 150px;
    transform: translate(-50%, -50%); */

  }

  .back{
    /* position: absolute;
    bottom: 50px;
    right: 0.1px;
    transform: translate(-50%, -50%); */
}




</style>
</head>
<body>

  <!-- Titre et paragraphe -->
  <div id="content">
    <h1><?php echo isset($_POST['siteName']) ? $_POST['siteName'] : 'Site Généré'; ?></h1>
    <main>
    <p><?php echo isset($_POST['siteContent']) ? $_POST['siteContent'] : ''; ?></p>
    <?php
      if(isset($_POST['paragraphs']) && is_array($_POST['paragraphs'])) {
        echo '<div id="paragraphs">';
        foreach($_POST['paragraphs'] as $paragraph) {
          echo "<p>$paragraph</p>";
        }
        echo '</div>';
      }
  echo  '</div>';




  // Bouton lien 

  if (isset($_POST['addLinks']) && $_POST['addLinks'] == 'yes') {
    echo '<div class="button-links">';
    for ($i = 1; $i <= 5; $i++) {
      if (!empty($_POST['link'.$i])) {
        echo '<a href="'.$_POST['link'.$i].'" target="_blank">'.$_POST['buttonName'.$i].'</a>';
      }
    }
    echo '</div>';
  }


  // Formulaire 
  if (isset($_POST['addForm']) && $_POST['addForm'] == 'yes') {
    echo '<div class="div_form">';
    echo '<form clsass="form">';
    echo    '<h2 class="title">Register </h2>';

    for ($i = 1; $i <= 5; $i++) {
      if (!empty($_POST['formInput'.$i])) {
        echo '<div class="form-field">';
        // echo '<label for="formInput'.$i.'">'.$_POST['formInput'.$i].':</label>';
        echo   '<label>';
        echo      '<input type="text" id="formInput'.$i.'" name="formInput'.$i.'" placeholder="'.$_POST['formInput'.$i].'" class="input">';
        echo   '</label>';
        echo '</div>';
      }
    }
    echo '<button type="submit" id="submitBtn">Envoyer</button>'; // Bouton d'envoi du formulaire
    echo '</form>';
  }
  echo '</div>';
  echo '</main>'
  ?>


  <!-- bouton pour voir code et retour a la page generator  -->
  <footer class="button-links codeAndBack">
    <a class="code" href="code.php" target="_blank">Voir le code source</a>
    <a class="back" href="generator.html" target="_blank">Créer une nouvelle page</a>
  </footer>
</body>
</html>
