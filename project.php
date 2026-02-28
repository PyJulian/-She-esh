<?php
	$proj = json_decode(file_get_contents('./db/projects.json'), true)[$_GET['proj']];
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="icon" href="db/icons/(She)esh, NeCanna Site.png">
	<title>(She)esh - <?= $_GET['proj'] ?></title>
</head>
<body>
	<h2 style="display: -webkit-box;">
		Sophie's Site -
		<div class="icon" style="margin-left: 10px;">
			<img src="db/icons/<?= $_GET['proj'] ?>.png" alt="Icon" style="margin-right: 0;" onerror="this.onerror = null; this.src = 'db/icons/placeholder.png'">
			<span style="bottom: 3px;">
				<?= htmlspecialchars($_GET['proj']) ?>
			</span>
		</div>
	</h2>

	<?php if ($proj) { ?>
		<p style="margin-block-start: 1em;">
			<a href="index.php">Return to the Homepage</a>
		</p>

		<h3>General Info</h3>
		<p>
			<i>Written in:</i> <b><?= $proj['lang'] ?></b><br/>
			<i>Status:</i> <b><?= $proj['done'] ? 'Finished' : 'In-Progress' ?></b>
		</p>

		<h3>Description</h3>
		<p>
			<?= str_replace('%%', '<br/>', $proj['desc']) ?>
		</p>

		<h3>Screenshots</h3>
		<?php foreach($proj['img'] as $src) { ?>
			<img src="db/img/<?= $src ?>" class="proj">
		<?php } ?>

		<p>
			<a href="index.php">Return to the Homepage</a>
			or
			<a href="CV.pdf">Check out my CV and hire me :3</a>
		</p>

	<?php } else { ?>
		<p>
			Hmmm it seems like <u><i><b><?= htmlspecialchars($_GET['proj']) ?></b></i></u> doesn't exist in my projects folder.<br>
			That means I might have or might've not made that.
		</p>
		<p>
			<a href="index.php">Return to the Homepage</a>
			or
			<a href="CV.pdf">Forget it and check out my CV Instead :)</a>
		</p>
	<?php } ?>

	<script src="sophie.js" defer></script>
</body>
</html>
