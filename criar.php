<?php
require("index.php");
echo "<div align='center'><h1>Criar SSH</h1></div>";

$ip=escapeshellcmd($_SERVER["REMOTE_ADDR"]);

          $user=escapeshellcmd($_POST["login"]);
          $user2=preg_replace("/[^a-zA-Z0-9\s]/", "-", $user);
	  $senha=escapeshellcmd($_POST["pass"]);
          $senha2=preg_replace("/[^a-zA-Z0-9\s]/", "-", $senha);
$existente=shell_exec("cat /etc/passwd | grep $user2");

$root=shell_exec("echo $user2 | grep root");

if ($root) {
echo "<div align='center'><h1>TENTATIVA DE MUDANÇA DE USUARIO ROOT DETECTADA!</h1><p>IP: $ip BANIDO DO SERVIDOR!</p></div>";
shell_exec("route add -host $ip reject");
} else {
if ($existente) {

echo "<div align='center'><h1>Usuario Existente!</h1></div>";
} else {
          $out=shell_exec("sudo sh criar.sh $user2 $senha2 $ip");
echo "$out";
}
}
?>
