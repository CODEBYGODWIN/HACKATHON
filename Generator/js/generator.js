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
    var numLinks = parseInt(prompt('Nombre de liens à ajouter (max 40):'));
    if (!isNaN(numLinks) && numLinks > 0 && numLinks <= 40) {
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
      alert('Veuillez entrer un nombre valide entre 1 et 40.');
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
    var numForms = parseInt(prompt('Nombre de champs à ajouter au formulaire (max 40):'));
    if (!isNaN(numForms) && numForms > 0 && numForms <= 40) {
      formInputs.innerHTML = '';
      for (var i = 0; i < numForms; i++) {
        var formInput = document.createElement('input');
        formInput.type = 'text';
        formInput.name = 'formInput' + (i+1);
        formInput.placeholder = 'Champ ' + (i+1);

        formInputs.appendChild(formInput);
        formInputs.appendChild(document.createElement('br'));
      }
    } else {
      alert('Veuillez entrer un nombre valide entre 1 et 40.');
    }
  });

  var addParagraphbutton = document.getElementById('addParagraph');
  var paragraphInputs = document.getElementById('paragraphInputs');
  var paragraphCounter = 0;

  var paragraphValues = [];

  addParagraphbutton.addEventListener('click', function() {
    var numPara = parseInt(prompt('Nombre de paragraphes à ajouter (max 40):'));
    if (!isNaN(numPara) && numPara > 0 && numPara <= 40) {
      paragraphInputs.innerHTML = '';
      paragraphValues = [];
      for (var i = 0; i < numPara; i++) {
        var paragraphInput = document.createElement('textarea');
        paragraphInput.type = 'text';
        paragraphInput.name = 'paragraphs[]';
        paragraphInput.placeholder = 'Paragraphe ' + (i+1);

        paragraphInputs.appendChild(paragraphInput);
        paragraphInputs.appendChild(document.createElement('br'));
      }
    } else {
      alert('Veuillez entrer un nombre valide entre 1 et 40.');
    }
  });

});
