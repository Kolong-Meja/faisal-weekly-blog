window.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('feedback__form');
    const feedbackModal = document.getElementById("feedback__modal"); 
    const errorModal = document.getElementById("error__modal");

    form.addEventListener('submit', function(event) {
        event.preventDefault();
    
        let url = this.action;
        let formData = new FormData(this);
        let xhr = new XMLHttpRequest();

        xhr.open('POST', url);
        xhr.responseType = 'json';
        xhr.addEventListener('load', function() {
            if (xhr.status === 200) {
                form.reset();
                feedbackModal.checked = true;
            } else {
                form.reset();
                errorModal.checked = true;
            }
        });
        xhr.addEventListener('error', function() {
            alert("Error submitting feedback. Please try again later.");
        });
        xhr.send(formData);
    });
});