from selenium import webdriver
from selenium.webdriver.common.by import By
import unittest

class TestAutenticacionUsuarios(unittest.TestCase):

  def setUp(self):
    self.driver = webdriver.Chrome()
    self.driver.get("http://localhost/sistema-gestion-tareas")


  def test_registro_usuario_exitoso(self):
    driver = self.driver


    registro_link = driver.find_element(By.LINK_TEXT, "Registrarse")
    registro_link.click()


    email_input = driver.find_element(By.ID, "email")
    email_input.send_keys("usuario@example.com")

    password_input = driver.find_element(By.ID, "password")
    password_input.send_keys("Password123!")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()

    success_message = driver.find_element(By.CSS_SELECTOR, ".alert-success")
    self.assertTrue("Registro exitoso" in success_message.text)

  def test_registro_usuario_correo_ya_registrado(self):
    driver = self.driver


    registro_link = driver.find_element(By.LINK_TEXT, "Registrarse")
    registro_link.click()


    email_input = driver.find_element(By.ID, "email")
    email_input.send_keys("usuario@example.com")

    password_input = driver.find_element(By.ID, "password")
    password_input.send_keys("Password123!")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()


    error_message = driver.find_element(By.CSS_SELECTOR, ".alert-danger")
    self.assertTrue("El correo electrónico ya está registrado" in error_message.text)


  def test_inicio_sesion_exitoso(self):
    driver = self.driver

    login_link = driver.find_element(By.LINK_TEXT, "Iniciar Sesión")
    login_link.click()

    email_input = driver.find_element(By.ID, "email")
    email_input.send_keys("usuario@example.com")

    password_input = driver.find_element(By.ID, "password")
    password_input.send_keys("Password123!")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()

    dashboard_link = driver.find_element(By.LINK_TEXT, "Dashboard")
    self.assertTrue(dashboard_link.is_displayed())

  def test_inicio_sesion_credenciales_incorrectas(self):
    driver = self.driver


    login_link = driver.find_element(By.LINK_TEXT, "Iniciar Sesión")
    login_link.click()

    email_input = driver.find_element(By.ID, "email")
    email_input.send_keys("usuario@example.com")

    password_input = driver.find_element(By.ID, "password")
    password_input.send_keys("IncorrectPassword")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()

    error_message = driver.find_element(By.CSS_SELECTOR, ".alert-danger")
    self.assertTrue("Credenciales incorrectas" in error_message.text)

  def test_crear_proyecto_exitoso(self):
    driver = self.driver

    crear_proyecto_link = driver.find_element(By.LINK_TEXT, "Crear Proyecto")
    crear_proyecto_link.click()

    nombre_proyecto_input = driver.find_element(By.ID, "nombre_proyecto")
    nombre_proyecto_input.send_keys("Mi Proyecto de Prueba")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()

    success_message = driver.find_element(By.CSS_SELECTOR, ".alert-success") 
    self.assertTrue("Proyecto creado exitosamente" in success_message.text)
def test_ver_lista_proyectos_exitoso(self):
    driver = self.driver

    lista_proyectos_link = driver.find_element(By.LINK_TEXT, "Mis Proyectos")
    lista_proyectos_link.click()

    proyectos = driver.find_elements(By.CLASS_NAME, "proyecto")
    self.assertTrue(len(proyectos) > 0)

def test_ver_lista_proyectos_vacia(self):
    driver = self.driver

    lista_proyectos_link = driver.find_element(By.LINK_TEXT, "Mis Proyectos")
    lista_proyectos_link.click()

    empty_message = driver.find_element(By.CSS_SELECTOR, ".empty-message")
    self.assertTrue("No tienes proyectos actualmente" in empty_message.text)

def test_editar_proyecto_exitoso(self):
    driver = self.driver

    proyecto_link = driver.find_element(By.LINK_TEXT, "Mi Proyecto de Prueba")
    proyecto_link.click()

    success_message = driver.find_element(By.CSS_SELECTOR, ".alert-success")
    self.assertTrue("Detalles del proyecto actualizados correctamente" in success_message.text)


def test_crear_tarea_exitoso(self):
    driver = self.driver

    crear_tarea_link = driver.find_element(By.LINK_TEXT, "Crear Tarea")
    crear_tarea_link.click()

    titulo_tarea_input = driver.find_element(By.ID, "titulo_tarea")
    titulo_tarea_input.send_keys("Mi Tarea de Prueba")

    submit_button = driver.find_element(By.ID, "submit")
    submit_button.click()

    success_message = driver.find_element(By.CSS_SELECTOR, ".alert-success")
    self.assertTrue("Tarea creada exitosamente" in success_message.text)


def test_ver_lista_tareas_exitoso(self):
    driver = self.driver
  
    lista_tareas_link = driver.find_element(By.LINK_TEXT, "Ver Tareas")
    lista_tareas_link.click()

    tareas = driver.find_elements(By.CLASS_NAME, "tarea")
    self.assertTrue(len(tareas) > 0)

def test_actualizar_estado_tarea_exitoso(self):
    driver = self.driver

    tarea_link = driver.find_element(By.LINK_TEXT, "Mi Tarea de Prueba")
    tarea_link.click()

    success_message = driver.find_element(By.CSS_SELECTOR, ".alert-success")
    self.assertTrue("Estado de la tarea actualizado correctamente" in success_message.text)


def test_interfaz_intuitiva_y_responsive(self):
    driver = self.driver

    app_container = driver.find_element(By.ID, "app-container")
    self.assertTrue(app_container.is_displayed())


def test_ver_dashboard_exitoso(self):
    driver = self.driver

    dashboard_link = driver.find_element(By.LINK_TEXT, "Dashboard")
    dashboard_link.click()

    summary_section = driver.find_element(By.ID, "summary-section")
    self.assertTrue(summary_section.is_displayed())

def test_ver_dashboard_sin_proyectos_ni_tareas(self):
    driver = self.driver

    dashboard_link = driver.find_element(By.LINK_TEXT, "Dashboard")
    dashboard_link.click()

    empty_message = driver.find_element(By.CSS_SELECTOR, ".empty-message")
    self.assertTrue("No tienes proyectos ni tareas pendientes" in empty_message.text)
def tearDown(self):
    self.driver.quit()

if __name__ == "__main__":
  unittest.main()
