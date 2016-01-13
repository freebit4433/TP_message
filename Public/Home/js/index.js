$(document).ready(function(){
	$("#submit").bind('click',function(){submit();});
	$(document).bind('keydown', function(event) {
		var keynum = event.which;
		if (keynum == 13) {
			submit();
		};
	});
	refresh();
})

function submit(){
	var url = $("#submitURL").text();
	var data = new Object;
	data.comment = $("#commentContent").val();
	$.post(url,data,function(rxData){
		if (rxData.flag) {
			//alert("提交成功!");
			refresh();
		};
		
	},'json');
}

function refresh(jumpPage=null){
	var url = $("#refreshURL").text();
	var deleteUrl = $("#deleteURL").text();
	var username = $("#username").text();
	var indexWrapper;
	var paramater = new Object;
	paramater.p = jumpPage;
	$("#commentContent").val('');
	$("#content").empty();
	$("#pageData").empty();

	$.get(url,paramater,function(data){
		for(var row in data){
			if (row == 'pagedata') {
				$("#pageData").prepend(data['pagedata']);
			}else{
				var htmlCont = '\
					<div id="indexWrapper" class="cX">\
						<span class="indexid" hidden="hidden">indexidcontent</span>\
						<img class="img" src="/ThinkPHP_APP/TP_Message/Public/Home/img/imgnum.jpg" />\
						<a class="userName" href="webpage">username</a>&nbsp;&nbsp;&nbsp;&nbsp;\
						<span class="date">datee</span>\
						<p clasa="text">commcon</p>\
						<a class="delete">删除</a>\
					</div>\
				';
				htmlCont = htmlCont.replace(/indexidcontent/,data[row]["id"]);
				htmlCont = htmlCont.replace(/username/,data[row]["username"]);
				htmlCont = htmlCont.replace(/datee/,data[row]["commenttime"]);
				htmlCont = htmlCont.replace(/imgnum/,data[row]["imgnum"]);
				htmlCont = htmlCont.replace(/webpage/,data[row]["webpage"]);
				htmlCont = htmlCont.replace(/commcon/,data[row]["comment"]);
				if (data[row]["username"] == username){
					indexWrapper = "indexWrapper" + data[row]["id"];
					htmlCont = htmlCont.replace(/indexWrapper/,indexWrapper);
				}else{
					htmlCont = htmlCont.replace(/indexWrapper/,"");
				}
				$("#content").append(htmlCont);

				if (data[row]["username"] == username) {
					$("#"+indexWrapper).bind('mouseenter',{indexWrapper:indexWrapper},function(event) {
						$("#" + event.data.indexWrapper + " .delete").css('display', 'block');
					});
					$("#" + indexWrapper).bind('mouseleave',{indexWrapper:indexWrapper}, function(event) {
						$("#" + event.data.indexWrapper + " .delete").css('display', 'none');
					});
					$("#" + indexWrapper + " .delete").bind('click',{id:data[row]["id"]}, function(event) {
						var txid = event.data.id;
						var txDataDelete = new Object();
						txDataDelete.deleteid = txid;
						$.post(deleteUrl,txDataDelete,function(rxData){
							if (rxData.flag) {
								alert("删除成功！");
								refresh();
							};
						},'json');
						txDataDelete = null;
					});
				};

				indexWrapper = null;
				htmlCont = null;
			}
		}
	},'json');
}