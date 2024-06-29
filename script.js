document.addEventListener('DOMContentLoaded', () => {
    const modal = document.getElementById("contactModal");
    const btn = document.getElementById("openModal");
    const span = document.getElementsByClassName("close-button")[0];

    btn.onclick = function() {
        modal.style.display = "flex";
    }

    span.onclick = function() {
        modal.style.display = "none";
    }

    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
});