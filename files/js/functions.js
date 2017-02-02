
/* FUNÇÃO PARA BUSCAR OS DADOS PELA API STACKEXCHANGE */
$(function(){
    $('.persistir').submit(function(){
        $.getJSON('https://api.stackexchange.com/2.2/search?pagesize=99&order=asc&sort=creation&tagged=php&site=stackoverflow', 
        function(data){
            $.each(data.items, function(key, result){
//                $('.ver').append(key+' -> ID: '+result.question_id+' - titulo: '+addslashes(result.title)+' - nome: '+result.owner.display_name+' - score: '+result.score+' - criacao: '+result.creation_date+' - resp: '+result.is_answered+'<br>');
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
                            var texto = 'teste';
//                            alert(title);
//                            alert(resposta);
//                            if(resposta==='ok'){
//                                texto = "Dados salvos localmente";
//                            }
//                            else{
//                                texto = "Ocorreu um erro ao tentar salvar seus dados no Banco de Dados!";
//                            }
                            $('.message').text(texto);
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
