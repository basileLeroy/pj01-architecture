// import "../css/admin.css"
import Sortable from 'sortablejs';

// const projects = document.querySelectorAll("#project-item");
const projectsContainer = document.querySelector("#projects-list");

Sortable.create(projectsContainer, {
    animation: 150,
    scroll: true,
});