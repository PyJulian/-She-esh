<?php
	$proj = json_decode(file_get_contents('./db/projects.json'), true)[$_GET['proj']]; // Get Project Info

	// Get the placeholder icon or something, to prevent those ugly error messages in the console
	$icon = 'db/icons/' . $_GET['proj'] . '.png';
	if (!file_exists($icon)) {$icon = 'db/icons/placeholder.png';}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'db/meta.php' ?>
	<link rel="icon" href="<?= $icon ?>">
	<title>(She)esh - <?= $_GET['proj'] ?></title>
</head>
<body>
	<h2 style="display: -webkit-box;">
		Sophie's Site -
		<div class="icon" style="margin-left: 10px;">
			<img src="<?= $icon ?>" alt="Icon" style="margin-right: 0;">
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

		<?php if (count($proj['source']) > 0 ) { ?>
			<h3>Source:</h3>
			<?php foreach($proj['source'] as $prov => $link) { ?>
				<ul>
					<li>
						<?= $prov ?>: <a href="<?= $link ?>" target="_blank"><?= $link ?></a>
					</li>
				</ul>
			<?php } ?>
		<?php } ?>

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
