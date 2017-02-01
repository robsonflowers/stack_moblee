$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});
//$(function(){
//    
//    $(".exibeMenu").click(function() {
//        var tamanhoJanela = $(window).width();
//        if(tamanhoJanela<768){
//            if($("[role='main']").hasClass("col-xs-8 col-xs-offset-4 sem-padding")){
//                $(".sidebar").css({"display":"none"});
//                $(".table-responsive").removeClass("overflow-hidden");
//                $("[role='main']").removeClass("col-xs-8 col-xs-offset-4 sem-padding",800);
//            }
//            else{
//                $(".sidebar").css({"display":"block"});
//                $(".table-responsive").addClass("overflow-hidden");
//                $("[role='main']").addClass("col-xs-8 col-xs-offset-4 sem-padding",800);
//            }
//        }
//        
//    });
//    
//});
//$(window).resize(function() {
//    var tamanhoSidebar = $(".sidebar").width();
//    alert(tamanhoSidebar);
//    var tamanhoJanela = $(window).width();
//    if(tamanhoJanela>768){
//        $(".sidebar").css({"display":"block"});
//    }
//    else{
//        $(".sidebar").css({"display":"none"});
//    }
//    
//});
$(window).resize(function() {
    var tamanhoJanela = $(window).width();
    var tamanhoSidebar = $(".sidebar").outerWidth();
    if(tamanhoJanela>768){
        $(".sidebar").removeClass("sidebar-fechado");
        $(".sidebar").css({'left':'0px'});
    }
    else{
        $(".sidebar").css({'left':"-"+tamanhoSidebar+"px"});
        $(".sidebar").addClass("sidebar-fechado");
        
    }
});
$(document).ready(function() {
    var tamanhoJanela = $(window).width();
    if(tamanhoJanela<768){
        $(".sidebar").addClass("sidebar-fechado");
    }
    else{
        $(".sidebar").removeClass("sidebar-fechado");
    }
});
$(function(){
    
    $(".exibeMenu").click(function() {
        var tamanhoJanela = $(window).width();
        if(tamanhoJanela<768){
            var tamanhoSidebar = $(".sidebar").outerWidth();
            if($(".sidebar").hasClass("sidebar-fechado")){
                $(".sidebar").css({"left":"-"+tamanhoSidebar+"px","display":"block"}).animate({left: "0px"}, 300);
                $(".sidebar").removeClass("sidebar-fechado");
            }
            else{
                $(".sidebar").css({'left':'0px'}).animate({left: '-'+tamanhoSidebar+'px'}, 300);
                $(".sidebar").addClass("sidebar-fechado");
            }
        }
    });
});




$(function(){
   $('.cpf').mask('999.999.999-99');
   $('.ctps').mask('9999999 99999 aa');
   $('.telefone, .celular').mask('(99)  9999-9999');
   
});

var SITE = SITE || {};
 
SITE.fileInputs = function() {
  var $this = $(this),
      $val = $this.val(),
      valArray = $val.split('\\'),
      newVal = valArray[valArray.length-1],
      $button = $this.siblings('.button');
  if(newVal !== '') {
    $button.text(newVal);
  }
};





			
				