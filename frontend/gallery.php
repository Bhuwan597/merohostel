<style>
    .item-1, 
.item-2, 
.item-3,
.item-4, 
.item-5, 
.item-6,
.item-7, 
.item-8, 
.item-9,
.item-10 {
	position: absolute;
  display: block;
	top: 1em;
  
  width: 70%;
  
  font-size: 2em;

	animation-duration: 25s;
	animation-timing-function: ease-in-out;
	animation-iteration-count: infinite;
}

@keyframes anim-1 {
	0%, 2% { left: -100%; opacity: 0; }
  4%, 8% { left: 21%; opacity: 1; }
  10%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-2 {
  0%, 10%  { left: -100%; opacity: 0; }
  12%, 18% { left: 21%; opacity: 1; }
  20%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-3 {
	0%, 20% { left: -100%; opacity: 0; }
  22%, 28% { left: 21%; opacity: 1; }
  30%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-4 {
	0%, 30% { left: -100%; opacity: 0; }
  32%,38% { left: 21%; opacity: 1; }
  40%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-5 {
	0%, 40% { left: -100%; opacity: 0; }
  42%, 48% { left: 21%; opacity: 1; }
  50%, 100% { left: 110%; opacity: 0; }
}
@keyframes anim-6 {
	0%, 50% { left: -100%; opacity: 0; }
   52% , 58%{ left: 21%; opacity: 1; }
  60%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-7 {
	0%, 60% { left: -100%; opacity: 0; }
  62%, 68% { left: 21%; opacity: 1; }
  70%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-8 {
	0%, 70% { left: -100%; opacity: 0; }
   72%, 78% { left: 21%; opacity: 1; }
   80%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-9 {
	0%, 80% { left: -100%; opacity: 0; }
  82%, 88% { left: 21%; opacity: 1; }
  90%, 100% { left: 110%; opacity: 0; }
}

@keyframes anim-10 {
	0%, 90% { left: -100%; opacity: 0; }
  92%, 98% { left: 21%; opacity: 1; }
  100% { left: 110%; opacity: 0; }
}
 /*-----------------------text-ende---------------------  */

 /* ----------------slide------------------------------- */
 
  /*----------------------- slick---------------------  */


  .slide {
	position: relative;
	display: block;
	width: 98%;
	margin: 1% auto; 
	padding: 0;
	/* border: 5px solid #2C3E50; */
	overflow:hidden;
  }
  
  .slide:after {
	content: "";
	position: absolute;
	top:0;
	left:0;
	width: 50.6%;
	height: 0.5%;
	background: #38b6ff;
	animation: leftRight 40s infinite linear;
  }
  .slide:before {
	content: "";
	position: absolute;
	top: 0;
	right:0;
	width: 50.6%;
	height: 0.5%;
	background: #c6156d;
	animation: leftRight 40s infinite linear;
	z-index:9999;
  }
  .portfolio {
	position: relative;
	width: 100%;
	height:800px;
	padding: 0;
	overflow: hidden;
	margin: 0;
  }
  
  .portfolio_items {
	position: absolute;
	left: 0;
	top: 0;
	width: 1800%; 
	animation: slide 50s infinite linear;
  }
  
  .portfolio_item {
	position: relative;
	display: block;
	padding: 0;
	margin: 0;
	float: left;
	width: 5.5556%;
  }
  
  .portfolio_item img {
	width: 100%;
	border: 0;
	outline: 0;
	display: block;
  }
  
  /* fx */
  @keyframes leftRight{
	0%{width:0%;}
	10%{width:50%;}
	12%{width:0%;}
	20%{width:50%;}
	22%{width:0%;}
	30%{width:50%;}
	32%{width:0%;}
	40%{width:50%;}
	42%{width:0%;}
	50%{width:50%;}
	52%{width:0%;}
	60%{width:50%;}
	62%{width:0%;}
	70%{width:50%;}
	72%{width:0%;}
	80%{width:50%;}
	82%{width:0%;}
	90%{width:50%;}
	100%{width:0%;}
  } 
  
  @keyframes slide {
	0% {left: 0%;opacity: 0;}
	2% {left: 0%;opacity: 1;}
	8% {left: 0%;opacity: 1;}
	10% {left: 0%;opacity: 0;}

	12% {left: -100%;opacity: 0;}
	14% {left: -100%;opacity: 1;}
	18% {left: -100%;opacity: 1;}
	20% {left: -100%;opacity: 0;}

	22% {left: -200%;opacity: 0;}
	24% {left: -200%;opacity: 1;}
	28% {left: -200%;opacity: 1;}
	30% {left: -200%;opacity: 0;}

	32% {left: -300%;opacity: 0;}
	34% {left: -300%;opacity: 1;}
	38% {left: -300%;opacity: 1;}
	40% {left: -300%;opacity: 0;}

	42% {left: -400%;opacity: 0;}
	44% {left: -400%;opacity: 1;}
	58% {left: -400%;opacity: 1;}
	50% {left: -400%;opacity: 0;}

	52% {left: -500%;opacity: 0;}
	54% {left: -500%;opacity: 1;}
	58% {left: -500%;opacity: 1;}
	60% {left: -500%;opacity: 0;}

	62% {left: -600%;opacity: 0;}
	64% {left: -600%;opacity: 1;}
	68% {left: -600%;opacity: 1;}
	70% {left: -600%;opacity: 0;}

	72% {left: -700%;opacity: 0;}
	74% {left: -700%;opacity: 1;}
	78% {left: -700%;opacity: 1;}
	80% {left: -700%;opacity: 0;}

	82% {left: -800%;opacity: 0;}
	84% {left: -800%;opacity: 1;}
	88% {left: -800%;opacity: 1;}
	90% {left: -800%;opacity: 0;}

	92% {left: -900%;opacity: 0;}
	94% {left: -900%;opacity: 1;}
	98% {left: -900%;opacity: 1;}
	99% {left: -900%;opacity: 0;}

	100% {left: 0%;opacity: 0;}
  }
  
  
  /* media queries */
  @media (min-width: 240px) {
	.portfolio_item figcaption {width:50%}
	.portfolio{height:100px;}}
  @media (min-width: 320px) {
	.portfolio_item figcaption {width:35%}
   .portfolio{height:200px;}}
  @media (min-width: 480px) {
	.portfolio_item figcaption {width:25%}
	.portfolio{height:250px;}}
  @media (min-width: 760px) {
	.portfolio_item figcaption {width:95%}
	.portfolio{height:900px;}} 
	@media (min-width: 3700px) {
		.portfolio_item figcaption {width:95%}
		.portfolio{height:2000px;}}  

/* bulma.min.css | https://cdn.jsdelivr.net/npm/bulma@0.9.3/css/bulma.min.css */

@media screen and (min-width: 769px), print {
	.hero-body {
	  padding: 0rem 0rem !important;
	}
  }
  
  .hero-body {
	padding: 0rem 0rem !important; 
  }
  
 /*----------------------- best list---------------------  */

 .bd-best {
    height: calc(200px + 3rem);
    padding: 0.5rem 0;
    overflow: hidden;
    position: relative;
  }

  .bd-best-list {
    align-items: stretch;
    animation-duration: 50s;
    animation-iteration-count: infinite;
    animation-timing-function: linear;
    display: flex;
    left: 0;
    position: absolute;
    top: 1rem;
    -webkit-animation-name: bdBestCarousel;
    animation-name: bdBestCarousel;
  }
  
  .bd-best-item {
    flex-grow: 0;
    flex-shrink: 0;
    margin-right: 16px;
    transition-duration: 85ms;
    transition-property: box-shadow,transform;

  }

  .bd-best-item:hover {
    box-shadow: 0 1em 1em rgba(0,0,0,.1);
    transform: translateY(-.1em);
  }
  .bd-best-list:hover {
    -webkit-animation-play-state: paused;
    animation-play-state: paused;
  }

  @keyframes bdBestCarousel{
  100%{
       transform: translateX(calc(-155% + 3120px)); 
  }
} 

.footer {
  padding: 0 0 0 !important;
}

@media (min-width: 3700px) {

.bd-best {
	min-height: 400px;
  }
  
.bd-best-item {
	width: 200px;
	height: 100px;
		}	
.bd-best-list {
	animation-duration: 80s;
		}
.kl_img{
	width: 300px;
}

}
    
 
</style>
<body>
  <div class="container">
    <h1 class="jumbotron-heading text-center m-2">Hostel Gallery</h1>
  </div>
        <div class="wrapper">
          <main class="main ">
            <div class="slide">
            <div class="portfolio">
              <section class="portfolio_items">
                <?php
                $sql = "SELECT * FROM merohostel_gallery";
        $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            echo' <figure class="portfolio_item" >
            <img style="border-end-end-radius: 50px;border-bottom-left-radius: 50px;"  src="'.$row['mainimagelink'].'" alt="" />	
          </figure>';
           }
           ?>
              </section>
            </div>
          </div>
          </main>
        </div>
      
        <footer class="footer" style="overflow-x:hidden;">
            <div class="bd-best">
                <div class="bd-best-list">
                <?php
                $sql = "SELECT * FROM merohostel_gallery";
        $result = mysqli_query($conn, $sql);
           while($row = mysqli_fetch_assoc($result)){
            echo ' <figure class="bd-best-item" >
            <img style="width:300px ; height:200px" class="kl_img" src="'.$row['subimagelink'].'" alt="">
          </figure>';
           }
           ?>            
                </div>
           </div>
        </footer>