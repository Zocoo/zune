function login() {
	var ur = eval(document.getElementById('ur')).value
	var psd = eval(document.getElementById('psd')).value
	$.ajax({
		type : 'get',
		url : '../../../src/action/useraction.php/login',
		cache : false,// 发送同步请求
		data:{'name':ur,'password':psd},
		timeout : '10000',// 8秒超时
		dataType : 'json',
		success : function(html) {
			//alert(html);
		},
		error : function() {
		}
	});
}