// toggle show on address-card
function toggleDropdown() {
  document.getElementById("address-card").classList.toggle("show");
}

// close the dropdown if the user clicks outside of it
window.onclick = function(elem) {
    if (!elem.target.matches(".dropdown-btn")) {
        var card = document.getElementById("address-card");
        if (card.classList.contains("show")) {
            card.classList.remove("show");
        }
    }
}
