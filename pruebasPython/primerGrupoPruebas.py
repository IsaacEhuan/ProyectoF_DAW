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

    def test_CP0001_IngresoExitoso(self):
        driver = self.driver
        driver.get('http://127.0.0.1:8000')
        time.sleep(3)

        usuarioC = "A20216399@alumnos.uady.mx"
        contraseniaC = "$2y$10$JldshFMEJwkiBTBBa4IILenprLZJTjA6ETcOAHFnsLzDllUNLcYSy"

        usuario = driver.find_element(By.ID, 'email')
        contrase = driver.find_element(By.ID, 'contrasena')
        usuario.send_keys(usuarioC)
        contrase.send_keys(contraseniaC)
        boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
        time.sleep(3)
        driver.execute_script("arguments[0].click();",boton)
        time.sleep(3)
        new_url = self.driver.current_url
        self.assertNotEqual(self.base_url, new_url)
    
    def test_CP0002_IngresoNoPermitidoContraseñaIncorrecta(self):
        driver = self.driver
        driver.get('http://127.0.0.1:8000')
        time.sleep(3)

        usuarioC = "A20216399@alumnos.uady.mx"
        contraseniaC = "987abcdefg"

        usuario = driver.find_element(By.ID, 'email')
        contrase = driver.find_element(By.ID, 'contrasena')
        usuario.send_keys(usuarioC)
        contrase.send_keys(contraseniaC)
        boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
        time.sleep(3)
        driver.execute_script("arguments[0].click();",boton)
        time.sleep(3)
        new_url = self.driver.current_url
        self.assertEqual(self.base_url, new_url)

    def test_CP0003_IngresoNoPermitidoContraseñaSinFormato(self):
        driver = self.driver
        driver.get('http://127.0.0.1:8000')
        time.sleep(3)

        usuarioC = "A20216399@alumnos.uady.mx"
        contraseniaC = "0123"

        usuario = driver.find_element(By.ID, 'email')
        contrase = driver.find_element(By.ID, 'contrasena')
        usuario.send_keys(usuarioC)
        contrase.send_keys(contraseniaC)
        boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
        time.sleep(3)
        driver.execute_script("arguments[0].click();",boton)
        time.sleep(2)
        new_url = self.driver.current_url
        print(new_url,"-----------",self.base_url)
        self.assertEqual(self.base_url, new_url)

    def test_CP0004_IngresoNoPermitidoUsuarioVacío(self):
        driver = self.driver
        driver.get('http://127.0.0.1:8000')
        time.sleep(3)

        contraseniaC = "0123"

        contrase = driver.find_element(By.ID, 'contrasena')
        contrase.send_keys(contraseniaC)
        boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
        time.sleep(3)
        driver.execute_script("arguments[0].click();",boton)
        time.sleep(2)
        new_url = self.driver.current_url
        print(new_url,"-----------",self.base_url)
        self.assertEqual(self.base_url+"/", new_url)

    def test_CP0005_IngresoNoPermitidoUsuarioEspacios(self):
        driver = self.driver
        driver.get('http://127.0.0.1:8000')
        time.sleep(3)

        usuarioC = " "
        contraseniaC = "0123"

        usuario = driver.find_element(By.ID, 'email')
        contrase = driver.find_element(By.ID, 'contrasena')
        usuario.send_keys(usuarioC)
        contrase.send_keys(contraseniaC)
        boton = driver.find_element(By.CSS_SELECTOR, "body > div.container.mt-5 > div > div.col.rounded-5.offset-1 > form > div:nth-child(4) > button")
        time.sleep(3)
        driver.execute_script("arguments[0].click();",boton)
        time.sleep(2)
        new_url = self.driver.current_url
        print(new_url,"-----------",self.base_url)
        self.assertEqual(self.base_url+"/", new_url)

    def tearDown(self):
        self.driver.close()

if __name__ == "__main__":
    unittest.main()