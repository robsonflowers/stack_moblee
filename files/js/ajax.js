$(function(){
    $('form#add-log').submit(function(){
        var contrato = $('form#add-log #contrato').val();
       
        $.getJSON('http://localhost/log/app/ajax/retorna-historico.php?contrato='+contrato, 
        function(data){
            $.each(data, function(i, log){
		// se houver histórico
                if(log.total>0){
                    var dados = $('form#add-log').serialize();
                    var s = '';
                    if(log.total>1){
                        s = 's';
                    }
                    
                    $.ajax({ 
                        type: 'POST',
                        dataType: 'html', 
                        url: 'http://localhost/log/',
                        data: dados+'&idcontrato='+log.idcontrato,
                        success: function() {
                            $('form#add-log').fadeOut().prop('hidden',true);
                            $('.jumbotron').fadeIn(300,function(){
                                $(this).find('h2').text('Log adicionada ao histórico do contrato '+log.contrato);
                            }).fadeOut(5000, function(){
                                $('form#add-log').each (function(){
                                    this.reset();
                                }).fadeIn();
                            });
                        }
                    });
                }
                // se não houver histórico
                else{
                    $('form#add-log').fadeOut().prop('hidden',true);
                    $('.jumbotron').fadeIn(300,function(){
                        $(this).find('h2').text('Não foi encontrado nenhum registro para o contrato informado. Favor informar atendimento anterior');
                    }).fadeOut(5000, function(){
                        $('form#add-log').each (function(){
                            this.reset();
                        }).fadeIn();
                    });
                    $('.panel-title').text('Atendimento Anterior');
                    
                    if($('.field-two').prop('disabled')==true){
                        var tamanho = $(".panel-body").outerHeight();
                        $('.form-add-log').css({"overflow":"hidden"});
                        $('.field-one').css({"position":"relative"}).animate({"top":"-"+tamanho+"px"}, 300);
                        $('.field-one').prop('hidden',true);

                        $('.field-two').prop('disabled',false);
                        $('.field-two').fadeIn(300);
                        $('.field-two').css({"position":"relative","bottom":-tamanho+"px"}).animate({"bottom":"0px"}, 300);
                    }
                    $('#salvar').click(function(){
                        var dados = $('form#add-log').serialize();
                        $.ajax({ 
                            type: 'POST',
                            dataType: 'html', 
                            url: 'http://localhost/log/',
                            data: dados,
                            success: function() {
                                $('form#add-log').fadeOut().prop('hidden',true);
                                $('.jumbotron').fadeIn(300,function(){
                                    $(this).find('h2').text('Adicionado novo contrato, histórico anterior e atual');
                                }).fadeOut(3000, function(){
                                    $('form#add-log').each (function(){
                                        this.reset();
                                    }).fadeIn();
                                });
                            }
                        });
                    });
                }
            });
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA ADICIONAR CÓDIGO DE BAIXA
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('form#add-codigo-baixa').submit(function(){
        //testar se já existe código informado no BD
//        var contrato = $('form#add-log #contrato').val();
        var dados = $('form#add-codigo-baixa').serialize();
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/log/codigos-de-baixa/',
            data: dados,
            success: function() {
                $('form#add-codigo-baixa').fadeOut().prop('hidden',true);
                $('.jumbotron').fadeIn().fadeOut(3000, function(){
                    $('form#add-codigo-baixa').each (function(){
                        this.reset();
                    }).fadeIn();
                });

                $('#tabela-codigos-baixa').load('#tabela-codigos-baixa thead,tbody');
            }
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA BUSCAR TÉCNICOS E INICIALIZAR O AUTOCOMPLETE
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function tecnicos(){
    $.getJSON('http://localhost/log/app/ajax/retorna-tecnico.php?tecnico=s', 
        function(data){
            var tecnico = [];
            $.each(data, function(i, tec){
                tecnico.push(tec.nome);
                    var $input = $('.typeahead');
                    $input.typeahead({
                        source:tecnico,
                        showHintOnFocus:true,
                    });     
                    $input.change(function() {
                        var current = $input.typeahead('getActive');
                        if (current) {
                            // Some item from your model is active!
//                            if (current.nome == $input.val()) {
                            if (current == $input.val()) {
                                // This means the exact match is found. Use toLowerCase() if you want case insensitive match.
                            } else {
//                                // This means it is only a partial match, you can either add a new item 
                            }
                        } else {
                            // Nothing is active so it is a new value (or maybe empty value)
                        }
                    });
                });
            }
    );
};


// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA ADICIONAR TÉCNICO
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('form#addedit-tecnico').submit(function(){
        //add codigo para testar se já existe código informado no BD
        var dados = $('form#addedit-tecnico').serialize();
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/tecnet/app/ajax/teste.php',
            data: dados,
            
            success: function() {
                $('#modalAddEdit').modal('hide');
                $('form#addedit-tecnico').each (function(){this.reset();});
                $('#tabela-tecnicos').load('#tabela-tecnicos tbody');
                $('#usuarios').load('#usuarios #tabela-usuarios');
            },
            beforeSend: function(){
              $('#loader').css({display:"block"});
            },
            complete: function(){
              $('#loader').css({display:"none"});
            }
        });
        return false;
    });
});

// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA ENVIAR VIA AJAX OS DADOS DOS FORMULÁRIOS PARA REMOVER TÉCNICO
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function removeTecnico(idTecnico){
//    $('.btn.btn-default.excluir').on('click',function(){
        var idTecnico = idTecnico;
        $.ajax({ 
            type: 'POST',
            dataType: 'html', 
            url: 'http://localhost/tecnet/app/ajax/teste.php',
            data: 'remove-tecnico='+idTecnico,
            success: function() {
                $('#tabela-tecnicos').load('#tabela-tecnicos thead,tbody');
                $('#usuarios').load('#usuarios #tabela-usuarios');
            }
        });
//    });
    
}
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA POPULAR DINAMICAMENTE FORMULÁRIO MODAL COM DADOS DO TÉCNICO
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
function editarTecnico(idtec){
        $('#modalAddEdit .modal-title').text('Editar informações');
        $("#checkbox-gerar-user").css("display","none");
        var idtecnico = idtec; //$(this).data('idtecnico');
        $.getJSON('http://localhost/tecnet/app/ajax/JSON.php?buscatecnico='+idtecnico, 
        function(data){
            $.each(data, function(i, tecnico){
                //$('#link-contrato').prop('href','http://localhost/log/historico/'+log.contrato);
                $('[name="novo-tecnico"]').val(idtecnico);
                $('[name="login"]').val(tecnico.login);
                $('[name="cargo"] option[value="'+tecnico.cargo+'"]').prop('selected',true);
                $('[name="atlas"]').val('');
                $('[name="nome"]').val(tecnico.nome_tecnico);
                $('[name="pda"]').val(tecnico.celular);
                $('[name="email"]').val(tecnico.email);
            });
        });
        $.getJSON('http://localhost/tecnet/app/ajax/JSON.php?buscausuario='+idtecnico, 
        function(data){
            if(data.length>0){
                $.each(data, function(i, us){
                    $(".usuario").text("Nome de usuário: "+us.usuario).css("display","block");
                });
            }
            else{
                $(".usuario").text("").css("display","none");
                $("#checkbox-gerar-user").css("display","block");
            }
            
            
        });
    }
//});
//--------------------------------------------------------------------------------------------
$(function (){
    $('[name="ver-pacote"]').change(function(){
        var idPacote = $(this).val();
        $.ajax({ 
            type: 'GET',
            dataType: 'html', 
            url: 'http://localhost/tecnet/?page=lineup',
            async: true,
            data: 'idpacote='+idPacote,
            success: function() {
                $('#lineup-wrap').load('http://localhost/tecnet/?page=lineup&idpacote='+idPacote+' #lineup');
            }
        });
    });
});

function alteraStatusSolicitacao(id,acao){
    $.ajax({ 
        type: 'GET',
        dataType: 'html', 
        url: 'http://localhost/tecnet/?page=solicitacoes&solicitacoes=gerenciar-solicitacoes&numero='+id,
        async: true,
        data: 'acao='+acao,
        success: function() {
            $('#painel-detalhes-solicitacao').load('http://localhost/tecnet/?page=solicitacoes&solicitacoes=gerenciar-solicitacoes&numero='+id+' #corpo-detalhes-solicitacao');
        },
        beforeSend: function(){
          $('.wrap-loader').css({display:"block"});
        },
        complete: function(){
          $('.wrap-loader').fadeOut(3000);
        }
    });
}