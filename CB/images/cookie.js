function g(o){return document.getElementById(o);}
function HoverLi(n){
	for(var i=1;i<=25;i++){
		if(g('tb_'+i) != null){
			g('tb_'+i).className='normaltab_top';
			g('tbc_0'+i).className='undis_top';
		}
	}
	g('tbc_0'+n).className='dis_top';
	g('tb_'+n).className='hovertab_top';
}
/*
 * Cookie操作
 */
//var domain = "www.ofweekb2b.com";

function setCookie(name, value, expires) {
	document.cookie = name + "=" + escape(value)
			+ ("; path=/; domain=" + domain)
			+ ((expires) ? "; expires=" + expires.toGMTString() : "");
}

function getCookie(name) {

	var prefix = name + "=";
	var start = document.cookie.indexOf(prefix);
	if (start == -1)
		return null;
	var end = document.cookie.indexOf(";", start + prefix.length);
	if (end == -1)
		end = document.cookie.length;
	var value = document.cookie.substring(start + prefix.length, end);
	value = decodeURIComponent(value)
	return value;
}

function deleteCookie(name) {
	if (getCookie(name))
		document.cookie = name + "=" + ("; path=/; domain=" + domain)
				+ ";expires=Fri, 31 Dec 1999 23:59:59 GMT;";
}

function xiala(type){
	document.getElementById("type").value = type;

}

function xialanew(type){
	document.getElementById("mytype").value = type;
}

