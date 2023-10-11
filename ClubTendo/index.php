<?php
	include("include/header.php");
	
		
	

	
	
?>


	<div class="main"> <!-- Main area of my site -->
		<h2>Welcome TO CLUB TENDO</h2>
		<iframe id = "nintendovid" width="400" height="300" src="https://www.youtube.com/embed/K783SDTBKmg"  
		  frameborder="2" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
		  allowfullscreen></iframe> <!-- Super smash bros ad from the 90s -->
		  
		<p id = "welcome1" >This ever changing website is home to everything Nintendo be that news, updates, game trailers and of course tips and tricks of the trade. 
		Not only is this a Website but we also have a store located in Melbourne CBD for all your gaming needs from shirts to everything you will need for the perfect retro gaming set up.</p>
		  
		 
	</div>
		  

<div class="right"> <!-- SlideShow DIV -->
		 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src = "slideshow.js"></script>
		<style> 
			#photoShow{
			width: 277px;
			height: 407px;
			border: solid 4px black;
			}
			#photoShow div{
				position: absolute;
				z-index: 0;

			}
			#photoShow div.previous{
				z-index: 1;
				}
			#photoShow div.current{
				z-index: 2;
				}
		</style>
    

</head>
	<body>
		<h2>Cards of the week</h2>   <!--- Card images -->
			<div id="photoShow">
				<div class="current">
					<img src="images/image1.png" alt="Photo Gallery" width="270" height="400" class="gallery" />
				</div>
				<div>
					<img src="images/image2.png" alt="Photo Gallery" width="270" height="400" class="gallery" />
				</div>
				<div>
					<img src="images/image3.png" alt="Photo Gallery" width="270" height="400" class="gallery" />
				</div>
				<div>
					<img src="images/image4.jpg" alt="Photo Gallery" width="270" height="400" class="gallery" />
				</div>
			</div>

</div>
</div>

	<div id = "footer">© copyright Melbourne Polytechnic</div>
</div>
</body>
</html>
