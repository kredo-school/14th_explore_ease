function addCourseMenu()
{
    // Get the parent element
    const parentElement = document.getElementById('course-menu-parent');

    const addCard = parentElement.children[parentElement.children.length - 1];

    // Create the html elements we want to append to the parent element
    const mainDiv = document.createElement('div');
    mainDiv.classList.add('row', 'mb-3');

    const mainDivFirstChild = document.createElement('div');
    mainDivFirstChild.classList.add('col-3');

    const mainDivSecondChild = document.createElement('div');
    mainDivSecondChild.classList.add('col-9');

    const input = document.createElement('input');
    input.type = "file";
    input.name = "photo";
    
    const textarea = document.createElement('textarea');
    textarea.classList.add('form-control');
    textarea.name = "Course_menu";
    textarea.placeholder = "Description";
    textarea.rows = 4;

    // Remove add card
    parentElement.children[parentElement.children.length - 1].remove();

    // Assebling elements
    mainDivFirstChild.appendChild(input);
    mainDivSecondChild.appendChild(textarea);
    mainDiv.append(mainDivFirstChild, mainDivSecondChild);
    parentElement.append(mainDiv, addCard);
}

window.addCourseMenu = addCourseMenu;