//首页及搜索页专用
function querynew() {

	var element = document.getElementById("mytype");
	var type = "";
	if(element.options){
		type = element.options[element.selectedIndex].value;
	}else{
		type = element.value;
	}
	var keywords = encodeURIComponent(document.getElementById("searchkeywords").value);

	keywords = keywords.replace(new RegExp("%20", "gm"), "%2520").replace(new RegExp("%26", "gm"), "%2526").replace(new RegExp("%2F", "gm"), "%252F");
//	if (type == '0') {
//		window.open( "http://www.ofweek.com/newsearch.action?keywords="+encodeURIComponent(keywords));
//	} else {
//		window.location.href="http://www.ofweek.com/newsearch.action?keywords="+encodeURIComponent(keywords)+"&type="+type;
//	}

	if(type=='0' || type=='1'){
		window.open("http://www.ofweek.com/SEARCH/WENZHANG/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='2'){
		window.open("http://www.ofweek.com/SEARCH/WENKU/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='3'){
		window.open("http://www.ofweek.com/SEARCH/PRODUCT/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='4'){
		window.open("http://www.ofweek.com/SEARCH/BBS/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='5'){
		window.open("http://www.ofweek.com/SEARCH/JOB/"+encodeURIComponent(keywords)+".HTM");
	}



}


//各个频道专用
function querynewChannel() {
   
	var element = document.getElementById("newtype");

	var type = "";
	if(element.options){
		type = element.options[element.selectedIndex].value;
	}else{
		type = element.value;
	}

	var keywords = encodeURIComponent(document.getElementById("searchkeywords").value);

	keywords = keywords.replace(new RegExp("%20", "gm"), "%2520").replace(new RegExp("%26", "gm"), "%2526").replace(new RegExp("%2F", "gm"), "%252F");
//	if (type == '0') {
//		window.location.href="http://www.ofweek.com/newsearch.action?keywords="+encodeURIComponent(keywords);
//	} else {
//		window.location.href="http://www.ofweek.com/newsearch.action?keywords="+encodeURIComponent(keywords)+"&type="+type;
//	}
	if(type=='0' || type=='1'){
	 
		 window.open("http://www.ofweek.com/SEARCH/WENZHANG/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='2'){		 
		window.open( "http://www.ofweek.com/SEARCH/WENKU/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='3'){
		window.open( "http://www.ofweek.com/SEARCH/PRODUCT/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='4'){
		window.open("http://www.ofweek.com/SEARCH/BBS/"+encodeURIComponent(keywords)+".HTM");
	}else if(type=='5'){
		window.open("http://www.ofweek.com/SEARCH/JOB/"+encodeURIComponent(keywords)+".HTM");
	}

}





function query() {
	var element = document.getElementById("type");
	var type = "";
	if(element.options){
		type = element.options[element.selectedIndex].value;
	}else{
		type = element.value;
	}
	var keywords = encodeURIComponent(document.getElementById("keyword").value);
	keywords = keywords.replace(new RegExp("%20", "gm"), "%2520").replace(new RegExp("%26", "gm"), "%2526").replace(new RegExp("%2F", "gm"), "%252F");
	//document.getElementById("keyword").disabled = "true";
	if (type == 'CHANPIN') {
		window.open("http://b2b.ofweek.com/search/productlist/" + keywords + ".html");
	} else if (type == 'GONGSI') {
		window.open("http://b2b.ofweek.com/search/companies/" + document.getElementById("keyword").value + ".html");
	} else if (type == 'BLOG') {
		window.open("http://bbs.ofweek.com/search.php?mod=blog&orderby=lastpost&ascdesc=desc&searchsubmit=yes&srchtxt=" + document.getElementById("keyword").value);
	} else if (type == 'DOWN') {
		var link = "http://download.ofweek.com/search-"+ 1 +"-"+ encodeURIComponent(keywords) +"-1.html";
		window.location.href = link;
	} else if (type == 'BAIKE') {
		window.open("http://baike.ofweek.com/bksearch-" + document.getElementById("keyword").value + ".html");
	} else if (type == 'QIUGOU') {
		window.open("http://b2b.ofweek.com/search/tradeleads/" +  document.getElementById("keyword").value + ".html");
	} else if (type == 'HR') {
		window.open("http://hr.ofweek.com/jobs/?key=" + document.getElementById("keyword").value);
	} else if (type == 'BBS') {
		window.open("http://bbs.ofweek.com/search.php?mod=forum&srchtxt=" + keywords + "&orderby=lastpost&ascdesc=desc&searchsubmit=yes");
	}else {
		window.location.href="http://www.ofweek.com/SEARCH/" + type + "/" + keywords + ".HTM";
	}
}


function selector(type) {
	if(type == "show") {
		document.getElementById('selector').style.display = 'block';
		if(document.getElementById('menu-back-div')) {
			document.getElementById('menu-back-div').style.zIndex = -2;
			document.getElementById('menu-div').style.zIndex = -1;
		}
	}else{
		document.getElementById('selector').style.display = 'none';
		if(document.getElementById('menu-back-div')) {
			document.getElementById('menu-back-div').style.zIndex = 0;
			document.getElementById('menu-div').style.zIndex = 0;
		}
	}
}


function ViverJavaPageTurnB2B(Formname,PageHideName){
	document.getElementById(PageHideName).value=document.getElementById('ViverGoTopages').value;
	var hrefpath = document.getElementById("hiddenhtmlHref").value+document.getElementById('ViverGoTopages').value+".html";
	document.getElementById(Formname).action=hrefpath;
	document.getElementById(Formname).submit();
}

function secBoard(elementID,listName,elementname,n) {
	var elem = document.getElementById(elementID);
	var elemlist = elem.getElementsByTagName(elementname);
	for (var i=0; i<elemlist.length; i++) {
	elemlist[i].className = "sel02";
	var m = i+1;
	document.getElementById(listName+"_"+m).style.display = "none";
	}
	elemlist[n-1].className = "sel01";
	document.getElementById(listName+"_"+n).style.display = "block";
}

jQuery(document).ready(function($){
  $("ul.newslist-2 li").hover(function(){
    if($(this).is(".wenzi")){
      $("ul.newslist-2 .tuwen-con").prev().css("display","block");
      $("ul.newslist-2 .tuwen-con").css("display","none");
      $(this).next().css("display","block");
      $(this).css("display","none");
      }
  });

  $(".xiala span").click(function(){
    $(".xiala ul").css("display","block");
  });

  $(".xiala ul").hover(function(){
    $(this).css("display","block");
  },function(){
    $(this).css("display","none");
  });

  $(".xiala li").hover(function(){
    $(this).addClass("bg");
  },function(){
    $(this).removeClass("bg");
  });

  $(".xiala li").click(function(){
    $(".xiala span").text($(this).text());
    $(".xiala ul").css("display","none");
  });
});
