<script type="text/javascript">
	var myVar =
	<?php
		$result = "";

		foreach($_REQUEST['erreurs'] as $erreur)
		{
			$result .= $erreur . "\n";
		}

		echo json_encode($result);
	?>

	swal({
		title: 'Erreur',
		text: myVar,
		type: 'warning',
		confirmButtonColor: '#3085d6',
		confirmButtonText: 'Ok'
		})
</script>
