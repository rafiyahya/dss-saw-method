<!DOCTYPE html>
<html>
<head>
	<title>SPK | SAW</title>
</head>
<body>
	<h1>Sistem Pendukung Keputusan | Simple Additive Weighting</h1>

	<h3>Kriteria</h3>
	<?php
	for ($i=1;$i<=$_POST['c'];$i++){ ?>
	<p><?php echo 'C'.$i.' :'.$_POST['c'.$i].' ('; if ($_POST['atb'.$i]=='k') echo 'Keuntungan)'; else echo 'Biaya)';?></p>
	<?php } ?>

	<h3>Hasil Normalisasi</h3>
	<?php
		$norm = array();
		for($j=1;$j<=$_POST['a'];$j++){
			for($i=1;$i<=$_POST['c'];$i++) $norm[$j][$i] = $_POST['a'.$j.$i]; 
		}
		for($i=1;$i<=$_POST['c'];$i++){
			$pref = 'c';
			${$pref.$i} = $i ;
			${'c'.$i} = array(); 
				for($j=1;$j<=$_POST['a'];$j++){
					${'c'.$i}[$j] = $norm[$j][$i];
				}

			$pref = 'max';
			${$pref.$i} = $i ;
			${'max'.$i} = max(${'c'.$i});

			$pref = 'min';
			${$pref.$i} = $i ;
			${'min'.$i} = min(${'c'.$i});
		}
	?>
	<table border="1">
	<?php for($j=1;$j<=$_POST['a'];$j++) { ?>
		<tr>
			<?php for($i=1;$i<=$_POST['c'];$i++) { 
			$pref = 'nrm'; ?>
			<td><?php
				if($_POST['atb'.$i]=='k') {
					${$pref.$j.$i} = $norm[$j][$i]/${'max'.$i};
					echo ${'nrm'.$j.$i};
				}
				else {
					${$pref.$j.$i} = ${'min'.$i}/$norm[$j][$i];
					echo ${'nrm'.$j.$i};
				}
			?></td>
			<?php } ?>
		</tr>
	<?php } ?>
	</table>

	<h4>Hasil Pembobotan</h4>
	<?php 
	$pref = 'v';
	for($j=1;$j<=$_POST['a'];$j++){
	$temp = 0 ;
		for($i=1;$i<=$_POST['c'];$i++){
			$temp = $temp+($_POST['c'.$i]*${'nrm'.$j.$i});
			${$pref.$j} = $temp;

		}
	}
	$hasil = array();
		?>
	<p><?php for($j=1;$j<=$_POST['a'];$j++){
	$hasil[$j] = ${'v'.$j};
	echo  'V'.$j.' : '.${'v'.$j};?></p>
	<?php }
	for($j=1;$j<=$_POST['a'];$j++){
	if(max($hasil)==${'v'.$j}){;?>
	<p>Nilai terbesar ada pada <b>V<?php echo $j; ?></b>, Yaitu  <b><?php echo max($hasil); ?></b> sehingga alternatif <b>A<?php echo $j; ?></b> adalah alternatif yang terpilih sebagai alternatif terbaik.</p>
	<?php }} ?>
</body>
</html>