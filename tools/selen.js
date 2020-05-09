const { Builder, By, Key, until } = require("selenium-webdriver");

let driver = new Builder().forBrowser("firefox").build();


function getID(id) {
    driver.get("http://results.reb.rw/");
    driver.findElement(By.css("input[value=S6]")).click();
    driver.findElement(By.id("idnum")).clear();
    driver.findElement(By.id("idnum")).sendKeys(idNum.trim());
    driver.findElement(By.id("searchbtn")).click();
    driver.findElement(By.id("idnum")).sendKeys(Key.DELETE);
}
for (let i = 1; i <= 15; i++) {
    let id = (i + "").padStart(3, "0");
    getID(id);
    setTimeout(function () {
        // take a break
    }, 5000);
}
let i  = 0;
let getId = i => "0202035MEG" + (i + "").padStart(3, "0") + "2019";
do {
    driver.get("http://results.reb.rw/");
    driver.findElement(By.css("input[value=S6]")).click();
    driver.findElement(By.id("idnum")).sendKeys(Key.DELETE);
    driver.findElement(By.id("idnum")).sendKeys(getId(i));

    i += 1
} while (i < 1);
