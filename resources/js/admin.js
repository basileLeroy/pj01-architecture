// import "../css/admin.css"
import Sortable from 'sortablejs';

// Sortable.mount(new AutoScroll());


// const projects = document.querySelectorAll("#project-item");
const projectsContainer = document.querySelector("#projects-list");

Sortable.create(projectsContainer, {
    animation: 150,
    
});