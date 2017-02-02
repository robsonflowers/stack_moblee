
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++                
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// FUNÇÃO PARA BUSCAR OS DADOS PELA API STACKEXCHANGE
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
// +++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function(){
    $('.persistir').submit(function(){
        $.getJSON('https://api.stackexchange.com/2.2/search?page=1&pagesize=99&todate=1485907200&order=desc&sort=creation&tagged=php&site=stackoverflow', 
        function(data){
            $.each(data.items, function(i, log){
                //
                $('.ver').append("TAGs: "+log.tags+" - Dono: "+log.owner.display_name+" - Question ID: "+log.question_id+" - Link: <a href='"+log.link+"'>"+log.title+"</a>"+"<br>");
                
//              inserir aqui o ajax para insercao em BD
            });
        });
        return false;
    });
});
