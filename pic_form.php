<?php include('header.php') ?>
    <title>upload Image</title>

<div>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="image[]" />
    <button type="submit">Upload</button>
</form>

 </div>
 <p></p>

</div>
	
</div>

<?php include('footer.php') ?>