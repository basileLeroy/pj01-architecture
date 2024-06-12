import Sortable from 'sortablejs';

// const projects = document.querySelectorAll("#project-item");
const projectsContainer = document.querySelector("#projects-list");
const projectGalleryContainer = document.querySelector("#project-gallery");
const wordsContainer = document.querySelector("#words-list");

if (projectsContainer !== null) {
    Sortable.create(projectsContainer, {
        animation: 150,
        scroll: true,
    });
}

if (projectGalleryContainer !== null) {
    Sortable.create(projectGalleryContainer, {
        animation: 150,
        scroll: true,
    });
}

if (wordsContainer !== null) {
    Sortable.create(wordsContainer, {
        animation: 150,
        scroll: true,
    });
}


