<?php
include("posdscan.class.php");
include("functions.php");	

saveHit();

$showFailureMessage = false;

if(isset($_POST['dscan'])) {
	$dscan = $_POST['dscan'];

	$objects = parseDscan($dscan);
	$key = saveDscan($objects);

    if ($key) {
        //Save to file
        if (!file_exists("scans"))
            mkdir("scans");
        file_put_contents("scans/".$key, $dscan);
        
        header('Location: /dscan/'.$key);
        //print_r($objects);
    } else {
        $showFailureMessage = true;
    }
}
?>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

	<!-- Latest compiled and minified CSS -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<?php include("../switcher.php"); ?>
	<link rel="stylesheet" href="/dscan/css/custom.css">
	<!-- Optional theme -->
	<!-- Latest compiled and minified JavaScript -->
	
	<!-- Custom Page CSS -->
</head>
<body>
	
	<?php include("../header.php"); ?>


	<div class="container">
		<div class="starter-template">
			<h1>Directional Scan Paste Tool</h1>
            <?php if ($showFailureMessage) { ?>
                <p style="color: red">The provided dscan could not be parsed, please try again.</p>
                <p>If you think this is an error, please provide the dscan as a text snippet in #it_office.</p>
            <?php } ?>
			<p class="lead">
				<form method="POST">
					<fieldset>
					  <i><legend>Paste your dscan into the box below</legend></i>
					  <div class="form-group">
							<textarea id="dscan" name="dscan" class="form-control" rows="8"><? if(isset($_POST['dscan'])) { echo $_POST['dscan']; } ?></textarea><br />
						
							<button type="submit" class="btn btn-primary">Submit</button>
					</fieldset>
				</form>
			</p>
	</div>
</body>
