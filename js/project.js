document.addEventListener("DOMContentLoaded", loadEventListeners);

function loadEventListeners() {

    const searchInput = document.getElementsByName('search')[0];
    const searchIcon = document.getElementsByClassName('fas')[0];
    const modalElement = document.getElementById('loginModal');
    const modal = new bootstrap.Modal(modalElement);
    const userNameInput = document.getElementById('user_login_name');

    searchInput.addEventListener("keyup", () => {
    
    searchIcon.addEventListener("click", searchSubmit);

    });

    // searchIcon.addEventListener("click", searchSubmit);

    document.querySelector('#login-nav').addEventListener('click', (e) => {
        e.preventDefault();
        modal.show();

        document.getElementById('close-button-modal').addEventListener('click', () => {
            modal.hide();
            modal.dispose();
        });
    
        modalElement.addEventListener('shown.bs.modal', function () {
            userNameInput.focus();
        });
    });
}


function searchSubmit() {
    const searchForm = document.getElementById('page-search'); 
    searchForm.submit();

    searchIcon.removeEventListener("click", searchSubmit);
}





