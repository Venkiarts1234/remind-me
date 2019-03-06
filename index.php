<?php
 echo 'Meta tags added';
 include './classes/user.class.php';
 session_start();
 $user = new User;
 $message = '';

 if(isset($_REQUEST["btnLogin"])){
      $field = array(
           'username'     =>     $_REQUEST["username"],
           'password'     =>     $_REQUEST["password"]
      );
      if($user->required_validation($field)){

          if($user->login($field)){

            $_SESSION["username"] = $_REQUEST["username"];
    				$_SESSION["userlevel"] = $user->row["userLevel"];

            echo $_SESSION["userlevel"]."<br/>";;
            header("location:loginsuccess.php");

        }else
        {
          $message = $user->error;
          //echo $message."<br/>";
          // header("location:index.php");
        }
      }else
      {
           $message = $user->error;
      }
}
 ?>

<h3>Task 1</h3>
<form action="" method="post" class="form-style-4">
		<label for="username">Username</label>
		<input type="text" name="username" id="username" autocomplete="off">
		<label for="password">Password</label>
		<input type="password" name="password" id="password" autocomplete="off">
		<input type="submit" name="btnLogin" value="Log In">
    <p style="color:red;"><?php if($message){ echo $message;}?></p>
</form>


<h3>Task 2</h3>
<?php
$str1 ="021020211002111010120220010202110001100011010010121110211010110201100010201";
$str2 = "41424320313233205465737420546573742054657374";

// Need to devide string in 5 char each group
function trinaryToStr($str1){
$rtn_data ="";
$string_data = str_split($str1,5);
for ($i=0; $i<count($string_data); $i++){
  $rtn_data .= base_convert($string_data[$i],3,16);
}
return hexToStr($rtn_data);
}

function hexToStr($hex){
$string='';
for ($i=0; $i < strlen($hex)-1; $i+=2){
    $string .= chr(hexdec($hex[$i].$hex[$i+1]));
}
return $string;
}
echo "<pre>
1.The Given string is encoded in Trinary format and is also known as Ternary or Base3.
=> Step 1. I have used base_convert() command in PHP to convert base 3 to base16(hexadecimal) from given string.
=> Step 2. From Base16(hexadecimal) i have used hexdec() decoder to text.
</pre>";

echo "<b>Answer: </b>".trinaryToStr($str1)."<br/>";

echo "<pre>
2.The Given string is encoded by hexadecimal format.
=> Step 1. From hexadecimal i have used hexdec() decoder to text.
</pre>";

echo "<b>Answer: </b>".hexToStr($str2)."<br/>";




 ?>


<style type="text/css">
.form-style-4{
	width: 450px;
	font-size: 16px;
	background: #495C70;
	padding: 30px 30px 15px 30px;
	border: 5px solid #53687E;
}
.form-style-4 input[type=submit],
.form-style-4 input[type=text],
.form-style-4 input[type=password],
.form-style-4 label,
.form-style-4 p
{
	font-family: Georgia, "Times New Roman", Times, serif;
	font-size: 16px;
	color: #fff;

}
.form-style-4 label {
	display:block;
	margin-bottom: 10px;
}
.form-style-4 input[type=text],
.form-style-4 input[type=password]
{
	background: transparent;
	border: none;
	border-bottom: 1px dashed #83A4C5;
	width: 275px;
	outline: none;
	padding: 0px 0px 0px 0px;
	font-style: italic;
}

.form-style-4 input[type=text]:focus,
{
	border-bottom: 1px dashed #D9FFA9;
}

.form-style-4 input[type=submit]{
	background: #576E86;
	border: none;
	padding: 8px 10px 8px 10px;
	border-radius: 5px;
	color: #A8BACE;
}
.form-style-4 input[type=submit]:hover{
background: #394D61;
}
</style>
