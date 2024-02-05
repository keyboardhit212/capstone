<html>
	<head>
		<style>
			
			#credentialHolder {
				width: 150px;
				height: 200px;
				float: left;
				margin-left: 23px;
				margin-top: 20px;
				border: 1px dashed #506a00;
				border-radius: 5px/5px;
			}
			#credentialHolder #picHolder{
				width: 100%;
				height: 150px;
				float: left;
			}
			#credentialHolder #titleHolder{
				width: 100%;
				height: 30px;
				float: left;
				font-family: helvetica;
				font-size: 12px;
				font-weight: bold;
				text-align: center;
				
			}
			#credentialHolder #titleHolder a {
				text-decoration: none;
				color: black;
			}
			 #credentialHolder #titleHolder a:hover {
				text-decoration: none;
				color: #b0e413;
				transition-duration: 0.5s;
			}
			#credentialHolder #optionHolder{
				width: 100%;
				height: 30px;
				float: left;
				font-family: helvetica;
				font-size: 12px;
				
				font-weight: bold;
				text-align: center;
				
			}
			#credentialHolder #optionHolder a{
				text-decoration: none;
				color: #666666;
			}
			#credentialHolder #optionHolder a:hover{
				color: black;
				transition-duration: 0.5s;
			}
			 #credentialHolder #picHolder img {
				width: 100%;
				height: 100%;
			}
		</style>
	</head>
	<body>
		<?php
			//$id ang variable
			foreach($credential->get_credentials($id) as $credentials) {
					echo "
						<a href='".$credentials['certificate_url']."' target='_blank'><div id='credentialHolder'>
							<div id='picHolder'><img src='../images/".$credentials['certificate_type'].".png'/></div>
							<div id='titleHolder'><a href=''>".$credentials['title']."</a></div>
						</div></a>
					";
			}
		?>
	</body>
</html>