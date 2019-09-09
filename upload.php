<form enctype="multipart/form-data" action="uploader.php" method="POST">
	<p>
		<input type="hidden" name="MAX_FILE_SIZE" value="20000000" />
		<label for="uploadfile_input">Choose a file to upload:</label> <input name="uploadedfile" type="file" id="uploadfile_input" />
	</p>
	<p>
		<input type="submit" value="Upload File" />
	</p>
</form>
<form action="download.php" method="POST">
    <p><label for="download">Download file from url: </label><input type="text" name="url" id="download" required/></p>
    <p><input type="submit" value="Download File" /></p>
</form>
