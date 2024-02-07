let code = document.querySelector('#textToCopy');
let button = document.querySelector('#copyButton');


button.addEventListener('click', () => {
    code.select();
    document.execCommand('copy'),
    button.innerText = 'Copié!';
}
);

