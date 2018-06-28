
<?php
	include('app/server/db.php');


	if(empty($_SESSION['id']) || empty($_SESSION['name'])){
		exit("<script>location.href='app/view/member/join.php'</script>");
	}
	$sql="UPDATE member SET nosee = 0 WHERE id = '{$_SESSION['id']}' ";
	$rs=$db->prepare($sql);
	$rs->execute();

	$key = isset($_GET["key"]) ? $_GET["key"] : null;
	$id = isset($_GET["id"]) ? $_GET["id"] : null;
	$cid = isset($_GET["cid"]) ? $_GET["cid"] : null;
	$where = "";
	$key_p="";
	$id_p="";
	$cid_p="";

	if($key){
		$where = " where content like '%{$key}%' OR name like '%{$key}%' ";
		$key_p = "&key={$key}";
	}
	else if($id){
		$where = " where id='{$id}'";
		$id_p = "&id={$id}";
	}
	else if($cid){
		$cwhere = " where id='{$cid}'";
		$cid_p = "&cid={$cid}";
	}

	$sql="select * from member where id='{$_SESSION['id']}'";

	$ex1=$db->prepare($sql);
	$ex2=$ex1->execute();
	$val=$ex1->fetch();
?>
<!DOCTYPE html>
<html lang="ko">
<head>
	<meta charset="UTF-8">
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="public/css/materialize.min.css" media="screen,projection" />
	<link rel="stylesheet" href="public/css/fake.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>(0)FakeBook</title>
</head>

