/* function limpar(){
    $("input").val("");
    $("textarea").val("");
} */


$('#form-geral').submit(function(e){
    e.preventDefault();

    var d_estado = $('#estado').val();
    var d_serie = $('#serie').val();
    var d_cliente = $('#cliente').val();
    var d_local = $('#local').val();
    var d_solitante = $('#solicitante').val();
    var d_whatsapp = $('#whatsapp').val();
    var d_email = $('#email').val();
    var d_defeito = $('#defeito').val();
    var d_contador = $('#contador').val();
    var d_periodo = $('#periodo').val();

    let resultado = document.getElementById('form-geral');

    console.log(d_estado,d_serie, d_cliente, 
            d_local, d_solitante, 
            d_whatsapp, d_email, 
            d_defeito, d_contador, 
            d_periodo)

    $.ajax({
        url: 'http://localhost:8090/phpprod/maqlarem/AberturaOS/VW/save.php',
        method: 'POST',
        data: {estado: d_estado, 
            serie: d_serie, cliente: d_cliente, 
            local: d_local, solicitante: d_solitante, 
            whatsapp: d_whatsapp, email: d_email, 
            defeito: d_defeito, contador: d_contador, 
            periodo: d_periodo},
        /* dataType: 'json' */
    }).done(function(retorno){
        console.log(retorno)
        resultado.innerHTML = retorno
    })
})