<?php
	$ds = str_contains($_SERVER['HTTP_USER_AGENT'], 'Nintendo 3DS'); // Check if user is on the 3ds

	if (file_exists('./db/projects.json')) {
		$projects = json_decode(file_get_contents('./db/projects.json'));
	} // Check if file exists and then reads it
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<?php include_once 'db/meta.php' ?>
	<link rel="icon" href="db/icons/(She)esh, NeCanna Site.png">
	<title>(She)esh / NeCanna Site</title>
</head>
<body>
	<h2>(She)esh / NeCanna Site</h2>
	<p>
		I'm a backend developer that focuses on PHP & Learning ASM (x86).<br>
		Currently I'm working on Homebrew Chips and soldering stuff.
	</p>
	<p>
		You could be thinking: "Where is the styling?". Gone, I eated it all <?= $ds ? ':P' : '😛' ?>.<br>
		In all seriousness though, this site is renderded backend, thats what I focused on.
	</p>
	<p>
		Take your time to check out my projects I've made some cool things.
	</p>

	<h3>3DS Support</h3>
	<p>Note that this site has full 3DS browser compatibility :)</p>

	<h3>Languages I Know</h3>
	<ul>
		<b>I know these:</b>
		<li>JavaScript</li>
		<li>PHP</li>
		<li>Python</li>
		<li>BASIC (smileBASIC 3) (Hobby Language)</li>
		<li>AppleScript (Hobby Language)</li>
		<li>Lua (Hobby Language)</li>
		<li>Bash</li>
		<b>Learning:</b>
		<li>Assembly (x86)</li>
	</ul>

	<h3>Socials</h3>
	<ul>
		<li>
			CV:
			<a href="CV/CV NL.pdf">Dutch</a> | <a href="CV/CV EN.pdf">English</a>
		</li>
		<li>
			Github:
			<a href="https://github.com/pyjulian" target="_blank">pyjulian</a>
		</li>
		<li>
			Email:
			<a href="mailto:wortelarchief@gmail.com" target="_blank">wortelarchief@gmail.com</a>
		</li>
	</ul>

	<?php if ($ds) { ?>
		<h3>Welcome 3DS user</h3>
		<p>I love you <33</p>
	<?php } ?>

	<h3>My Projects</h3>
	<ol>
		<?php if (isset($projects)) {
			foreach ($projects as $name => $proj) { ?>
				<li>
					<div class="icon">
						<img src="db/icons/<?= $name ?>.png" alt="" onerror="this.onerror = null; this.src = 'db/icons/placeholder.png'">
						<span>
							<?= $name ?? '' ?>
						</span>
					</div>
					<ul>
						<li>
							<i>Written in:</i> <?= $proj->lang ?? '' ?>
						</li>
						<li>
							<?= $proj->shortdesc ?? '' ?>
						</li>
						<li>
							<i>Status:</i>
							<?= $proj->done ? '<b>Finished</b>' : 'In-Progress' ?>
						</li>
						<li>
							<?php foreach($proj->source as $prov => $link) { ?>
								<a href="<?= $link ?>" target="_blank">Source (<?= $prov ?>)</a> |
							<?php } ?>
							<a href="project.php?proj=<?= $name ?? '' ?>">View Project</a>
						</li>
					</ul>
				</li>
			<?php } ?>
		<?php } else { ?>
			<i>Projects file failed to load :(</i>
		<?php } ?>
	</ol>

	<h3>Dark Mode</h3>
	<p>
		<?= $ds ? 'Doesn\'t work on the 3DS somehow mb :(' : '<a onclick="dark()">Click to Toggle Darkmode for All you Online Feins out There</a>' ?>
	</p>

	<script src="sophie.js" defer></script>
</body>
</html>
