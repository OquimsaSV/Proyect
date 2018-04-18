<html>
	<head>
		<title>Practica4</title>
		<style type=text/css>
			header {font-family: chellir;
			    font-style: oblique;
			    font-size: 30px;
			    font-weight: bold;
			    text-align: center;
			    color: white;
				background-color:#575662;
			    width: 100%;
	   			height: 50px;
	   		    padding-top: 15px;
	   		 background-size: 2250px;}

		nav {text-align: center;
	         background-color: #434269;
			 width: 100%;
	         height: 35px;
	         padding-top: 18px;}

	    nav a {text-decoration: none;
	           color: white;
	           font-size: 20px;
	           display: inline-block;}
	    nav a:hover{
	    	background-color: #0A021E;
	    	height: 35px;
	    	border-radius: 15px;


	    }

	    section {text-align: left;
	              background-color: #CBC8EB;
	              background-repeat: no-repeat;
	              background-size: 5000px;
	              color: black;
	              font-size: 20px;
	              width: 100%;
	              height: 4000px;
	              padding-top: 50px; 
	              padding-bottom: 50px;
	              }

	    section h4{font-size: 30px;}

	    section table {font-size: 15px;
	    	           margin-right: auto;
	                   margin-left: auto;
	                   margin-bottom: auto;
	                   margin-top: auto;}

	    footer {text-align: center;
	            background-color: #575662;
	            color:  white;
	            width: 100%;
	            height: 5%;
	            padding-top: 1px;
	            bottom: 0;
	            position: fixed;
	            font-size: 20px;
	            }

		</style>
			<body>
				<header>
					"Funciones En PHP"
				</header>
				<nav>
					<a href="inicio.php?pg=ejer1.php">Ejercicio 1</a>&nbsp&nbsp&nbsp
					<a href="inicio.php?pg=ejer2.php">Ejercicio 2</a>&nbsp&nbsp&nbsp
					<a href="inicio.php?pg=ejer3.php">Ejercicio 3</a>&nbsp&nbsp&nbsp
					<a href="inicio.php?pg=ejer4.php">Ejercicio 4</a>&nbsp&nbsp&nbsp
					<a href="inicio.php?pg=ejer5.php">Ejercicio 5</a>&nbsp&nbsp&nbsp
					<a href="inicio.php?pg=ejer6.php">Ejercicio 6</a>&nbsp&nbsp&nbsp
				
				</nav>
				<section>
					<?php
if(isset($_GET["pg"])){
	include($_GET["pg"]);
}
else{
	echo "hola";
}
					?>
				</section>
				<footer>
					Escuela Especializada En Ingenieria ITCA-FEPADE
				</footer>
			</body>
		
	</head>
</html>