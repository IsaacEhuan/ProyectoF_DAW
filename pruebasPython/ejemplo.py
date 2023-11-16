
from selenium import webdriver
from selenium.webdriver.edge.options import Options
from selenium.webdriver.edge.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.action_chains import ActionChains
import time

options = Options()
s = Service(r"C:\Users\jonat\OneDrive\Documentos\7toSemestre\verificacionValidacionSoftware\proyecto\ProyectoF_DAW\pruebasPython\msedgedriver.exe")


def probarLogin():
    driver = webdriver.Edge(service = s, options = options)
    driver.get('http://127.0.0.1:8000')
    time.sleep(3)

    usuarioC = "123"
    contraseniaC = "dijgi"

    usuario = driver.find_element(By.ID, 'email')
    contrase = driver.find_element(By.ID, 'contrasena')
    usuario.send_keys(usuarioC)
    contrase.send_keys(contraseniaC)
    boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
    time.sleep(3)
    driver.execute_script("arguments[0].click();",boton)
    time.sleep(3)
   

#pip install selenium <- Lo unico que se debe instalar
# si no les funciona, dessintalar python y volver a instalar