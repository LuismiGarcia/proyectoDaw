$(document).ready(function() {

    $(".tab_content").hide(); //Oculta todo el contenido
    $("ul.tabs li:first").addClass("active").show(); //Activa la primera pestaña
    $(".tab_content:first").show(); //Muestra el contenido de la primera pestaña

    //On Click Event
    $("ul.tabs li").click(function() {

        $("ul.tabs li").removeClass("active"); //Elimina la clase active si está activa
        $(this).addClass("active"); //Añade la clase active a la pestaña seleccionada
        $(".tab_content").hide(); //Oculta todo el contenido

        var activeTab = $(this).find("a").attr("href"); //Encuentra el atributo href de un link

        $(activeTab).fadeIn(); //Hace aparecer el contenido
        return false;
    });
});
