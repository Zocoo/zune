var userid;
function sendemail() {
	var email = eval(document.getElementById('email')).value
	$.ajax({
		type : 'get',
		url : '../../../src/action/useraction.php/adduser',
		cache : false,// 是否缓存
		data : {
			'email' : email,
		},
		timeout : '10000',// 10秒超时
		dataType : 'json',
		success : function(html) {
			if (html) {
				if (html.data) {
					if (html.data.code == 0) {
						sweetAlert(html.data.msg, "Something went wrong!",
								"error");
					} else {
						if (html.data.id) {
							userid = html.data.id;
						} else {
							sweetAlert("unknown error",
									"Something went wrong!", "error");
						}
					}
				}
			}
		},
		error : function() {
		}
	});
}

function add() {
	var code = eval(document.getElementById('code')).value;
	var psd1 = eval(document.getElementById('psd1')).value;
	var psd2 = eval(document.getElementById('psd2')).value;
	if (psd1 == psd2) {
		$.ajax({
			type : 'get',
			url : '../../../src/action/useraction.php/cheak',
			cache : false,// 是否缓存
			data : {
				'id' : userid,
				'code' : code,
				'password' : psd1
			},
			timeout : '10000',// 10秒超时
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
	} else {
		sweetAlert("两次输入的秘密不一致！", "Something went wrong!", "error");
	}
}