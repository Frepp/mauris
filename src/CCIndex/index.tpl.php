<h1>Index Controller</h1>
<p>Welcome to Mauris index controller.</p>

<?php 
if($link) {
	echo "<div class='success'>Your PHP-version seems to be up to date. Great!</div>";	
} else {
	echo "<div class='error'>You're using an old PHP-version, please update the server.</div>";
}
?>
<?php 
if($link) {
	echo "<div class='success'>Your .htaccess file seems to be correct. Great!</div>";	
} else {
	echo "<div class='error'>Your .htaccess file seems to be incorrect configurated.</div>";
}
?>
<?php 
if($permissions == "777") {
	echo "<div class='success'>The permissions of site/data seems to be correct. Great!</div>";	
} else {
	echo "<div class='error'>The permissions of site/data are {$permissions}, they should be 777.</div>";
}
?>

<p>Problems? Please consult the <a href'https://github.com/Frepp/mauris/blob/master/README.md'>README</a> for further instructions.</p>

<p>Second, Mauris has some modules that need to be initialised. You can do this through a 
controller. Point your browser to the following link.</p>
<blockquote>
<a href='<?=create_url('module/install')?>'>module/install</a>
</blockquote>

