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
			}
			#searchContainer form select {
				width: 250px;
				height: 30px;
				position: relative;
				left: 190px;
				top: -10px;
				color: #b7b8b2;
				font-size: 18px;
			}
			
			/*------------------------------------------LIST CONTAINER-------------------------------------*/
			
			#listContainer {
				width: 700px;
				height: 600px;
				border: 1px solid #cdcdcb;
				margin-left: auto;
				margin-right: auto;
				margin-top: 20px;
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
			#listContainer #list {
				width: 100%;
				height: 550px;
				overflow-y: auto;

			}
		</style>
	</head>
	<body>
		<div id="searchContainer">
			<form action="nothing.php" method="POST">
				<img src="../images/block-dashboard.png"/><span>Blocked Accounts</span>
				<select name="sort" id="blockSelect">
					<option value="students">Students</option>
					<option value="employers">Employers</option>
				</select>
			</form>
		</div>
		<div id="listContainer">
			<div id="title"><span>Name</span></div>
			<div id="blockList">
			
			</div>
		</div>
	</body>
</html>