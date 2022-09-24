<?php include_once "../db.php"; ?>
<?php include "../header/header-mypage.php"; ?>
<?php include_once "../mypage/mypageloading.php"; ?>

<!DOCTYPE html>
	<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<script language="JavaScript" type="text/javascript" src="../js/jquery-1.12.3.js"></script>
	<link rel="stylesheet" href="../css/css.css">
		<title>Document</title>
	</head>
<body>

<?php
	if(isset($row['name']) == null){
?>
	<div class="container">
		<div class="warning">
			<ul>
				<li>이런!<br>명함을&nbsp;찾을&nbsp;수&nbsp;없어요.</li>
				<li><button type="button" onclick="location.href='../archive.php'">패션&nbsp;유형&nbsp;검사하고&nbsp;명함&nbsp;만들기</button></li>
			</ul>
		</div>
	</div>
<?php }else{ ?>
	<div class="container">
		<div class="bg">
			<div class="myphoto">
				<form action="/mypage/profile.php" enctype="multipart/form-data" method="post" name="profile">
					<?php
						if($row['profile'] == ""){
					?>
					<img src="../img/boy.png" alt="profile" value ="변경" onclick="chgProfile();">
				<?php }else{?>
					<img src="../img/<?=$row['profile']; ?>" alt="profile" value ="변경" onclick="chgProfile();">
				<?php } ?>
					<input type="file" style="display: none;" id="profile" name="profile">
				</form>
				<ul>
					<li class="myname">
						<?php
						
							echo $row['name'];
						?>
					</li>
					<li>
						<?php
						
							echo $row['id'];
						?>
					</li>
				</ul>
			</div>
			<div class="introduce">
				<ul class="mail">
					<li><button>Mail</button></li>
				</ul>
				<ul class="like">
					<li><button>Like</button></li>
				</ul>
			</div>
			<div class="insta">
				<button>인스타그램&nbsp;공유</button>
			</div>
		</div>
		<div class="menu boxshadow">
			<input type="radio" id="homep" name="menus">
			<input type="radio" id="share" name="menus">
			<input type="radio" id="friend" name="menus">
			<ul class="menu1 bold">
				<li><label for="homep">HOMEPAGE</label></li>
			</ul>
			<ul class="menu2">
				<li><label for="share">SHARE</label></li>
			</ul>
			<ul class="menu3">
				<li><label for="friend">FRIENDS</label></li>
			</ul>
			<div class="line"></div>
		</div>
	</div>
</body>
</html>



<script>
	var menuBtn1 = document.querySelector(".menu1"),
		menuBtn2 = document.querySelector(".menu2"),
		menuBtn3 = document.querySelector(".menu3");

	function boldclick(){
		menuBtn1.classList.add("bold");
		menuBtn2.classList.remove("bold");
		menuBtn3.classList.remove("bold");
	}

	function boldclick2(){
		menuBtn2.classList.add("bold");
		menuBtn1.classList.remove("bold");
		menuBtn3.classList.remove("bold");
	}

		function boldclick3(){
		menuBtn1.classList.remove("bold");
		menuBtn2.classList.remove("bold");
		menuBtn3.classList.add("bold");
	}

	menuBtn1.addEventListener("click", boldclick);
	menuBtn2.addEventListener("click", boldclick2);
	menuBtn3.addEventListener("click", boldclick3);

	// myImg

	function chgProfile(){
		let myInput = document.getElementById("profile");
		myInput.click();

		myInput.onchange = function(){
			document.profile.submit();
		}
	}

	
	// //이미지 수정 플러스 이미지
	// const frontImg = document.getElementById("frontImg");

	// //파일 업로드 인풋태그
	// const inputfile = document.querySelector(".inputfile");

	// //이미지 업로드 폼태그
	// const save_img_form = document.getElementById("save_img_form");

	// //이미지 플러스 클릭
	// frontImg.onclick = () => {
	// 	inputfile.click();
	// }


	// function updateImageDisplay(){
	// 	const curFiles = inputfile.files;
	// 	if(curFiles.length === 0){
	// 		console.log("선택된 파일 없음.");
	// 	}else{
	// 		for(const file of curFiles){
	// 			if(fileTypes.includes(file.type)){
	// 				frontImg.src = URL.createObjectURL(file);
	// 				console.log(frontImg.src);
	// 			}else{
	// 				console.log("잘못된 파일형식입니다.");
	// 			}
	// 		}
	// 	}
	// }

	// // 파일 업로드 인풋 이벤트 리스너
	// inputfile.addEventListener('change', updateImageDisplay);

	// const fileTypes = [
	// 	'image/jpeg',
	// 	'image/pjpeg',
	// 	'image/png'  
	// ];

</script>

<?php  } ?>