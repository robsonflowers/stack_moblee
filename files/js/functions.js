
/* FUNÇÃO PARA BUSCAR OS DADOS PELA API STACKEXCHANGE */
$(function(){
    $('.persistir').submit(function(){
        /* RETORNA O TEMPO ATUAL EM FORMATO UNIX */
        var timestamp = $.now();
        var unix = timestamp.toString();
        unix = unix.substring(0, 10);
        /* ESVAZIA A TABELA PARA INSERIR REGISTROS ATUALIZADOS */
        $.ajax({ 
            type: 'GET',
            dataType: 'html', 
            url: 'http://localhost/stack_moblee/app/ajax/ajax.php',
            data: 'limpartabela',
            success: function() {}
        });
        $.getJSON('https://api.stackexchange.com/2.2/search?pagesize=99&todate='+unix+'&order=desc&sort=creation&tagged=php&site=stackoverflow', 
        function(data){
            $.each(data.items, function(key, result){
                var question_id = result.question_id;
                var title = result.title;
                var owner_name = result.owner.display_name;
                var score = result.score;
                var creation_date = result.creation_date;
                var link = result.link;
                var is_answered = result.is_answered;
                /* Funcao responsavel por enviar os dados coletados para o arquivo 
                 * onde sera realizada a persistencia dos mesmos */
                $.ajax({ 
                    type: 'GET',
                    dataType: 'html', 
                    url: 'http://localhost/stack_moblee/app/ajax/ajax.php',
                    data: 'questionid='+question_id+'&title='+title+'&ownername='+owner_name+
                          '&score='+score+'&creationdate='+creation_date+'&link='+link+'&isanswered='+is_answered,
                    success: function(resposta) {
                        var texto;
                        if(resposta=='ok'){
                            texto = "Dados salvos localmente";
                        }
                        else{
                            texto = "Ocorreu um erro ao tentar salvar um ou mais dados no Banco de Dados!";
                        }
                        $('.message').text(texto).css({display:"block"});
                    },
                    beforeSend: function(){
                       $('.loader').css({display:"block"});
                    },
                    complete: function(){
                       $('.loader').css({display:"none"});
                    },
                     error: function(XMLHttpRequest, textStatus, errorThrown){
                        $('.message').text("Ocorreu um erro na requisicao do AJAX, culpe o Deadpool!");
                    }
                });
            });
        });
        return false;
    });
});

/* FUNÇÃO PARA ABRIR NOVA ABA COM AS CONDICOES DE BUSCA */
$(function(){
    $('.buscar').submit(function(){
        var dados = $('.buscar').serialize();
        window.open('http://localhost/stack_moblee/?pagina=question&'+dados, '_blank');
        return false;
    });
});
