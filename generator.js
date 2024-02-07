document.addEventListener('DOMContentLoaded', function() {
  var addLinkButton = document.getElementById('addLinkButton');
  var linkInputs = document.getElementById('linkInputs');

  document.getElementById('yesLink').addEventListener('click', function() {
    addLinkButton.style.display = 'block';
    linkInputs.innerHTML = '';
  });

  document.getElementById('noLink').addEventListener('click', function() {
    addLinkButton.style.display = 'none';
    linkInputs.innerHTML = '';
  });

  addLinkButton.addEventListener('click', function() {
    var numLinks = parseInt(prompt('Nombre de liens à ajouter (max 5):'));
    if (!isNaN(numLinks) && numLinks > 0 && numLinks <= 5) {
      linkInputs.innerHTML = '';
      for (var i = 0; i < numLinks; i++) {
        var linkInput = document.createElement('input');
        linkInput.type = 'text';
        linkInput.name = 'link' + (i+1);
        linkInput.placeholder = 'Lien ' + (i+1);

        var nameInput = document.createElement('input');
        nameInput.type = 'text';
        nameInput.name = 'buttonName' + (i+1);
        nameInput.placeholder = 'Nom du bouton ' + (i+1);

        linkInputs.appendChild(linkInput);
        linkInputs.appendChild(nameInput);
        linkInputs.appendChild(document.createElement('br'));
      }
    } else {
      alert('Veuillez entrer un nombre valide entre 1 et 5.');
    }
  });
});


document.addEventListener('DOMContentLoaded', function() {
  var addFormButton = document.getElementById('addFormButton');
  var formInputs = document.getElementById('formInputs');

  document.getElementById('yesForm').addEventListener('click', function() {
    addFormButton.style.display = 'block';
    formInputs.innerHTML = '';
  });

  document.getElementById('noForm').addEventListener('click', function() {
    addFormButton.style.display = 'none';
    formInputs.innerHTML = '';
  });

  addFormButton.addEventListener('click', function() {
    var numForms = parseInt(prompt('Nombre de champs à ajouter au formulaire (max 5):'));
    if (!isNaN(numForms) && numForms > 0 && numForms <= 5) {
      formInputs.innerHTML = '';
      for (var i = 0; i < numForms; i++) {
        var formInput = document.createElement('input');
        formInput.type = 'text';
        formInput.placeholder = 'Champ ' + (i+1);

        formInputs.appendChild(formInput);
        formInputs.appendChild(document.createElement('br'));
      }
    } else {
      alert('Veuillez entrer un nombre valide entre 1 et 5.');
    }
  });

});