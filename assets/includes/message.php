<?php
if(isset($_SESSION['success']['message'])&&$_SESSION['success']['message']!=""){
?>
	 <div class="alert alert-success" style="margin-top:25px; text-align:center">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
		<b><?=$_SESSION['success']['message'];?></b>
	 </div>
<?php
unset($_SESSION['success']['message']);
}
elseif(isset($_SESSION['success']['message'])&&$_SESSION['success']['message']==""){
	unset($_SESSION['success']['message']);
}
if(isset($_SESSION['failure']['message'])&&$_SESSION['failure']['message']!=""){
?>
	 <div class="alert alert-danger" style="margin-top:25px; text-align:center">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
		<b><?=$_SESSION['failure']['message'];?></b>
	 </div>
<?php
unset($_SESSION['failure']['message']);
}
elseif(isset($_SESSION['failure']['message'])&&$_SESSION['failure']['message']==""){
	unset($_SESSION['failure']['message']);
}
if(isset($_SESSION['warning']['message'])&&$_SESSION['warning']['message']!=""){
?>
	 <div class="alert alert-warning" style="margin-top:25px; text-align:center">
	 <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">&times;</a>
		<b><?=$_SESSION['warning']['message'];?></b>
	 </div>
<?php
unset($_SESSION['warning']['message']);
}
elseif(isset($_SESSION['warning']['message'])&&$_SESSION['warning']['message']==""){
	unset($_SESSION['warning']['message']);
}

?>
