let titre = document.querySelector('.titre');
let titreChoix = document.querySelector('.titreChoix');

let theme = document.querySelector('.theme');
let themeChoix = document.querySelector('.themeChoix');

let content = document.querySelector('.content');
let contentChoix = document.querySelector('.contentChoix');

let color = document.querySelector('.color');
let colorChoix = document.querySelector('.colorChoix');


titre.addEventListener('click', () => {
   if (titreChoix.style.display == 'block') {
       titreChoix.style.display = 'none';
   } else {
         titreChoix.style.display = 'block';
    }
}
);

theme.addEventListener('click', () => {
    if (themeChoix.style.display == 'block') {
        themeChoix.style.display = 'none';
    }
    else {
        themeChoix.style.display = 'block';
    }
}
);

content.addEventListener('click', () => {
    if (contentChoix.style.display == 'block') {
        contentChoix.style.display = 'none';
    }
    else {
        contentChoix.style.display = 'block';
    }
}
);

color.addEventListener('click', () => {
    if (colorChoix.style.display == 'block') {
        colorChoix.style.display = 'none';
    }
    else {
        colorChoix.style.display = 'block';
    }
}
);

