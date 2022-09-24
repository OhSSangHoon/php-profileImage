<?php 
	include_once "../db.php";

	$user = $_SESSION['no'];

	$profile = $_FILES['profile']['name']; //선택된 사진 파일명
	//echo $profile;
	$updir = "../img/"; //업로드 디렉토리

	//서버에 파일 저장
	move_uploaded_file($_FILES['profile']['tmp_name'], $updir.$profile);
	chmod($updir.$profile, 0777); //이동된 파일의 권한 변경

	//사용자 테이블에 사진 파일명 저장
	$sql = "UPDATE mycard SET profile = '$profile' WHERE no = '".$user."'";
	$result = $db->query($sql);

	if(!$sql) error("다시 시도");
	
	echo $profile, $user;
?>
<script>
	window.alert("프로필이 변경되었습니다.");
	location.href ="../mypage/mypage.php";
	
</script>