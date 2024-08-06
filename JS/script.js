$('#form-geral').submit(function (e) {
    e.preventDefault();

    var d_estado = $('#estado').val();
    var d_serie = $('#serie').val();
    var d_cliente = $('#cliente').val();
    var d_local = $('#local').val();
    var d_solitante = $('#solicitante').val();
    var d_whatsapp = $('#whatsapp').val();
    var d_email = $('#e-mail').val();
    var d_defeito = $('#defeito').val();
    var d_contador = $('#contador').val();
    var d_periodo = $('#periodo').val();

    var resultado = document.getElementById('div-save');

    /* console.log(d_estado,d_serie,  
                d_local, d_solitante, 
                d_whatsapp, d_email, 
                d_defeito, d_contador, 
                d_periodo,d_cliente) */

    $.ajax({
        url: 'http://localhost:8090/phpprod/maqlarem/AberturaOS/VW/save.php',
        method: 'POST',
        data: {
            estado: d_estado,
            serie: d_serie,
            cliente: d_cliente,
            local: d_local,
            solicitante: d_solitante,
            whatsapp: d_whatsapp,
            email: d_email,
            defeito: d_defeito,
            contador: d_contador,
            periodo: d_periodo
        },
        /* dataType: 'json' */
    }).done(function (retorno) {
        /* console.log(retorno) */
        resultado.innerHTML = retorno
        $('#serie').val('');
        $('#solicitante').val('');
    })
})



$('#form-geral-req').submit(function (e) {
    e.preventDefault();

    var d_estado = $('#estado').val();
    var d_serie = $('#serie').val();
    var d_cliente = $('#cliente').val();
    var d_local = $('#local').val();
    var d_solitante = $('#solicitante').val();
    var d_whatsapp = $('#whatsapp').val();
    var d_email = $('#e-mail').val();
    var d_defeito = $('#defeito').val();
    var d_ultcont = $('#ultcont').val();
    var d_periodo = $('#periodo').val();
    var d_tonerPB = $('#tonerPB').val();
    var d_preto = $('#preto').val();
    var d_azul = $('#azul').val();
    var d_amarelo = $('#amarelo').val();
    var d_magenta = $('#magenta').val();
    var d_outro = $('#outro').val();

    var resultado = document.getElementById('div-save');

    /* console.log(d_estado,d_serie,  
                d_local, d_solitante, 
                d_whatsapp, d_email, 
                d_defeito, d_ultcont, 
                d_periodo,d_cliente,
                d_preto, d_magenta) */

    $.ajax({
        url: 'http://localhost:8090/phpprod/maqlarem/AberturaOS/VW/savereq.php',
        method: 'POST',
        data: {
            estado: d_estado,
            serie: d_serie,
            cliente: d_cliente,
            local: d_local,
            solicitante: d_solitante,
            whatsapp: d_whatsapp,
            email: d_email,
            defeito: d_defeito,
            ultcont: d_ultcont,
            periodo: d_periodo,
            tonerPB: d_tonerPB,
            preto: d_preto,
            azul: d_azul,
            amarelo: d_amarelo,
            magenta: d_magenta,
            outro: d_outro
        },
        /* dataType: 'json' */
    }).done(function (retorno) {
        /* console.log(retorno) */
        resultado.innerHTML = retorno
        $('#serie').val('');
        $('#solicitante').val('');
        $('#defeito').val('');
    })
})

const btn = document.querySelector("#btn-req");
btn.addEventListener("click", function(e) {
    
  e.preventDefault();
  
 /*  console.log("teste func"); */
});