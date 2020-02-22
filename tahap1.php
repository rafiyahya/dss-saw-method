<!DOCTYPE html>
<html>
<head>
	<title>SPK | SAW</title>
</head>
<body>
	<h1>Sistem Pendukung Keputusan | Simple Additive Weighting</h1>
	<form action="tahap2.php" method="POST">
		<input type="hidden" name="c" value="<?php echo $_POST['c']; ?>">
		<input type="hidden" name="a" value="<?php echo $_POST['a']; ?>">
		<h3>Input Nilai Kriteria</h3>	
		<table border="1">
		<?php for($i=1;$i<=$_POST['c'];$i++) { ?>
			<tr>
				<td>C<?php echo $i ?></td>
				<td><input type="text" name="<?php echo 'c'.$i ?>"></td>
				<td><input type="radio" name="<?php echo 'atb'.$i ?>" value="k">
					<label for="keuntungan">Keuntungan</label>
					<input type="radio" name="<?php echo 'atb'.$i ?>" value="b">
					<label for="biaya">Biaya</label>
				</td>
			</tr>
		<?php } ?>	
		</table>
		<h3>Input Alternatif</h3>
		<table border="1">
			<thead>
				<tr>
				    <th rowspan="<?php echo $_POST['a']; ?>">Alternatif</th>
				    <th colspan="<?php echo $_POST['c']; ?>">Kriteria<br></th>
				</tr>
				<tr>
					<?php for($i=1;$i<=$_POST['c'];$i++) { ?>		
				    <td>C<?php echo $i; ?></td>
					<?php } ?>
				</tr>
			</thead>
			<tbody>
				<?php for($j=1;$j<=$_POST['a'];$j++) { ?>
				<tr>
					<td>A<?php echo $j; ?></td>
					<?php for($i=1;$i<=$_POST['c'];$i++) { ?>
					<td><input type="text" name="<?php echo 'a'.$j.$i ?>"></td>
					<?php } ?>
				</tr>
				<?php } ?>
			</tbody>
		</table>
		<br><input type="submit" value="Submit">
	</form>
</body>
</html>