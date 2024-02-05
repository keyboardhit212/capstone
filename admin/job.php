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
			#searchContainer form #jobField {
				width: 300px;
				height: 20px;
			}
			#searchContainer form #searchButton {
				position: relative;
				left: 10px;
				top: 8px;
			}
			#searchContainer form select {
				width: 250px;
				height: 25px;
				position: relative;
				left: 100px;
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
				<input type="text" name="job" placeholder="Search Title" id="jobField"/>
				<input type="image" src="../images/search.png" id="searchButton"/>
				<select name="sort">
					<option>Sort By</option>
				</select>
			</form>
		</div>
		<div id="listContainer">
			<div id="title"><span>Job Title</span></div>
			<div id="list">
			
			</div>
		</div>
	</body>
</html>