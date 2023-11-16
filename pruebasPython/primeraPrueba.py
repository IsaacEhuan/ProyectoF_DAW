import unittest
from selenium import webdriver
from selenium.webdriver.edge.options import Options
from selenium.webdriver.edge.service import Service
from selenium.webdriver.common.by import By
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import Select
from selenium.webdriver.common.action_chains import ActionChains
import time

class PythonLogin(unittest.TestCase):

    def setUp(self):
        options = Options()
        s = Service(r"C:\Users\jonat\OneDrive\Documentos\7toSemestre\verificacionValidacionSoftware\proyecto\ProyectoF_DAW\pruebasPython\msedgedriver.exe")
        self.driver = webdriver.Edge(service = s, options = options)
        self.base_url = 'http://127.0.0.1:8000'

    def test_login(self):
        driver = self.driver
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
        self.assertNotIn("No results found.", driver.page_source)
    
    def test_url_change(self):
        new_url = self.driver.current_url
        self.assertNotEqual(self.base_url, new_url)

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()