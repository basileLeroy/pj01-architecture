import "../css/admin.css"

const projects = document.querySelectorAll("#project-item");
const projectsContainer = document.querySelector("#projects-list");

projects.forEach(project => {
    project.addEventListener('dragstart', () => {
        project.classList.add("dragging")
    })
    project.addEventListener('dragend', () => {
        project.classList.remove("dragging")
    })
})

projectsContainer.addEventListener("dragover", e => {
    e.preventDefault();
    const afterElement = getDragAfterElement(projectsContainer, e.clientX ,e.clientY)
    const draggedItem = document.querySelector(".dragging");

    if (afterElement == null) {
        projectsContainer.appendChild(draggedItem)
    } else {
        projectsContainer.insertBefore(draggedItem, afterElement)
    }
})

// const getDragAfterElement = (container, mousePosX, mousePosY) => {
//     // spreading out node list to array with all elements that are not being dragged
//     const notDraggedElementsList = [... container.querySelectorAll('#project-item:not(.dragging)')]

//     return notDraggedElementsList.reduce((closest, child) => {
//         const box = child.getBoundingClientRect();
//         const offsetX = mousePosX - (box.left + box.width / 2);
//         const offsetY = mousePosY - (box.top + box.height / 2);
//         const distance = Math.sqrt(offsetX ** 2 + offsetY ** 2);
    
//         if (distance < closest.distance) {
//             return { element: child, distance: distance, offsetX: offsetX, offsetY: offsetY };
//         } else {
//             return closest;
//         }
//     }, { element: null, distance: Number.POSITIVE_INFINITY, offsetX: 0, offsetY: 0 }).element;
// }

const getDragAfterElement = (container, mousePosX, mousePosY) => {
    // spreading out node list to array with all elements that are not being dragged
    const notDraggedElementsList = [...container.querySelectorAll('#project-item:not(.dragging)')];

    // Check each not dragged element and its siblings
    const hoverElement = notDraggedElementsList.find(child => {
        const box = child.getBoundingClientRect();
        return (
            mousePosX >= box.left &&
            mousePosX <= box.right &&
            mousePosY >= box.top &&
            mousePosY <= box.bottom
        );
    });

    return hoverElement;
}