#!/bin/bash

# BadGuy

limite=$(cat users.txt | wc -l)

if [ "$limite" -gt "30" ]
then
echo "<h1>Limite de Contas Excedido!</h1>"
exit 0
fi

# Aqui vocÃª coloca o seu IP:
ip=189.79.55.110
validade=$(date '+%C%y/%m/%d' -d " +2 days")
validadebr=$(date '+%d/%m/%C%y' -d " +2 days")


sudo useradd -M -s /bin/false $1 -e $validade

(echo $2 ; echo $2) | passwd $1

echo "$1:$3" >> users.txt

echo "<div align='center'>"
echo "<h3>Conta Criada com Sucesso.</h3>"
echo "<p>Login: $1</p>"
echo "<p>Senha: $2</p>"
echo "<p>IP: $ip</p>"
echo "<p>Proxys portas: 80 e 8080</p>"
echo "<p>Validade: $validadebr"
echo "</div>"
