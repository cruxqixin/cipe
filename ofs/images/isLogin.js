function isLogin() {
	var str_cookie = getCookie('www_ofweekmember');
	if (str_cookie != null) {
		document.getElementById("loginshow").style.display = "none";
		var str = str_cookie.split("NPofweek");
		var userid = str[0];
		document.getElementById("loginInfo").style.display = "";
		var isemail = str[1];
		if (isemail == 1)
			document.getElementById("loginInfo").innerHTML += " 欢迎您：" + userid
					+ "！";
		else
			document.getElementById("loginInfo").innerHTML += " 欢迎您："
					+ userid
					+ "！<a href='http://www.ofweek.com/register/registerAffirm.do'><font color='#cc0000'>请确认您的帐号</font></a>&nbsp;&nbsp;";
	}
}

function htmlIsLogin(url) {
	var str_cookie = getCookie('www_ofweekmember');
	if (str_cookie == null) {
		self.location.href = url;
	}
}