/* Tratamento de filtros select */
 // Mostrar as opções ao focar no campo de texto
 document.getElementById("selectEstado").addEventListener("focus", function() {
    document.getElementById("selectEstadoLista").style.display = "block";
  });

  // Ocultar as opções ao clicar fora
  document.addEventListener("click", function(e) {
    if (!e.target.closest(".custom-select")) {
      document.getElementById("selectEstadoLista").style.display = "none";
    }
  });

  // Função de filtro para o select
  function filterEstado() {
    const filter = document.getElementById("selectEstado").value.toLowerCase();
    const options = document.getElementById("selectEstadoLista").getElementsByTagName("div");

    for (let i = 0; i < options.length; i++) {
      const optionText = options[i].textContent || options[i].innerText;
      if (optionText.toLowerCase().indexOf(filter) > -1) {
        options[i].style.display = "";
      } else {
        options[i].style.display = "none";
      }
    }
  }

  // Selecionar um item da lista
  const items = document.getElementById("selectEstadoLista").getElementsByTagName("div");
  for (let i = 0; i < items.length; i++) {
    items[i].addEventListener("click", function() {
      document.getElementById("selectEstado").value = this.innerText;
      document.getElementById("selectEstadoLista").style.display = "none";
    });
  }








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
    var d_url = $('#urlOS').val();

    var resultado = document.getElementById('div-save');

    /* console.log(d_estado,d_serie,  
                d_local, d_solitante, 
                d_whatsapp, d_email, 
                d_defeito, d_contador, 
                d_periodo,d_cliente) */

    $.ajax({
        url: d_url,
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



$('#form-geral-req').submit(function(e) {
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
    var d_urlReq = $('#urlReq').val();
    var d_codEmp = $('#codEmp').val();

    var resultado = document.getElementById('div-save');

    /* console.log(d_estado,d_serie,  
                d_local, d_solitante, 
                d_whatsapp, d_email, 
                d_defeito, d_ultcont, 
                d_periodo,d_cliente,
                d_preto, d_magenta) */

    $.ajax({
        url: d_urlReq,
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
            outro: d_outro,
            codEmp: d_codEmp
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

/* Impede o submit dos botões de troca de tela */
const btn = document.querySelector("#btn-req");
btn.addEventListener("click", function (e) {
    e.preventDefault();
});

const btnSup = document.querySelector("#btn-req-sup");
btnSup.addEventListener("click", function (e) {
    e.preventDefault();
});


