/*建站时间*/
function show_date_time(){window.setTimeout("show_date_time()",1e3);var BirthDay=new Date("2015/06/06"),today=new Date,timeold=today.getTime()-BirthDay.getTime(),msPerDay=864e5,e_daysold=timeold/msPerDay,daysold=Math.floor(e_daysold),e_hrsold=24*(e_daysold-daysold),hrsold=Math.floor(e_hrsold),e_minsold=60*(e_hrsold-hrsold),minsold=Math.floor(60*(e_hrsold-hrsold)),seconds=Math.floor(60*(e_minsold-minsold));span_dt_dt.innerHTML=daysold+"天"+hrsold+"小时"+minsold+"分"+seconds+"秒";}
show_date_time();

/*置顶置底*/
   $(function(){
        $("#lamu img").eq(0).click(function(){$("html,body").animate({scrollTop :0}, 800);return false;});
        $("#leimu img").eq(0).click(function(){$("html,body").animate({scrollTop : $(document).height()}, 800);return false;});
      });

$.extend({
/*手机菜单按钮*/
Menu: function() {

 $('#sidebar').toggleClass('menus');
 $('#header').toggleClass('menu');
 $('#bug').toggleClass('bugright');
 $('#bottom-bar').toggleClass('bugright');
 $('#zhezhao').toggleClass('zhezhao');
},

Sousuo: function() { $('.js-toggle-search').toggleClass('is-active');
            $('.js-search').toggleClass('is-visible');
},

Close: function(){
 if($('.js-search').hasClass('is-visible')){
                $('.js-toggle-search').toggleClass('is-active');
                $('.js-search').toggleClass('is-visible');}
},

});

$(document).ready(function(){  

    var p=0,t=0;  
  
    $(window).scroll(function(e){  
            p = $(this).scrollTop();  
if(!$('#header').hasClass('menu')){

if($('#bottom-bar').hasClass('bottom-post-bar')){
 if(t<=p){$('#bottom-bar').removeClass('ok');$('#bottom-bar').addClass('ko');}       
else{$('#bottom-bar').removeClass('ko');$('#bottom-bar').addClass('ok');}  
}

if($('#header').hasClass('header')){
if(t<=p){$('#header').removeClass('dn');$('#header').addClass('up');}  
else{
if($('#header').hasClass('up')){$('#header').removeClass('up');$('#header').addClass('dn');
  setTimeout(function(){$('#header').removeClass('dn');},250);
}
}  
}
            
}
            setTimeout(function(){t = p;},0);         
    });  
});  


window.onresize = function(){
 $('#sidebar').removeClass('menus');
 $('#header').removeClass('menu'); $('#bug').removeClass('right');
 $('#zhezhao').removeClass('zhezhao');
}


