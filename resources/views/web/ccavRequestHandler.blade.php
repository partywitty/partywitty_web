<html>
<head>
<title> Non-Seamless-kit</title>
</head>
<body>
<center>
<?php
	$access_code='AVDM04KC74BW80MDWB';
?>
<form method="post" name="redirect" action="https://test.ccavenue.com/transaction/transaction.do?command=initiateTransaction">
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>
</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>

