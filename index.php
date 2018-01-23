 <!DOCTYPE html>
 <html lang="en">
 <head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style type="text/css">
	#regiration_form fieldset:not(:first-of-type) {
		display: none;
	}
  </style>
  <title>Multi Step Form with Next & Prev Button</title>
</head>
<body>
  <div class="container">
    <h1></h1>
	<div class="progress">
		<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
	</div>

	<form id="regiration_form" novalidate action="action.php"  method="post">
	<fieldset>
		<h2>Step 1: Create your account</h2>
		<div class="form-group">
		<label for="email">Email address</label>
		<input type="email" class="form-control" id="email" name="data[email]" placeholder="Email">
	  </div>
	  <div class="form-group">
		<label for="exampleInputPassword1">Password</label>
		<input type="password" class="form-control" id="password" placeholder="Password">
	  </div>
		<input type="button" name="data[password]" class="next btn btn-info" value="Next" />
	</fieldset>
	<fieldset>
		<h2> Step 2: Add Personnel Details</h2>
		<div class="form-group">
		<label for="fName">First Name</label>
		<input type="text" class="form-control" name="data[fName]" id="fName" placeholder="First Name">
	  </div>
	  <div class="form-group">
		<label for="lName">Last Name</label>
		<input type="text" class="form-control" name="data[lName]" id="lName" placeholder="Last Name">
	  </div>
		<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
		<input type="button" name="next" class="next btn btn-info" value="Next" />
	</fieldset>
	<fieldset>
		<h2>Step 3: Contact Information</h2>
		<div class="form-group">
		<label for="mob">Mobile Number</label>
		<input type="text" class="form-control" id="mob" name="data[mob]" placeholder="Mobile Number">
	  </div>
	  <div class="form-group">
		<label for="address">Address</label>
		<textarea  class="form-control" name="data[address]" placeholder="Communication Address"></textarea>
	  </div>
		<input type="button" name="previous" class="previous btn btn-default" value="Previous" />
		<input type="submit" name="submit" class="submit btn btn-success" value="Submit" id="submit_data" />
	</fieldset>
	</form>
  </div>
</body>
</html>
<script type="text/javascript">
$(document).ready(function(){
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
	$(".next").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().next();
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function(){
		current_step = $(this).parent();
		next_step = $(this).parent().prev();
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep){
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width",percent+"%")
			.html(percent+"%");
	}
});
</script>
