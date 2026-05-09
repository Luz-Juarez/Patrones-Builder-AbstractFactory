# Implementación de Patrones de Diseño Creacionales

Este repositorio contiene la implementación práctica en código de dos patrones de diseño creacionales fundamentales basados en el libro *Design Patterns: Elements of Reusable Object-Oriented Software* (Gang of Four).

# Integrantes del equipo 
Luz Fernanda Herrera Juárez
Víctor Alejandro Gómez Carballo

---

## 🧩 Patrones Implementados y Problemas que Resuelven

### 1. Abstract Factory
* **El problema que resuelve:** En sistemas donde se manejan múltiples "familias" de productos que están diseñados para funcionar en conjunto, el código tiende a acoplarse fuertemente a las clases concretas. Si se agregan nuevas familias de productos, el código principal debe ser modificado, rompiendo el principio de Abierto/Cerrado.
* **La solución:** Proporciona una interfaz para crear familias de objetos relacionados o dependientes sin especificar sus clases concretas. El código cliente queda completamente desacoplado de la instanciación directa.

### 2. Builder
* **El problema que resuelve:** Cuando un objeto es muy complejo y requiere un proceso de inicialización largo y con múltiples variaciones (constructores con demasiados parámetros u opcionales), el código se vuelve difícil de leer, propenso a errores y complejo de mantener.
* **La solución:** Separa la construcción de un objeto complejo de su representación final. Permite construir objetos paso a paso delegando el orden a una clase `Director` y la implementación física a una clase `Builder`, logrando que el mismo proceso de construcción pueda crear diferentes representaciones.

---

## 🛠️ Herramientas Usadas
* **Lenguaje:** PHP (Nativo)
* **Entorno de ejecución:** XAMPP (como proveedor del intérprete PHP)
* **Editor:** Visual Studio Code
* **Control de Versiones:** Git / GitHub

---

## ⚙️ Requisitos Previos (Prerrequisitos)

Para poder ejecutar este proyecto, es estrictamente necesario tener el intérprete de **PHP** instalado en la máquina local y configurado en las variables de entorno del sistema.

Puedes cumplir con este requisito de la siguientes manera:
1. Instalando la suite **[XAMPP](https://www.apachefriends.org/es/index.html)** (o similares como WAMP/MAMP), la cual incluye PHP por defecto.
2. Ejecuta el archivo descargado .exe, cotinuar seleccionando next. 
3.Cuando solicite una carpeta de instalación, debe ser exactamente : C:\xampp 
3. Termina el proceso de instalación con next

Configuración de variables de entorno PHP
1.Abrir en Windows y buscar 'Variables de entorno'
2.Selecciona 'Editar las variables de entorno del sistema'
3.En la ventana que se abre, haz clic en el botón de hasta abajo que dice "Variables de entorno...".
4.En la variable Path, selecciona y haz clic en "Editar". 
5.Seleccionar "Nuevo" y pegar la ruta exacta donde se instalo la carpeta de PHP de XAMPP.
6.Selecciona en "Aceptar". 

Verificar lo anterior : 
1. En la consola escribir el comando : php -v. 
2. El resultado debe se rla verdión de PHP


---

## 📦 Instalación de Dependencias

Este proyecto está desarrollado con código puro (Vanilla PHP) orientado a objetos. **No requiere** la instalación de dependencias externas, librerías adicionales ni el uso de gestores de paquetes (como Composer). 

* **Comandos necesarios para instalar dependencias:** `Ninguno`

---

## 🚀 Cómo ejecutar los ejemplos

Para ejecutar y probar este proyecto, utilizaremos la interfaz de línea de comandos (CLI) de PHP. Abre tu terminal asegurándote de estar ubicado en la carpeta raíz de este repositorio y sigue estos pasos:

### 🔹 Ejecutar el ejemplo de Abstract Factory
Este patrón demuestra la creación de familias de objetos. Para verlo en funcionamiento:

1. Navega a la carpeta del patrón:
   ```bash
   cd AbstractFactory
2. Para ejecutarlo 
    php abstractFactoryIndex.php

### 🔹 Ejecutar el ejemplo de Builder
Este patrón demuestra la construcción paso a paso de un objeto complejo. Para verlo en funcionamiento:

1. Si sigues dentro de la carpeta anterior, primero regresa a la raíz y luego entra a la carpeta del Builder:
   ```bash
   cd ..
   cd Builder
2. php builderIndex.php