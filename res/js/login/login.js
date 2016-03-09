document.onkeydown = function(event) {
	var e = event || window.event || arguments.callee.caller.arguments[0];
	if (e && e.keyCode == 13) { // enter 键

		login();
	}
};
function login() {
	var ur = eval(document.getElementById('ur')).value
	var psd = eval(document.getElementById('psd')).value
	$.ajax({
		type : 'get',
		url : '../../../src/action/useraction.php/login',
		cache : false,// 是否缓存
		data : {
			'name' : ur,
			'password' : psd
		},
		timeout : '10000',// 10时
		dataType : 'json',
		success : function(html) {
			if (html) {
				if (html.data) {
					if (html.data.code == 1) {
						location.href = "http://www.baidu.com";// location.href实现客户端页面的跳转
					} else {
						sweetAlert(html.data.msg, "Something went wrong!",
								"error");
					}
				}
			}
		},
		error : function() {
		}
	});
}