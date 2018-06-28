<script type="text/javascript">
 var final = "2000-01-01 01:01:01";

function cuser(){ //check user
  var name="<?=$_SESSION['name']?>";
  var id="<?=$_SESSION['id']?>";
  var img="<?=$_SESSION['img']?>";
		$.ajax({
			url : "connect.php",
			dataType : "text",
			data : {
				"name" : name,
				"id" : id,
				"img" : img
			},
			type : "post",
			success : function(user){


				$(".conuser").html(user)
			},
			error : function(){
				console.log("리스트 갱신 실패");
			}
		});
}
function nosee(){
	var id="<?=$_SESSION['id']?>";
	$.ajax({
		url : "app/control/content/nosee.php",
		dataType : "text",
		data : {
			"id" : id
		},
		type : "post",
		success : function(cnt){

			$("title").html("("+cnt+" )FakeBook")
			$(".repage p").html(cnt)
		},
		error : function(){
			console.log("안본 게시물");
		}
	});
}

function insert_co(idx,content,name,id,img,tag){
		var img_src;
		var code;
	$.ajax({
		url : "app/control/content/comment.php?idx="+idx,
		dataType : "text",
		data : {
			"idx" : idx,
 			"content" : content,
			"name" : name,
			"id" : id,
			"img" : img,
		},

		type : "post",
		success : function(user){


			if(img != "" && img != 0 || img != "0" ){
				img_src="<img src='public/img/"+img+".jpg' alt='male1' width='30' height='30'>";
			}
			else{
				img_src="<img src='public/img/male.jpg' alt='male' width='30' height='30'>";
			}

			code = "<div class='cname'><div class='cname_text'>"+img_src+"<p><span>"+name+"</span>"+content+"</p></div></div>";

			$(">div",tag).eq(0).after(code);
		},
		error : function(){
			console.log("댓글 실패");
		}
	});
}
	$(".comment_input").keyup(function(e){
		var idx;
		var content;
		var name;
	    var id;
	    var img;
		var tag;
		if(e.keyCode == 13){
			if($(this).val().trim() == ""){
				console.log("공백ㄴㄴ");
			}else{
				idx=$(this).attr("data-idx");
				content=$(this).val();
				name="<?=$_SESSION['name']?>";
			    id="<?=$_SESSION['id']?>";
			    img="<?=$_SESSION['img']?>";
				tag=this.parentNode.parentNode.parentNode;

				insert_co(idx,content,name,id,img,tag);

				//call_co(idx,tag);

				$(this).val("");
			}
		}
	})
	$(".love p").on('click',function(){
		var flag=$(this).attr("data-flag");
		var idx=$(this).attr("data-idx");
		var id="<?=$_SESSION['id']?>";
		var tag=this.parentNode.parentNode.parentNode;
		var text=$(" > .like_cnt p",tag).text();

		if(flag == "0"){

			$.ajax({
				url : "app/control/content/like.php",
				dataType : "text",
				data : {
					"id" : id,
					"idx" : idx
				},
				type : "post",
				error : function(){
					console.log("좋네요 실패");
				}
			});


			$(" > .like_cnt p",tag).text("회원님외 "+text);
			$(this).parent().css({"color":"#ef5350"});
			$(this).attr("data-flag","1");
		}
		else if(flag == "1"){

			$.ajax({
				url : "app/control/content/nolike.php",
				dataType : "text",
				data : {
					"id" : id,
					"idx" : idx
				},
				type : "post",

				error : function(){
					console.log("좋네요 실패");
				}
			});

			var s=text.split(" ");
			$(" > .like_cnt p",tag).text(s[1]);
			console.log(text);
			$(this).parent().css({"color":"rgba(0,0,0,0.87)"});
			$(this).attr("data-flag","0");
		}
	})


	var userc = setInterval(cuser,1000);
	var noseec =setInterval(nosee,1000);
</script>
