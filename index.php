<html>
	<head>
		<title>Get Memo</title>
		<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" >

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js">
<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>
		<script>
			$(function (){
				$('#getMemo').click(function(e){
					e.preventDefault();
					$.ajax({
						url: "get_cloudcoin.php",
						type: "GET",
						dataType:'json',
						success:function(resp){
							console.log(resp)
							$('#cloudCoinApiResponse .resp').html(JSON.stringify(resp));
						}
					});
				});
				
				function getTicket(){
					$.ajax({
						url: "get_cloudcoin.php",
						type: "GET",
						dataType:'json',
						success:function(resp){
							console.log(resp)
							$('#cloudCoinApiResponse .resp').html(JSON.stringify(resp));
						}
					});
				}
			});
		</script>
	</head>
	<body>
		<div class="container">
			<h2>Get Memo</h2>
			<button id="getMemo" class="btn btn-success">Get Memo</button>
			<div id="responseDiv" class='container'>
				<h1>API Responses</h1>
				<div class='row hide-me' id="cloudCoinApiResponse">
					<div class="col-md-3"><h3>Get Cloud Coin:</h3></div>
					<div class="col-md-8 resp"></div>
				</div>
				<div class='row hide-me' id="ticketApiResponse">
					<div class="col-md-3"><h3>Get Ticket:</h3></div>
					<div class="col-md-8 resp" ></div>
				</div>
				<div class='row hide-me' id="base64ApiResponse">
					<div class="col-md-3"><h3>Get Base64:</h3></div>
					<div class="col-md-8 resp" ></div>
				</div>
				<div class='row  hide-me' id="base64ApiResponse">
					<div class="col-md-3"><h3>Final Memo:</h3></div>
					<div class="col-md-8 resp"></div>
				</div>
			</div>
		</div>
	</body>
</html>
