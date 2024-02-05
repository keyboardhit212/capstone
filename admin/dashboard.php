<!DOCTYPE html>
<html>
	<head>
		<style>
			#viewContainer #greetings {
				width: 600px;
				height: 50px;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
				margin-bottom: 20px;
				font-family: helvetica;
				color: #b7b8b2;
				font-weight: bold;
				font-size: 35px;
			}
			
			#viewContainer #greetings img {
				position: relative;
				top: 5px;
				margin-left: 140px;
				margin-right: 20px;
			}
			
			#viewContainer #greetings span {
				color: #b0e413;
			}
			/*------------------------------------------------DASHBOARD CONTAINER---------------------------------------------*/
			
			#viewContainer #dashContainer {
				width: 700px;
				height: 700px;
				margin-left: auto;
				margin-right: auto;
				/*border: 1px solid black;*/
			}
			
			#dashContainer .dashWindow {
				width: 300px;
				height: 250px;
				border: 1px solid #b8b8b8;
				border-radius: 10px/10px;
				float: left;
				margin-left: 35px;
				margin-top: 35px;
			}
			
			/*-----------------------------------------------------------IMAGES---------------------------------------------*/
			
			.dashWindow #request {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #requestText {
				color: #8bde00;
				font-family: helvetica;
				font-weight: bold;
				font-size: 20px;
				position: relative;
				top: 50px;
				left: 70px;
			}
			
			.dashWindow #account {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #accountText {
				color: #8bde00;
				font-family: helvetica;
				font-weight: bold;
				font-size: 20px;
				position: relative;
				top: 50px;
				left: 70px;
			}
			
			.dashWindow #report {
				position: relative;
				left: 100px;
				top: 30px;
			}
			
			.dashWindow #reportText {
				color: #8bde00;
				font-family: helvetica;
				font-weight: bold;
				font-size: 20px;
				position: relative;
				top: 50px;
				left: 120px;
			}
			
			#viewContainer #reportDash {
				position: relative;
				left: 150px;
			}
			
			#dashContainer #requestStat {
				width: 50px;
				height: 50px;
				background: red;
				border-radius: 25px/25px;
				color: white;
				font-family: helvetica;
				position: relative;
				left: 160px;
				top: -40px;
			}
			#dashContainer #requestStat span {
				position: relative;
				left: 10px;
				top: 10px;
				font-weight: bold;
				font-size: 20px;
				display: block;
				text-align: left;
			}
		</style>
	</head>
	<body>
		<div id="greetings"><img src="../images/admin.png"/>Welcome, <span>Admin</span></div>
		<div id="dashContainer">
			<a href="index.php?page=request"><div class="dashWindow">
				<img src="../images/request.png" id="request"/><br/>
				<span id="requestText">Pending Request</span>
				<div id="requestStat"><span></span></div>
			</div></a>
			<a href="index.php?page=block"><div class="dashWindow">
				<img src="../images/block.png" id="account"/><br/>
				<span id="accountText">Blocked Accounts</span>
			</div></a>
			<a href="index.php?page=report"><div class="dashWindow" id="reportDash">
				<img src="../images/report.png" id="report"/><br/>
				<span id="reportText">Report</span>
			</div></a>
		</div>
	</body>
</html>