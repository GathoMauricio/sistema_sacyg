<?php session_start(); ?>
<?php 
if(!isset($_SESSION['contador']))
{
	$_SESSION['contador']=1;
	$_SESSION['alimento'.$_SESSION['contador']]=$_POST['id_alimento'];

}else
{
$_SESSION['contador']++;
$_SESSION['alimento'.$_SESSION['contador']]=$_POST['id_alimento'];	
}

/*for ($i=0; $i <= $_SESSION['contador']; $i++) { 
	echo $_SESSION['alimento'.$i].'<br>';
}*/
echo $_SESSION['contador'];
 ?>