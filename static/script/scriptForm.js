let title = document.querySelector('.title');
let titleChoice = document.querySelector('.titleChoice');

let theme = document.querySelector('.theme');
let themeChoice = document.querySelector('.themeChoice');

let content = document.querySelector('.content');
let contentChoice = document.querySelector('.contentChoice');

let color = document.querySelector('.color');
let colorChoice = document.querySelector('.colorChoice');

let link = document.querySelector('.link');
let linkChoice = document.querySelector('.linkChoice');


title.addEventListener('click', () => {
   if (titleChoice.style.display == 'block') {
       titleChoice.style.display = 'none';
   } else {
         titleChoice.style.display = 'block';
    }
}
);

theme.addEventListener('click', () => {
    if (themeChoice.style.display == 'block') {
        themeChoice.style.display = 'none';
    }
    else {
        themeChoice.style.display = 'block';
    }
}
);

content.addEventListener('click', () => {
    if (contentChoice.style.display == 'block') {
        contentChoice.style.display = 'none';
    }
    else {
        contentChoice.style.display = 'block';
    }
}
);

color.addEventListener('click', () => {
    if (colorChoice.style.display == 'block') {
        colorChoice.style.display = 'none';
    }
    else {
        colorChoice.style.display = 'block';
    }
}
);


link.addEventListener('click', () => {
    if (linkChoice.style.display == 'block') {
        linkChoice.style.display = 'none';
    }
    else {
        linkChoice.style.display = 'block';
    }
}
);

