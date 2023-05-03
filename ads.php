<?php
if(!isset($_GET['mode']) || $_SERVER['SERVER_NAME'] == 'localhost' || $_SERVER['SERVER_NAME'] == '127.0.0.1') return;

if($_GET['mode'] == 'web' && isset($_GET['size'])) {
	if($_GET['size'] == 'small') {
		?>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Mabbi #1 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:150px;height:500px"
     data-ad-client="ca-pub-8758885421899894"
     data-ad-slot="4734000909"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<?php
	} else {
		?>
		<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Mabbi #2 -->
<ins class="adsbygoogle"
     style="display:inline-block;width:750px;height:90px"
     data-ad-client="ca-pub-8758885421899894"
     data-ad-slot="3578925237"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
		<?php
	}
} else if($_GET['mode'] == 'client') {
?>
	<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- Mabbi Hotel -->
<ins class="adsbygoogle"
     style="display:inline-block;width:728px;height:90px"
     data-ad-client="ca-pub-8758885421899894"
     data-ad-slot="9434394674"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<?php
}
?>