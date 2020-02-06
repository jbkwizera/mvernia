from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from random import randint
import os

def downloadmathgen():
    profile = webdriver.FirefoxProfile()
    profile.set_preference("browser.download.folderList", 2)
    profile.set_preference("browser.helperApps.alwaysAsk.force", False)
    profile.set_preference("browser.download.manager.showWhenStarting", False)
    profile.set_preference("browser.download.dir", os.getcwd())

    profile.set_preference("plugin.disable_full_page_plugin_for_types", "application/pdf")
    profile.set_preference("pdfjs.disabled", True)
    profile.set_preference("browser.helperApps.neverAsk.saveToDisk", "application/pdf")
    driver = webdriver.Firefox(firefox_profile=profile)

    seed   = randint(0, 10000000000)
    driver.get("http://thatsmathematics.com/mathgen/paper.php?nameType[1]=famous&nameType[2]=custom&customName[2]=&nameType[3]=custom&customName[3]=&nameType[4]=custom&customName[4]=&seed="+str(seed)+"&format=pdf")

for i in range(5):
    downloadmathgen()
