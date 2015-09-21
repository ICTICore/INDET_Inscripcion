-Configuración de la impresoras para correos electronicos
-Corrección y reconfiguración en error de red de la impresoras
-Configuración de script para monitoreo de servicios 



#Scrip para revisar si tomcat6 esta down, si esta abajo lo reinicia
tomcat=`ps awx | grep 'tomcat6' |grep -v grep|wc -l`
if [ $tomcat == 0 ]; then
    service tomcat6 restart
    echo "Tomcat6 estaba caido y el cron lo reactivo."
fi

#Ruta de los scripts
 /root/scripts/

 
 
#!/bin/bash
#Mando un email por si tomcat cayo o el puerto 8080 esta bloqueado
puerto_abierto=`nmap 127.0.0.1 -p 8080 | grep -i open |grep -v grep|wc -l`
if [ $puerto_abierto == 0 ]; then
     mail -s "PUERTO 8080" rogeliov@soyhormiga.com < /root/scripts/mensaje_error.txt
fi
