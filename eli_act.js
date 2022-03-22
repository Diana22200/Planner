function confirmacion(e){
    if (confirm("¿Está seguro de que desea eliminar esta actividad?")) {
        return true;
    }else{
        e.preventDefault();
    }
}
let linkDelete = document.querySelectorAll(".act_del");

for(var i = 0; i < linkDelete.length; i++){
    linkDelete[i].addEventListener('click', confirmacion);
}