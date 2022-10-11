
const entrar=true;
const patTexto = new RegExp(/^[A-Z]+$/i); //solo texto

var numero
var letr
var letra
var expresion_regular_dni

expresion_regular_dni = /^\d{8}[-][a-zA-Z]$/;
exprEmail= /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;


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
    
    if (email==null || email== '' || !exprEmail.test(email)){
        alert('Email erroneo, formato no válido');
        return false;
    }

    if (password==null || password=='' || password.length<8){
        alert('Contraseña erronea, formato no válido');
        return false;
    }
    
    return true;
    
    
}

function validarContraseña(){
    const email= document.getElementById('email').value;
    const password= document.getElementById('password').value;
    const Rpassword= document.getElementById('Rpassword').value;
    consog.log(password);
    if (email==null || email== '' || !exprEmail.test(email)){
        alert('Email erroneo, formato no válido');
        return false;
    }

    if (password==null || password=='' || password.length<8){
        alert('Contraseña erronea, formato no válido');
        return false;
    }

    if (Rpassword==null || Rpassword=='' || Rpassword.length<8){
        alert('Contraseña erronea, formato no válido');
        return false;
    }
    
    return true;
    
    
}