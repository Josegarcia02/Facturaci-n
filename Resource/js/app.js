//Iniciamos la clase Usurios
var usuarios = new Usuarios();
//Creamos el objeto loginUser
var loginUser = () =>{
    //Creamos la variable email
    var email = document.getElementById("email").value;
    //Creamos la variable password
    var password = document.getElementById("password").value;
    //Creamos el objeto loginUser
    usuarios.loginUser(email, password);
}

//Inicializamos javascript
$().ready(()=>{
    $("#login").validate()
});