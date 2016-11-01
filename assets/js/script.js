$(document).ready(function () {
    $('#js-abrechat').click(function () {
        window.open("/chat/chat", "chatwindow", "width=400px,height=400px");
    });

});
function abrirChamado(obj) {
    var id = $(obj).closest('tr').attr('data-id');
    window.open("/chat/chat?id=" + id, "chatwindow", "width=400px,height=400px");
}
function iniciarSuporte() {
    setTimeout(getChamado, 2000);
}
function getChamado() {
    $.ajax({
        url: '/chat/ajax/getchamado',
        dataType: 'json',
        success: function (json) {
            var status;
            resetChamados();
            if (json.chamados.length > 0) {
                for (var i in json.chamados) {
                    if (json.chamados[i].status == 1) {
                        status = "Em andamento";
                    } else {
                        var id = json.chamados[i].id;
                        status = '<button onclick=abrirChamado(this,i=' + id + ')>Abrir Chamado</button>';
                    }
                    $('#areachamados').append("<tr data-id='" + json.chamados[i].id + "'><td>" + json.chamados[i].data_inicio + "</td><td>" + json.chamados[i].nome + "</td><td>" + status + "</td></tr>");
                }
            }
            setTimeout(getChamado, 2000);
        },
        error: function () {
            setTimeout(getChamado, 2000);
        }
    });
}
function resetChamados() {
    $('#areachamados tr').remove();
}

function keyUpChat(obj, event) {
    if (event.keyCode == 13) {
        var msg = obj.value;
        var nome = $('.inputarea').attr('data-nome');
        var dt = new Date();
        var hr = dt.getHours() + ":" + dt.getMinutes();

        $.post(
                '/chat/ajax/sendmessage',
                {msg: msg},
                function (data) {
                    $('.chatarea').append('<div class=\'msgitem\'>' + hr + ' <strong>' + nome + ' </strong> - <em>' + msg + '</em>    </div>');
                }
        );
        obj.value = '';
    }
}
function updateChat() {
    $.ajax({
        url: '/chat/ajax/getmassage',
        dataType: 'json',
        success: function (json) {
            for (var i in json.mensagens) {
                var hr = json.mensagens[i].data_enviado;
                if (json.mensagens[i].origem == 0) {
                    var nome = 'suporte'
                } else {
                    nome = $('.inputarea').attr('data-nome');
                }
                var msg = json.mensagens[i].mensagem;
                $('.chatarea').append('<div class=\'msgitem\'>' + hr + ' <strong>' + nome + ' </strong> - <em>' + msg + '</em>    </div>');
            }
            setTimeout(updateChat(), 2000);
        },
        error: function () {
            setTimeout(updateChat(), 2000);
        }
    });
}

