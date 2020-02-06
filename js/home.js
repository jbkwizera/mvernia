
// toggle show on profile-content
function toggleProfile() {
    document.getElementById("profile-content").classList.toggle("show");

    if (window.innerWidth <= 800) {
        document.getElementsByClassName("notification")[0].remove();
        let notif = document.createElement("DIV");
        notif.classList.add("notif");
        let link = document.createElement("A");
        link.setAttribute("href", "#");
        link.innerHTML = "Notifications";
        notif.appendChild(link);

        let myPapers = document.getElementsByClassName("my-papers")[0];
        if (window.innerWidth <= 800) {
            myPapers.parentElement.insertBefore(notif, myPapers);
        }
    }
}

window.onclick = function(elem) {
    if (!elem.target.matches(".profile-a")) {
        var card = document.getElementById("profile-content");
        if (card.classList.contains("show")) {
            card.classList.remove("show");
        }
    }
}

// make the search-bar responsive and 100%
document.getElementById("search-input").addEventListener("click", function() {
    this.style.width = "85%";
    document.querySelector(".search-btn").style.width = "15%";
    this.style.border = "2px solid #23C265";
    this.parentElement.style.borderRadius = "1.2em";

});
window.onclick = function(evt) {
    if (!evt.target.matches("#search-input")) {
        document.getElementById("search-bar").style.border = "none";
    }
}

// resize the logo
function changeLogo(evt) {
    let logoH = document.getElementsByClassName("logo-name-h")[0];
    logoH.innerHTML = "mvernia";
    logoH.style.fontSize = "2em";
    if (window.innerWidth <= 800)
        logoH.innerHTML = "m";
}
window.onload = changeLogo;
window.onresize = changeLogo;

// add click event
Array.prototype.forEach.call(document.getElementsByClassName("paper-visible"), paper => {
    paper.addEventListener("click", function() {
        window.location.href = "paper.php";
    })
});

Array.prototype.forEach.call(document.getElementsByClassName(""), imgElem => {

});
