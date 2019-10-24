var jQ=$;
var user_id=0;
var user_token='';
var scool_isend=1;
var T = {
	 get:function(url,data,callback){
		data['_user_token']=user_token;
		jQ.ajax({
		  type: 'GET',
		  dataType: 'json',
		  url: url,
		  data: data,
		  headers: {Accept: "application/json; charset=utf-8",'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		  success: function(res){
			callback(res);
		  }
		});
	},
	post:function (url,data,callback){
		data['_user_token']=user_token;
		jQ.ajax({
		  type: 'POST',
		  dataType: 'json',
		  url: url,
		  data: data,
		  headers: {Accept: "application/json; charset=utf-8",'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
		  success: function(res){
			callback(res);
		  }
		});
	},
	isPhoneNumber:function(tel) {
		var reg =/^0?1[3|4|5|6|7|8|9][0-9]\d{8}$/;
		return reg.test(tel);
	},
	autoScool:function(callback){
		var range = 0; //距下边界长度/单位px
		var totalheight = 0;
		var height = document.documentElement.clientHeight || document.body.clientHeight;
		$(window).scroll(function(){
			var srollPos = $(window).scrollTop();
			totalheight = parseFloat(height) + parseFloat(srollPos);
			console.log(totalheight);
			console.log($(document).height()-range);
			if(($(document).height()-range) <= totalheight ) {
				if(scool_isend){
					scool_isend=0;
					callback();
					setTimeout(function(){scool_isend=1;},500);
				}
			}
		});
	},
	getWebGPS:function(){
		if (navigator.geolocation) {
			navigator.geolocation.getCurrentPosition(function (position) {
				var lat = position.coords.latitude;
				var lon = position.coords.longitude;
				console.log(lat);
				console.log(lon);
			});
		}
		console.log('获取位置失败');
		return ;		
	},
	
	
	
};

