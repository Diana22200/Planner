function confirmacion(e){
    if (confirm("¿Está seguro de que desea eliminar este usuario?")) {
        return true;
    }else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".table_del");

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}