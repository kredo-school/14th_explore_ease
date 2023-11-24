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
    let numberOfCourses = document.querySelectorAll('.course-name').length;
    const input = document.createElement('input');
    input.type = "file";
    input.name = "course_photo" + (numberOfCourses+1);
    
    const courseName = document.createElement('input');
    courseName.type = "text";
    courseName.classList.add('form-control', 'course-name');
    courseName.name = "course_name" + (numberOfCourses+1);
    courseName.placeholder = "Course Name";

    const textarea = document.createElement('textarea');
    textarea.classList.add('form-control');
    textarea.name = "course_description" + (numberOfCourses+1);
    textarea.placeholder = "Description";
    textarea.rows = 4;

    // Remove add card
    parentElement.children[parentElement.children.length - 1].remove();

    // Assebling elements
    mainDivFirstChild.appendChild(input);
    mainDivSecondChild.appendChild(courseName);
    mainDivSecondChild.appendChild(textarea);
    mainDiv.append(mainDivFirstChild, mainDivSecondChild);
    parentElement.append(mainDiv, addCard);
}

window.addCourseMenu = addCourseMenu;