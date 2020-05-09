
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
window.onclick = function(event) {
    if (!event.target.matches("#search-input")) {
        document.getElementById("search-bar").style.border = "none";
    }
}

// resize the logo
function changeLogo(event) {
    let logoH = document.getElementsByClassName("logo-name-h")[0];
    logoH.innerHTML = "Mouseion";
    logoH.style.fontSize = "2em";
    if (window.innerWidth <= 800)
        logoH.innerHTML = "Mouseion";
}
window.onload = changeLogo;
window.onresize = changeLogo;

// click event listener
function redirectToPaper(event) {
    var paperVisible = event.target;
    if (!event.target.classList.contains("paper-visible"))
        paperVisible = event.target.closest(".paper-visible");
    var paperTitle = paperVisible.getElementsByClassName("paper-title")[0];
    window.localStorage.setItem("paperTitle", paperTitle.innerHTML);
    window.location.href = "./paper.php";
}

document.querySelector("h1").addEventListener("click", function() {
    if (!window.location.href.endsWith("index.php"))
        window.location.href = "index.php";
});