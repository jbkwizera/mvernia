document.getElementById("add-author").addEventListener("click", function() {
    let nameElem = document.createElement("INPUT");
    let instElem = document.createElement("INPUT");

    nameElem.setAttribute("name", "auth-name[]");
    instElem.setAttribute("name", "auth-inst[]");
    nameElem.setAttribute("placeholder", "Full name");
    instElem.setAttribute("placeholder", "Institution");

    this.parentElement.insertBefore(nameElem, this);
    this.parentElement.insertBefore(instElem, this);
})

document.getElementById("upload-btn").addEventListener("click", function() {
    let x = document.getElementById("paper-file");
    x.disabled = true;
})
