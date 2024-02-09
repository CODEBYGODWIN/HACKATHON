<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo isset($_POST['siteName']) ? $_POST['siteName'] : 'Site Généré'; ?></title>
<link rel="icon" href="">
<style>
  body {

    margin: 40px;
    padding: 0;
    background: <?php echo $_POST['siteBackgroundColor']; ?>;
    font-family: <?php echo $_POST['siteFont']; ?>, sans-serif;
    color : <?php echo $_POST['sitePoliceColor']; ?>;

    max-height: 100vh;
  }



  h1{
    text-align: center;
  }

    h2{
      color:black;
    }
main{
  flex:1;
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
    border-radius: 20px;
    padding:5px;

  }



  .button-links {
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    text-align: center;
    flex-wrap: wrap;
    margin-top: 20px;
  }

  .urlButton {
    margin: 5px;
    color: #fff;
    text-decoration: none;
    border: 2px solid #24b4fb;
    background-color: #24b4fb;
    border-radius: 0.9em;
    padding: 0.8em 1.2em 0.8em 1em;
    transition: all ease-in-out 0.5s;
    font-size: 15px;
    width: 20%;
    cursor: pointer;

  }

  .urlButton:hover{
    background-color: #0071e2;
    color: white;
  }




.addFormButton {
  display: <?php echo isset($_POST['addForm']) && $_POST['addForm'] == 'yes' ? 'block' : 'none'; ?>;
  border: 2px solid #24b4fb;
  background-color: #24b4fb;
  border-radius: 0.9em;
  padding: 0.8em 1.2em 0.8em 1em;
  transition: all ease-in-out 0.5s;
  font-size: 15px;
  width: 50%;
  cursor: pointer;

}


.addFormButton:hover{
  background-color: #0071e2;
  color: white;
}







.codeAndBack{
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding-bottom: 50px;
  padding-top: 50px;
}



.code,
.back {
  color: black;
  text-decoration: none;
  border: 2px solid purple;
  background-color: purple;
  border-radius: 0.9em;
  padding: 10px 12px;
  transition: all ease-in-out 0.5s;
  font-size: 10px;
  cursor: pointer;
}

.code:hover,
.back:hover{
  background-color: rgb(205, 5, 205);
  color: white;


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





      // Bouton lien 

      if (isset($_POST['addLinks']) && $_POST['addLinks'] == 'yes') {
        echo '<div class="button-links">';
        for ($i = 1; $i <= 5; $i++) {
          if (!empty($_POST['link'.$i])) {
            echo '<a class="urlButton" href="'.$_POST['link'.$i].'" target="_blank">'.$_POST['buttonName'.$i].'</a>';
          }
        }
        echo '</div>';
      }


      // Formulaire 
      if (isset($_POST['addForm']) && $_POST['addForm'] == 'yes') {
        echo '<div class="div_form">';
        echo '<form clsass="form">';
        echo    '<h2 class="title">Formulaire </h2>';

        for ($i = 1; $i <= 5; $i++) {
          if (!empty($_POST['formInput'.$i])) {
            echo '<div class="form-field">';
            echo   '<label>';
            echo      '<input type="text" id="formInput'.$i.'" name="formInput'.$i.'" placeholder="'.$_POST['formInput'.$i].'" class="input">';
            echo   '</label>';
            echo '</div>';
          }
        }
        echo '<button class="addFormButton type="submit" id="submitBtn">Envoyer</button>';// Bouton d'envoi du formulaire
        echo '</form>';
      }
      echo '</div>';

      ?>
  </main>

  <!-- bouton pour voir code et retour a la page generator  -->
  <footer class=" codeAndBack">
    <a class="code" href="code.php" target="_blank">Voir le code source</a>
    <a class="back" href="generator.html" target="_blank">Créer une nouvelle page</a>
  </footer>
</body>
</html>
