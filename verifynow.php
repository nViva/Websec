
<?php  if (count($verifynow) > 0) : ?>

 <a href="verify_emailnow1.php">
  	<?php foreach ($verifynow as $verifynoww) : ?>
  	  <p><?php echo $verifynoww ?></p>
  	<?php endforeach ?>
</a> 
<?php  endif ?>