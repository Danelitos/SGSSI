function confirmacion(e){
    if (confirm("¿Estas seguro de eliminar este coche?")) {
        return true;
    }
    else{
        e.preventDefault();
    }
}

let linkDelete = document.querySelectorAll()