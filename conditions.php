<?php
    ob_start();
	require_once '../../global.php';
	$Functions->Logged("allow");
	$TplClass->SetAll();
	
    $result = $db->query("SELECT * FROM cms_settings WHERE id = 1 LIMIT 1");
	$data = $result->fetch_array();

	$TplClass->SetParam('title', $data['hotelname'].': Términos y Condiciones');
	$TplClass->AddTemplate("header", "menu");

	ob_end_flush();
?>

<div id="webcenter" class="con">
<h1 id="con1"><strong>Términos y Condiciones</strong></h1><br>
<div id="con3">
<p><?php echo $data['hotelname']; ?> no se hace responsable de ningun daño y/o perjuicio que pueda haber causado a tí o a tu familia. <?php echo $data['hotelname']; ?> ha sido fundado únicamente con fines educativos. Por tanto, el desarrollador de este sitio web exime toda responsabilidad ante la ley, y por ende, ésta recae en los usuarios del sitio web, estando de acuerdo al haber aceptado el presente contrato.</p><br>
<p><?php echo $data['hotelname']; ?>  no se hace responsable de la perdida de cualquier bien adquirido en el Hotel y/o sitio web. Así mismo tampoco se hace responsable de cualquier fallo en los métodos de pago automatizados. Sin embargo, si se demuestra que el fallo ha sido originado por nuestra parte, <?php echo $data['hotelname']; ?> se toma el derecho de decidir si los bienes que se han perdido, han de ser devueltos en forma de bienes virtuales dentro del Hotel.</p><br>
<p><?php echo $data['hotelname']; ?> tiene plenos derechos sobre su base de datos. Ésto quiere decir que <?php echo $data['hotelname']; ?> puede hacer ajustes y/o modificaciones en su base de datos sin dar constancia a sus usuarios. Bajo este apartado también se aplican los llamados 'Baneos' o 'Bloqueos', los cuales son modificaciones en la base de datos para restringir el acceso a usuarios que han incumplido alguna cláusula de las presentes en este contrato, o se han saltado algunas de las <?php echo $data['hotelname']; ?> Reglas.</p><br>
<p><?php echo $data['hotelname']; ?> nunca reconsiderará un baneo, a no ser que el usuario forme parte del <?php echo $data['hotelname']; ?> Staff, haya comprado algún bien en la <?php echo $data['hotelname']; ?> Tienda o haya sido baneado sin justificación. Si un usuario es baneado reiteradas veces, éste quedará automáticamente expulsado de <?php echo $data['hotelname']; ?> Hotel por tiempo ilimitado. <?php echo $data['hotelname']; ?> se reserva el derecho a readmitir a ciertos usuarios previamente expulsados siempre que sea de forma justificada y no supongan un peligro y/o molestia para los demás jugadores.</p><br>
<p>Los usuarios que han hecho una o más compras en la <?php echo $data['hotelname']; ?> Tienda no reciben ningún distintivo respecto a los demás usuarios de <?php echo $data['hotelname']; ?>. Por tanto, ninguna condición adicional es aplicada a dichos usuarios. Lee la cláusula número seis (6) para más información.</p><br>
<p>Cuando <?php echo $data['hotelname']; ?> está cerrado por mantenimiento, solo los <?php echo $data['hotelname']; ?> Staff están autorizados a iniciar sesión en el sito web. Los usuarios normales deberán de esperar hasta el final del mantenimiento para iniciar sesión. Aunque algún mantenimiento te resulte extremadamente largo, <?php echo $data['hotelname']; ?> no se hace responsable de los daños emocionales y/o materiales que éste te pueda haber ocasionado.</p><br>
<p><?php echo $data['hotelname']; ?> se reserva el derecho a rechazar cualquier solicitud de inclusión en el <?php echo $data['hotelname']; ?> Staff cuando ésta se hace fuera de plazo y/o contexto. No obstante, en determinadas ocasiones <?php echo $data['hotelname']; ?> abre una serie de vacantes a Staff donde los usuarios normales pueden aplicar su solicitud sin compromiso. <?php echo $data['hotelname']; ?> se reserva el derecho de elección de nuevos <?php echo $data['hotelname']; ?> Staff, cualquier queja sobre dichas elecciones será ignorada por parte de nuestro equipo.</p><br>
<p><?php echo $data['hotelname']; ?> no se hace responsable de los conflictos que puedan formarse como consecuencia de alguna acción realizada por parte del <?php echo $data['hotelname']; ?> Staff. El <?php echo $data['hotelname']; ?> Staff tiene permiso para callar, expulsar y/o banear a cualquier usuario que continue con la disputa despues de ser advertido por parte de nuestro <?php echo $data['hotelname']; ?> Staff.</p><br>
<p>Cuando un usuario toma la decisión de violar alguna de las cláusulas presentes en este contrato, el <?php echo $data['hotelname']; ?> Staff tomará acción instantaneamente contra dicho usuario, pudiendo banearle durante un rango de tiempo determinado, e incluso expulsarle de <?php echo $data['hotelname']; ?> Hotel si la infracción es muy grave. Estas cláusulas pueden ser actualizadas sin previo aviso, por lo que procura hecharle un vistazo a esta página de vez en cuando.</p><br>
<p><?php echo $data['hotelname']; ?> no se hace responsable de posibles desacuerdos y/o decepciones que puedan surgir debido a que en determinadas ocasiones <?php echo $data['hotelname']; ?> puede no estar disponible / en línea / de cara al público.</p><br>
<p><?php echo $data['hotelname']; ?> no se hace responsable de la desaparición de bienes obtenidos en la <?php echo $data['hotelname']; ?> Tienda. El reembolso de los bienes está en manos del <?php echo $data['hotelname']; ?> Staff. Cualquier desacuerdo con el <?php echo $data['hotelname']; ?> Staff será ignorado y <?php echo $data['hotelname']; ?> se desentenderá del problema.</p><br>
<p>Las opiniones acerca del <?php echo $data['hotelname']; ?> Staff pueden ser consideradas, cuando corresponda, como una descripción objetiva, con el fin de evitar confusiones y/o conflictos entre personas.</p><br>
<p>Las diferentes versiones de <?php echo $data['hotelname']; ?> pueden no estar relacionadas entre sí, dando lugar a pequeños cambios como la distinta colocación de la interfaz gráfica, distinto diseño de ventanas o la desaparición de algunas funciones e inclusión de otras funciones diferentes.</p><br>
<p><?php echo $data['hotelname']; ?> no se hace responsable de cualquier interrupción del servicio causada por el Lag. <?php echo $data['hotelname']; ?> corre dentro de un pequeño servidor dedicado, por lo tanto, <?php echo $data['hotelname']; ?> puede ser colapsado durante las horas puntas, ralentizando el servidor y generando Lag, por consecuente, <?php echo $data['hotelname']; ?> no se hace responsable de las molestias que el Lag pueda causar a sus usuarios.</p><br>
<p><?php echo $data['hotelname']; ?> no se hace responsable de la falta de algunas características dentro del cliente. Los desarrolladores de <?php echo $data['hotelname']; ?> harán todo lo posible para activarlas cuando ellos vean oportuno. Mientras tanto, <?php echo $data['hotelname']; ?> se reserva el derecho a ignorar quejas por parte de los usuarios a causa de dicha falta de características.</p><br>
<p><?php echo $data['hotelname']; ?> limita el uso de su servicio a una (1) conexión simultánea por PC. Este límite ha sido impuesto para garantizar la máxima velocidad de nuestros servicios y la seguridad de nuestros usuarios. Este límite no puede ser modificado y <?php echo $data['hotelname']; ?> ignorará cualquier petición individual y/o colectiva.</p><br>
<p><?php echo $data['hotelname']; ?> no permite el reparto de bienes (ya sean créditos, furnis, píxeles o perlas) entre varias cuentas pertenecientes a una misma persona. El <?php echo $data['hotelname']; ?> Staff puede tomar acciones contra aquel usuario que incumpla esta cláusula, imponiendo desde un baneo hasta la expulsión completa de <?php echo $data['hotelname']; ?>. El <?php echo $data['hotelname']; ?> Staff ignorará cualquier queja y/o negación por parte del usuario afectado.</p><br>
<p><?php echo $data['hotelname']; ?> no permite que su sitio web y/o cualquiera de sus servicios sean utilizados desde un Proxy. Si detectamos su uso, el <?php echo $data['hotelname']; ?> Staff procederá al bloqueo de dicho Proxy en nuestros servidores y al baneo de la cuenta del usuario que haya usado dicho Proxy.</p><br>
</div>
</div>

<?php
//COLUMNA FOOTER
  $TplClass->AddTemplate("others", "footer");
?>