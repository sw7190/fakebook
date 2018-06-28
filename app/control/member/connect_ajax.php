
<script>
function cuser(){ //check user

  var name="<?=$_SESSION['name']?>";
  var id="<?=$_SESSION['id']?>";
  var img="<?=$_SESSION['img']?>";

        $.ajax({
            url : "app/control/member/connect.php",
            dataType : "text",
            data : {
                "name" : name,
                "id" : id,
                "img" : img
            },
            type : "post",
            success : function(user){
                console.log('접속자 리스트 갱신 성공');
                console.log(name+" "+id+" "img+" ")
                $("#conuser").html(user)
            },
            error : function(){
                console.log("리스트 갱신 실패");
            }
        });
}
    var userc = setInterval(cuser,1000);
</script>
