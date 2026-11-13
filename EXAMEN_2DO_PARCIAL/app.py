#LIBRERIAS
from flask import Flask, flash, redirect, render_template, request, url_for
from flask_mysqldb import MySQL

#CREAR APLICACIÓN
app= Flask(__name__)
app.config["TEMPLATES_AUTO_RELOAD"] = True

app.config["MYSQL_HOST"] = "localhost"
app.config["MYSQL_USER"] = "root"
app.config["MYSQL_PASSWORD"] = "Mysqalan1207"
app.config["MYSQL_DB"] = "crud_directorio"

app.secret_key = "mysecretkey"

#Iniciar la conexión 
mysql = MySQL(app)

#RUTA PRINCIPAL:READ
@app.route("/")
def index():
    con = mysql.connection.cursor()
    con.execute("SELECT * FROM tb_registros")
    contactos = con.fetchall()
    return render_template("index.html", contactos=contactos)

@app.route("/guardar", methods=["POST"])
def guardar():
    if request.method == "POST":
        nombre = request.form["nombre"]
        apellido = request.form["apellido"]
        telefono = request.form["telefono"]
        correo = request.form["correo"]
        direccion = request.form["direccion"]
        print(nombre, apellido, telefono, correo, direccion)

        """CONEXIONJ CON LA BD Y EJECUCION DEL INSERT"""
        cur = mysql.connection.cursor()
        cur.execute("INSERT INTO tb_registros (nombre, apellido, telefono, correo, direccion) VALUES (%s, %s, %s, %s, %s)", (nombre, apellido, telefono, correo, direccion))
        mysql.connection.commit()

    flash('Contacto agregado correctamente')
    return redirect(url_for('index'))

#EJECUTAR APLICACIÓN
if __name__ == "__main__":
    app.run(debug=True)