<body>



	<div id="wrap">
		<!-- Modal Trigger -->
	  <div id="modal1" class="modal">
	    <div class="modal-content">
	      <h4>개인정보 수정</h4>
		  <form data-brackets-id="248" action="app/control/member/edit.php" method="post" enctype="multipart/form-data">
			  <div data-brackets-id="249" class="file-field input-field">
			<div data-brackets-id="250" class="btn">
			  <span data-brackets-id="251">이미지변경</span>
			  <input data-brackets-id="252" type="file" name="img">
			</div>
			<div data-brackets-id="253" class="row">
			  <input data-brackets-id="254" class="file-path validate" type="text">
			</div>
		  </div>
		  <div data-brackets-id="255" class="row">
			  이름<input data-brackets-id="256" type="text" placeholder="..." max="10" name="name">
			  </div>
			  <div data-brackets-id="257" class="row">
				  비밀번호<input data-brackets-id="258" type="text" placeholder=".." max="10" name="pw">
			  </div>
			  <div data-brackets-id="259" class="row">
				  소갯글<input data-brackets-id="260" type="text" placeholder="." max="10" name="aboutme" maxlength="10">
			  </div>
			  <div data-brackets-id="261" class="row">
				  생년월일<input data-brackets-id="262" type="date" name="birth">
			  </div>
			  <div class="modal-footer">
			  <button type="submit" name="button" class="modal-action modal-close waves-effect waves-green btn right">수정하기</button>
  		    </div>
		  </form>

	    </div>

	  </div>

		<header>
			<nav>
				<div class="nav-wrapper">
					<a href="/" id="logo">FakeBook</a>
					<form class="left search_form" method="get" id="s_f">
						<div class="input-field search_box">
							<input id="search" type="search" name="key">
							<label class="label-icon" for="search"><i class="material-icons">search</i></label>
						</div>
					</form>
					<ul class="right">
						<li><a href="app/control/member/logout.php" class="waves-effect waves-light btn">로그아웃</a></li>
					</ul>
					<div class="right myname">
						<div class="myname_text">
						<?php
							if($val['img']=="0"){
						?>
							<img src="public/img/male.jpg" alt="male" width="30" height="30">
						<?php }
							else{
							?>
							<img src="public/img/<?= $val['id']?>.jpg" alt="male" width="30" height="30">
							<?php } ?>
							<p><span><?= $val['name']?></span></p>
						</div>
					</div>
				</div>
			</nav>
		</header>
		<div id="slide-ona" class="profile">
			<div class="name">
				<?php
					if($val['img']=="0"){
				?>
					<img src="public/img/male.jpg" alt="male" width="80" height="80">
				<?php }
					else{
					?>
					<img src="public/img/<?= $val['id']?>.jpg" alt="male" width="80" height="80">
					<?php } ?>
			</div>
			<div class="name_text">
				<span><?=$val['name']?></span>
				<p><?=$val['aboutme']?></p>
			</div>
			<ul>
				<li><a class="waves-effect waves-light modal-trigger" href="#modal1">개인정보 수정</a></li>
				<li><a class="waves-effect waves-light" href="/">모두보기</a></li>
				<li><a class="waves-effect waves-light" onclick="location.replace('/?id=<?=$val['id']?>')">내글보기</a></li>
				<!-- <li><a class="waves-effect waves-light" onclick="location.replace('/?cid=<?=$val['id']?>')">내가쓴댓글</a></li> -->
				<li><a class="waves-effect waves-light" onclick="chat()">채팅방</a></li>
			</ul>
		</div>

		<section id="content">



			<div class="content_box">
				<div class="name">
					<?php
						if($val['img']=="0"){
					?>
						<img src="public/img/male.jpg" alt="male" style="width:50px;height:30px">
					<?php }
						else{
						?>
						<img src="public/img/<?= $val['id']?>.jpg" alt="male" style="width:50px;height:50px">
						<?php } ?>
					<div class="name_text">
						<span><?=$val['name']?></span>
					</div>
				</div>

				<div class="content_text">
				  <div class="row">
				    <form class="col s12" action="app/control/content/board.php" method="post" enctype="multipart/form-data">
				      <div class="row">
				        <div class="input-field col s12">
				          <i class="material-icons prefix">mode_edit</i>
				          <textarea id="icon_prefix2" class="materialize-textarea" name="content"></textarea>
				          <label for="icon_prefix2"><?=$val['name']?>님 무슨 생각을 하고 계신가요?</label>
				        </div>
				      </div>
					    <div class="file-field input-field">
					      <div class="btn file_btn left">
					        <span>File</span>
					        <input type="file" name="img">
					      </div>
					      <div class="file-path-wrapper">
					        <input class="file-path validate" type="text" name="img">
					      </div>
					    </div>
							<button type="submit" name="button" class="waves-effect waves-light btn right">게시하기</button>
				    </form>
				  </div>
				</div>

			</div>
			<?php
				$sql="select * from board{$where} order by idx desc";

				$rs=$db->prepare($sql);
				$rs->execute();
				foreach ($rs as $row) {

			?>
			<div class="content_box">
				<?php
					if($_SESSION['id'] == $row['id']){
				?>
				<a onclick="location.replace('app/control/content/delete.php?idx=<?=$row['idx']?>')" class="waves-effect waves-light btn right del">삭제</a>
			<?php }?>
				<div class="name">
					<?php
						$sql="select * from member where id='{$row['id']}'";
						$rs=$db->prepare($sql);
						$rs->execute();
						$val=$rs->fetch();

						if($row['id'] == $val['img']){
					?>
					<img src="public/img/<?=$row['id']?>.jpg" alt="male" width="50" height="50">
				<?php } else{?>
					<img src="public/img/male.jpg" alt="male" width="50" height="50">
				<?php }?>
					<div class="name_text">
						<span><a onclick="location.replace('/?id=<?=$val['id']?>')" class="content_name"><?=$row['name']?></a><br><?=$row['date']?></span>
					</div>
				</div>
				<div class="content_text">
					<pre><?=$row['content']?>

					</pre>
					<?php
						if($row['img'] != ""){
					?>
					<img src="public/img/<?=$row['img']?>.jpg" alt="male" style="width:100%">
				<?php }?>
				</div>
				<div class="like_cnt">
					<?php
						$sql3="select * from like_board where id='{$_SESSION['id']}' and lidx='{$row['idx']}'";
						$rs=$db->prepare($sql3);
						$rs->execute();
						if($rs->rowcount() <= 0){
					?>
				<i class="material-icons left">favorite</i><p><?=$row['cnt']?>명</p>
			<?php }else{?>
					<i class="material-icons left">favorite</i><p>회원님외 <?=$row['cnt']-1?>명</p>
			<?php }?>
				</div>
				<div class="button_box">
					<?php

						if($rs->rowcount() <= 0){
					?>
					<div class="love like_noactive"><i class="material-icons">favorite</i>
						<p data-idx="<?=$row['idx']?>" data-flag="0">좋네요</p>
					</div>
				<?php }else{?>
					<div class="love like_noactive" style="color: rgb(239, 83, 80);"><i class="material-icons">favorite</i>
						<p data-idx="<?=$row['idx']?>" data-flag="1">좋네요</p>
					</div>
				<?php }?>
					<div class="comment"><i class="material-icons">chat_bubble</i>
						<p>댓글달기</p>
					</div>
				</div>
				<div class="comment_box">
					 <!-- <form action="#1"> -->
						<div class="row">
							<div class="input-field col s12">
								<input id="comment" type="text" class="validate comment_input" name="comment" data-idx="<?=$row['idx']?>">
								<label for="comment">댓글을 입력하세요.</label>
								<p>댓글을 게시 하려면 Enter를 누르세요.</p>

							</div>
						</div>
					<!-- </form> -->
					<?php
						$csql="select * from comment where lidx = {$row['idx']} order by idx desc";
						$crs=$db->prepare($csql);
						$crs->execute();
						foreach ($crs as $crow) {

					?>
					<div class="cname">
						<div class="cname_text">
						<?php
							if($crow['id'] == $crow['img']){
						?>
							<img src="public/img/<?=$crow['id']?>.jpg" alt="male" width="30" height="30">
						<?php } else{?>
							<img src="public/img/male.jpg" alt="male" width="30" height="30">
						<?php }?>
							<p><span><?=$crow['name']?></span><?=$crow['content']?></p>
							<?php
								if($_SESSION['id'] == $crow['id']){
							?>
							<a onclick="location.replace('app/control/content/cdelete.php?idx=<?=$crow['idx']?>')" class="waves-effect waves-light btn right del small" style="margin-top:-20px;margin-left:200px">삭제</a>
							<?php }?>
						</div>
					</div>
				<?php }?>
				</div>
			</div>
		<?php }?>
		<a href="#" data-activates="slide-ona" class="bottom_btn1 left btn">프로필</a>
 		<a href="#" data-activates="slide-on" class="bottom_btn2 right btn">접속유저</a>
		</section>

			<ul id="slide-on" class="side-nav member_box conuser">

				<!-- <li>
					<div class="cname">
						<div class="cname_text">
							<img src="public/img/male.jpg" alt="male">
							<p><span>홍길동</span></p>
						</div>
					</div>
				</li> -->
			</ul>
		</div>
		<div class="repage" onclick="location.replace('/')">
			<p></p>
		</div>
	</div>
</body>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="public/js/materialize.min.js"></script>
<script type="text/javascript" src="public/js/fake.js"></script>
<?php
	include("main_ajax.php");
?>
</html>
