<!DOCTYPE html>
<html>
<head>
	<script	src="http://code.jquery.com/jquery-3.2.1.js"
		integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
		crossorigin="anonymous"></script>
	<script src="jquery.maskedinput.js" type="text/javascript"></script>
</head>
<body>

	<form>
		<table>
			<tr>
				<td>Phone</td>
				<td><input id="phone" tabindex="3" type="text" /></td>
				<td>(999) 999-9999</td>
			</tr>
		</table>




		<label for="inputName" class="control-label">Name *</label>
		<input type="text" pattern="/^[a-zA-Z]+$/" class="form-control" id="inputName" placeholder="Your first and last name" data-error="Please enter your first and last name." name="name" required>

	</form>

	<script type="text/javascript">
		$(function($){
		      $("#phone").mask("(999) 999-9999");
		   });
	</script>
</body>
</html>