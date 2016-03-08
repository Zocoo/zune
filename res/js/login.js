function login() {
	var ur = eval(document.getElementById('ur')).value
	var psd = eval(document.getElementById('psd')).value
	$.ajax({
		type : 'post',
		url : '../../../src/action/useraction.php/login' + '?name=' + ur
				+ '&password=' + psd,
		cache : true,// 发送同步请求
		timeout : '1000',// 8秒超时
		dataType : 'json',
		success : function(html) {
			//alert(html);
		},
		error : function() {
		}
	});
}