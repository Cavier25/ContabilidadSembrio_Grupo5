<?php
#    define("BASE_URL", "http://localhost/Contabilidad_sembrio/");
    const BASE_URL = "http://localhost/Contabilidad_sembrio";

    //zona horaria
    date_default_timezone_set('America/Guayaquil');

    //Datos de conexion BD
    const DB_HOST = "localhost:3308";
    const DB_NAME = "contabilidad";
    const DB_USER = "root";
    const DB_PASSWORD = "";
    const DB_CHARSET = "utf8";

    //delimitadores decimal y millar ej. 24,19874.00
    const SPD = ",";
    const SPM = ".";

    //Simbolo de moneda
    const SMONEY ="$";

    //Datos envio de correo
	const NOMBRE_REMITENTE = "Contabilidad";
	const EMAIL_REMITENTE = "no-reply@surdanigo.com";
	const NOMBRE_EMPRESA = "Contabilidad";
	const WEB_EMPRESA = "www.P_Avanzada.com";
?>