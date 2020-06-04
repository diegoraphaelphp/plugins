<link href="upload.css" rel="stylesheet" type="text/css" />
<form action="upload.php" method="post" enctype="multipart/form-data" id="form-demo">
	<fieldset id="demo-fallback">
		<legend>File Upload</legend>
		<p>
			Selected your photo to upload.<br />
			<strong>This form is just an example fallback for the unobtrusive behaviour of FancyUpload.</strong>
		</p>
		<label for="demo-photoupload">
			Upload Photos:
			<input type="file" name="photoupload" id="demo-photoupload" />
		</label>
	</fieldset>
 
	<div id="demo-status" class="hide" class="">
		<p>
			<a href="#" id="demo-browse-all">Browse Files</a> |
			<a href="#" id="demo-browse-images">Browse Only Images</a> |
			<a href="#" id="demo-clear">Clear List</a> |
			<a href="#" id="demo-upload">Upload</a>
		</p>
		<div>
			<strong class="overall-title">Overall progress</strong><br />
			<img src="bar.gif" class="progress overall-progress" />
		</div>
		<div>
			<strong class="current-title">File Progress</strong><br />
			<img src="bar.gif" class="progress current-progress" />
		</div>
		<div class="current-text"></div>
	</div>
 
	<ul id="demo-list"></ul>
 
</form>