
const entrar=true;
const patTexto = new RegExp("^[a-zA-ZñÑáéíóúÁÉÍÓÚ ]+$"); //solo texto

var numero
var letr
var letra
var expresion_regular_dni

expresion_regular_dni = /^\d{8}[-][a-zA-Z]$/;
exprEmail= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
exprPassword = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}/;

function validarFormulario(){
    let nombre= document.getElementById("nombre").value;
    let apellidos= document.getElementById("apellidos").value;
    const dni= document.getElementById('dni').value;
    const telefono= document.getElementById('telefono').value;
    const fechaNac= document.getElementById('fechanacimiento').value;
    const email= document.getElementById('email').value;
    const password= document.getElementById('password').value;
    

    if (nombre=='' || nombre == null ||!patTexto.test(nombre)){
        alert('El nombre debe ser solo texto');
        return false;
    }

    if (apellidos=='' || apellidos == null || !patTexto.test(apellidos)){
        alert('Los apellidos deben ser solo texto');
        return false;
    }

    if(!expresion_regular_dni.test (dni)){
        alert('Dni erroneo, formato no válido');
        return false;

        
    }else{
        numero = dni.substr(0,dni.length-2);
        console.log(numero);
        letr = dni.substr(dni.length-1,1);
        console.log(letr);
        numero = numero % 23;
        letra='TRWAGMYFPDXBNJZSQVHLCKET';
        letra=letra.substring(numero,numero+1);
       if (letra!=letr.toUpperCase()) {
        
          alert('Dni erroneo, la letra del NIF no se corresponde');
          return false;
        }
    } 
    
    if ( isNaN(telefono) || telefono==null || telefono.length!=9){
        alert('Telefono erroneo, formato no válido');
        return false;
    }
    
    // "2002-08-02"
    if (fechaNac==null || fechaNac== ''){
        return false;

    }
    else{
        const fecha= fechaNac.split("-");
        console.log(fecha.length);
        if (fecha.length!=3){
            alert('Formato de fecha no válido');
            return false;
        }
        else{
            //comprobar año
            const año= fecha[0];

            if (año<1900 || año>2022){
                alert('Año de la fecha no válido');
                return false;
            }

            //comprobar mes
            const mes= fecha[1];
            if (mes<1 || mes>12){
                alert('Mes de la fecha no válido');
                return false;
            }

            //comprobar dia
            const dia= fecha[2];
            if (dia<1 || dia>31){
                alert('Dia de la fecha no válido');
                return false;
            }
        }
    }

    //comprobar que el correo no existe por otro usuario

    if (email==null || email== '' || !exprEmail.test(email)){
        alert('Email erroneo, formato no válido');
        return false;
    }

    if (password==null || password=='' || !exprPassword.test(password)){
        /*Minimo 8 caracteres
        Maximo 15
        Al menos una letra mayúscula
        Al menos una letra minuscula
        Al menos un dígito
        No espacios en blanco
        Al menos 1 caracter especial*/
        alert('Contraseña erronea\n - Minimo 8 caracteres \n - Maximo 15 \n - Al menos una letra mayúscula \n - Al menos una letra minúscula \n - Al menos un dígito \n - No espacios en blanco \n - Al menos 1 caracter especial');
        return false;
    }
    
    return true;
    
    
}
