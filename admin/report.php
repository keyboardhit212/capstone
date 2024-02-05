<!DOCTYPE html>
<html>
	<head>
		<style>
			#searchContainer {
				width: 700px;
				height: 50px;
				/*border: 1px solid black;*/
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
			}
			#searchContainer img {
				margin-left: 0px;
			}
			#searchContainer span {
				font-family: helvetica;
				color: #b7b8b2;
				font-size: 25px;
				position: relative;
				left: 20px;
				top: -10px;
				margin-right: 30px;
			}
			#searchContainer form select {
				width: 250px;
				height: 30px;
				position: relative;
				top: -10px;
				color: #b7b8b2;
				font-size: 18px;
				margin-left: 10px;
			}
			#searchContainer form input {
				position: relative;
				left: 435px;
				margin-bottom: 20px;
				width: 250px;
			}
			
			/*------------------------------------------LIST CONTAINER-------------------------------------*/
			
			#listContainer {
				width: 700px;
				height: 600px;
				border: 1px solid #cdcdcb;
				margin-left: auto;
				margin-right: auto;
				margin-top: 35px;
			}
			#listContainer #title {
				width: 100%;
				height: 50px;
				border-bottom: 1px solid #cdcdcb;
				color: #b7b8b2;
			}
			#listContainer #title span {
				font-family: helvetica;
				font-size: 25px;
				position: relative;
				top: 10px;
				left: 10px;
			}
			#listContainer #reportList {
				width: 100%;
				height: 550px;
				overflow-y: auto;
			}
		</style>
	</head>
	<body>
		<div id="searchContainer">
			<form action="nothing.php" method="POST">
				<img src="../images/reports-dashboard.png"/><span>Reports</span>
				<select name="category" id="category">
					<option value="employer">Top 10 Employers</option>
					<!--<option value="record">Job Records</option>!-->
					<option value="account">Account Records</option>
					<option value="industry">Top Job Industry</option>
					<option value="job">Top Demand Jobs</option>
				</select>
				<select name="option" id="option">
					<option value="day">Daily</option>
					<option value="month">Monthly</option>
					<option value="year">Year</option>
				</select><br/>
				<input type="date" name="queue" id="queue"/>
			</form>
		</div>
		<div id="listContainer">
			<!--<div id="title"><span>Name</span></div>!-->
			<div id="reportList">
				
			</div>
		</div>
		<script type="text/javascript" src="../../library/jquery.js"></script>
		<script type="text/javascript" src="library/js.js"></script>
	</body>
</html>