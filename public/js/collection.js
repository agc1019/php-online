function redirectToPage(url) {
  window.location.href = url;
}

document.addEventListener('DOMContentLoaded', function() {
    const addTitleModal = new bootstrap.Modal(document.getElementById('addTitle'));
    const titleSavedModal = new bootstrap.Modal(document.getElementById('title-saved-popup'));
  
    // Form submission handling for addTitleModal
    const addTitleForm = document.querySelector('#addTitle form');
  
    addTitleForm.addEventListener('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
  
        if (addTitleForm.checkValidity()) {
            // Form is valid, proceed to hide addTitle modal
            addTitleModal.hide();
            titleSavedModal.show();
              AddTitle(titleSavedModal);
            // Simulate saving process with timeout (adjust as needed)
        } else {
            // Form is invalid, show validation feedback
            addTitleForm.classList.add('was-validated');
        }
    });
  
    // Close button for titleSavedModal
    document.getElementById('exit-saved').addEventListener('click', function() {
        titleSavedModal.hide();
    });
  
    // Remove modal backdrop on hide
    titleSavedModal._element.addEventListener('hidden.bs.modal', function () {
        document.querySelector('.modal-backdrop').remove();
    });
  });
