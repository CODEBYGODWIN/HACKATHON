// generator.js
document.addEventListener('DOMContentLoaded', function () {
    const siteLink = document.getElementById('siteLink');
    const linkInput = document.getElementById('linkInput');

    siteLink.addEventListener('change', function () {
        if (siteLink.value === 'yes') {
            linkInput.style.display = 'inline-block';
        } else {
            linkInput.style.display = 'none';
        }
    });

    const siteForm = document.getElementById('siteForm');
    siteForm.addEventListener('submit', function (event) {
        event.preventDefault();
        generateWebsite();
    });

    function generateWebsite() {
        const siteName = document.getElementById('siteName').value;
        const siteContent = document.getElementById('siteContent').value;
        const siteBackgroundFile = document.getElementById('siteBackgroundFile').files[0];
        const siteBackgroundColor = document.getElementById('siteBackgroundColor').value;
        const siteLinkValue = siteLink.value;
        const linkInputValue = linkInput.value;

        // Code pour générer la page web ici
        const generatedPage = `
            <!DOCTYPE html>
            <html lang="fr">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <title>${siteName}</title>
                <style>
                    body {
                        background: ${siteBackgroundFile ? `url(${URL.createObjectURL(siteBackgroundFile)})` : siteBackgroundColor};
                        background-size: cover;
                        font-family: Arial, sans-serif;
                    }
                    .content {
                        text-align: center;
                        padding: 50px;
                    }
                </style>
            </head>
            <body>
                <h1>${siteName}</h1>
                <div class="content">${siteContent}</div>
                ${siteLinkValue === 'yes' ? `<a href="${linkInputValue}" class="button">Cliquez ici</a>` : ''}
                <a href="download.php" class="button">Télécharger le code source</a>
            </body>
            </html>
        `;
        
        // Créer un fichier HTML téléchargeable
        const blob = new Blob([generatedPage], { type: 'text/html' });
        const link = document.createElement('a');
        link.href = URL.createObjectURL(blob);
        link.download = 'generated.html';
        link.click();
    }
});
