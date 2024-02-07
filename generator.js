document.addEventListener('DOMContentLoaded', function() {
  var addLinkButton = document.getElementById('addLinkButton');
  var linkInputs = document.getElementById('linkInputs');

  document.getElementById('yes').addEventListener('click', function() {
    addLinkButton.style.display = 'block';
    linkInputs.innerHTML = '';
  });

  document.getElementById('no').addEventListener('click', function() {
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
