class Usuarios {

    constructor() {
        
    }
    loginUser(email, password){
        //Verificamos si los parametros estan vacios
        if(email == ""){
            //Si esta vacio colocamos el focus en la linea correspondiente
            document.getElementById("email").focus();
            //Mostramos un message en caso de estar vacio
            M.toast({html: 'Ingrese el email', classes: 'rounded'});
        } else {
             //Verificamos si los parametros estan vacios
            if(password == ""){
                //Si esta vacio colocamos el focus en la linea correspondiente
                document.getElementById("password").focus();
                //Mostramos un message en caso de estar vacio
                M.toast({html: 'Ingrese la contraseña', classes: 'rounded'});
        } else {
            //Validamos el email
            if(validarEmail(email)){
                //Verificamos que la contraseña tenga más de 6 caracteres
                if(6 <= password.length){
                    //Enviamos la información al servidor
                        $.post(
                            "Index/userLogin",
                            {email, password},
                            (response)=>{
                                console.log(response);
                                
                            }
                        );
                } else{
                    //Si la contraseña tiene menos de 6 caracteres enviamos un message
                document.getElementById("password").focus();
                M.toast({html: 'Introduzca al menos 6 caracteres', classes:'rounded'});
                }

            } else{
                //Si el email no es valido enviamos un message
                document.getElementById("email").focus();
                M.toast({html: 'Ingrese una dirección de correo electrónico válido', classes:'rounded'});
            }
        }
    }
  }
}