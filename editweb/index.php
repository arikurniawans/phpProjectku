<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>.:: Administrator -  Website ::.</title>
<link href="css/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="loginWrap">
 <div id="loginMain">
  <div id="loginLogin"></div>
  <div id="loginhead"></div>
  <div id="loginform">
    <form action="cek_login.php" method="post" name="login" id="login" onsubmit="return validasi(this)">
      <label>
        <input name="username" type="text" value="username" onfocus="if(this.value=='username')this.value=''" onblur="if(this.value=='')this.value='username'" />
        </label>
      <label>
        <input name="password" type="password" value="password" onfocus="if(this.value=='password')this.value=''" onblur="if(this.value=='')this.value='password'" />
        </label>
      <label1>
      <input name="submit"  class="button" type="submit" value="LOGIN" />
        </label>
    </form>
  </div>
 </div>
</div>
</body>

</html>
