$(function(){setTimeout(function(){$('.alert').hide();},5000);$('.tp-banner').revolution({startwidth:1170,startheight:640,hideThumbs:10,fullWidth:"on",});$('#front-header').removeClass();$('body').removeClass();$('body').addClass('home');$('#search').on('click',function(){if($('#srch-term').val()!="")
$('#search-form').submit();});$('header.expert').addClass('nobackground');var div=$('.easier_course');var start=100;$.event.add(window,"scroll",function(){var p=$(window).scrollTop();if(p>start){$('header.expert').removeClass('nobackground');$('header.expert').addClass('hasbackground');}else{$('header.expert').removeClass('hasbackground');$('header.expert').addClass('nobackground');}});});$(document).ready(function(){$('.mapfooter img').attr('src',$('.mapfooter img').data('original'));$('.footlogo img').attr('src',$('.footlogo img').data('original'));$(".slide-prev").click(function(){$(".bx-prev").click();});$(".slide-next").click(function(){$(".bx-next").click();});$(".enter-prev").click(function(){$(".bx-prev").click();});$(".enter-next").click(function(){$(".bx-next").click();});setTimeout(function(){loadimages();},3000);$.ajax({url:sitelink+'test_load_blocks',type:'get',contentType:"text/plain;charset=UTF-8",success:function(data){$('#load_block').html(data);setTimeout(function(){loadimages();},6000);}});setTimeout(function(){$.ajax({url:sitelink+"test_load_footer",type:'get',contentType:"text/plain;charset=UTF-8",success:function(data){$('#footer_block').html(data);$('.bxslider-post').bxSlider({minSlides:1,maxSlides:4,slideWidth:300,infiniteLoop:true,hideControlOnEnd:false,slideMargin:0,center:false,responsive:false,controls:true,});$('.bxslider-rating').bxSlider({minSlides:1,maxSlides:4,slideWidth:300,infiniteLoop:true,hideControlOnEnd:false,slideMargin:0,center:false,responsive:false,controls:true,});$('.testimonial').bxSlider({minSlides:1,maxSlides:1,infiniteLoop:true,hideControlOnEnd:false,slideMargin:0,center:true,pager:true,});$('.enterprise').bxSlider({minSlides:3,maxSlides:8,slideWidth:146,slideMargin:10,infiniteLoop:true,center:true});$('.bxslider').bxSlider({minSlides:3,maxSlides:8,slideWidth:146,slideMargin:10,infiniteLoop:true});setTimeout(function(){loadimages();},6000);}});},3000);$('#latrecorded_tab').click(function(){if($('#sectionD').contents().length==1){$('#sectionD').html("<div align='center'><img src='"+sitelink+"assets/skillrary/images/spacer.gif' class='lazy' width='400' height='300'></div>");$.ajax({url:sitelink+"latrecorded_load",type:'get',success:function(data){$('#sectionD').html(data);loadJS();}});}});$('#featured_tab').click(function(){if($('#sectionB').contents().length==1){$('#sectionB').html("<div align='center'><img src='"+sitelink+"assets/skillrary/images/spacer.gif' class='lazy' width='400' height='300'></div>");$.ajax({url:sitelink+"featured_load",type:'get',success:function(data){$('#sectionB').html(data);loadJS();}});}});$('#mostviewed_tab').click(function(){if($('#sectionC').contents().length==1){$('#sectionC').html("<div align='center'><img src='"+sitelink+"assets/skillrary/images/spacer.gif' class='lazy' width='400' height='300'></div>");$.ajax({url:sitelink+"mostviewed_load",type:'get',success:function(data){$('#sectionC').html(data);loadJS();}});}});loadJS();});$(document).on('click','.addwishlist',function(){var cid=$(this).data('cid');var type=$(this).attr('data-type');var me=$(this);if(me.data('requestRunning')){return;}
me.data('requestRunning',true);$.ajaxSetup({headers:{'X-CSRF-TOKEN':$('input[name="_token"]').val()}});$.ajax({type:'POST',url:sitelink+'course/wishlist',data:'cid='+cid+'&type='+type,contentType:"text/plain;charset=UTF-8",success:function(data){var obj=jQuery.parseJSON(data);if(obj.status=='0'){if(type=='0'){$('.changeicon-'+cid+' .icon-'+cid).html('<i class="fa fa-heart-o"></i>');$('.changeicon-'+cid).attr('data-type',1);msg="{!! Lang::get('core.remove_wishlist') !!}";}else if(type=='1'){$('.changeicon-'+cid+' .icon-'+cid).html('<i class="fa fa-heart"></i>');$('.changeicon-'+cid).attr('data-type',0);msg="{!! Lang::get('core.new_add_wishlist') !!}";}
toastr.success("Success",msg);toastr.options={"closeButton":true,"debug":false,"positionClass":"toast-bottom-right","onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"5000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"}}else if(obj.status=='1'){toastr.error("Error","{!! Lang::get('core.login_error') !!}");toastr.clear();toastr.options={"closeButton":true,"debug":false,"positionClass":"toast-bottom-right","onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"2000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut","preventDuplicates":true,}}else if(obj.status=='2'){toastr.error("Error","{!! Lang::get('core.comments_error') !!}");toastr.options={"closeButton":true,"debug":false,"positionClass":"toast-bottom-right","onclick":null,"showDuration":"300","hideDuration":"1000","timeOut":"5000","extendedTimeOut":"1000","showEasing":"swing","hideEasing":"linear","showMethod":"fadeIn","hideMethod":"fadeOut"}}
return false;},complete:function(){me.data('requestRunning',false);}});});$(document).scroll(function(){var setcount=$('#tcount').html();if($(this).scrollTop()>=$('.tab-content').offset().top){if(setcount==0)
{$(".count").each(function(index){var data_to=$(this).attr('data-to');var this_data=$(this);$(this_data).find('h4').countTo({from:00,to:data_to,speed:3000,refreshInterval:50,onComplete:function(value){}});});}
$('#tcount').html("1");}});$(document).mouseup(function(e){var container=$(".mobile_menu .menu");if(!container.is(e.target)&&container.has(e.target).length===0){$('body').removeClass('slidemenu');$('.mobile_menu .menu').animate({left:"-285px"},200);}});window.dataLayer=window.dataLayer||[];function gtag(){dataLayer.push(arguments);}
function loadimages(){$(".lazy").lazyload({event:"lazyload",effect:"fadeIn",effectspeed:2000}).trigger("lazyload");}
function loadJS(){$('.tooltip').tooltipster();$('.tooltip').tooltipster({animation:'swing',delay:300,delayTouch:500,interactive:true,position:'right',theme:'tooltipster-punk',contentCloning:false,trigger:'click'});$('.ReadonlyRating').raty({score:function(){return $(this).attr('data-score');},readOnly:true,starOff:sitelink+"assets/skillrary/static/img/star-off.png",starOn:sitelink+"assets/skillrary/static/img/star-on.png",starHalf:sitelink+"assets/skillrary/static/img/star-half.png"});loadimages();}
function zendesk(){var element=document.createElement("script");element.src="https://static.zdassets.com/ekr/snippet.js?key=web_widget/skillraryhelp.zendesk.com";element.id="ze-snippet";element.async=true;document.body.appendChild(element);}
function add_chatinline(){var hccid=47827467;var nt=document.createElement("script");nt.async=true;nt.src="https://mylivechat.com/chatinline.aspx?hccid="+hccid;var ct=document.getElementsByTagName("script")[0];ct.parentNode.insertBefore(nt,ct);}
$(window).on("load",function(){setTimeout(function(){$('.iframe_container').each(function(){var videoid=$(this).data('videoid');$(this).find('.thumbnail-link').html('<iframe class="videomine-frame" width="100%" height="100%" src="https://www.youtube.com/embed/'+videoid+'" frameborder="0" ></iframe>');});$("#youtube_id").html('<iframe class="videomine-frame" width="470" height="288" src="https://www.youtube.com/embed/zlUnD1TEnT4" frameborder="0" ></iframe>');},10000);setTimeout(function(){$.getScript("https://www.googletagmanager.com/gtag/js?id=AW-771090099",function(data,textStatus,jqxhr){});gtag('js',new Date());gtag('config','AW-771090099');gtag('event','conversion',{'send_to':'AW-771090099/U4UwCL_bmp4BELPN1-8C'});},10000);});