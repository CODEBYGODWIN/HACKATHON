let titre = document.querySelector('.titre');
let titreChoix = document.querySelector('.titreChoix');

let theme = document.querySelector('.theme');
let themeChoix = document.querySelector('.themeChoix');

let description = document.querySelector('.description');
let descriptionChoix = document.querySelector('.descriptionChoix');

let color = document.querySelector('.color');
let colorChoix = document.querySelector('.colorChoix');


titre.addEventListener('click', () => {
    titreChoix.style.display = 'block';
}
);

theme.addEventListener('click', () => {
    themeChoix.style.display = 'block';
}
);

description.addEventListener('click', () => {
    descriptionChoix.style.display = 'block';
}
);

color.addEventListener('click', () => {
    colorChoix.style.display = 'block';
}
);

