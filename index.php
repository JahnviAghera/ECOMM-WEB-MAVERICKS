<?php include 'includes/session.php'; ?>
<?php include 'includes/header.php'; ?>
<style>
      main .hero {
          margin-top:100px;
        display: flex;
        padding: 0 200px;
        align-items: center;
        height: 80vh;
        justify-content: center;
      }
      main .hero .main-highlight {
        background: linear-gradient(135deg, rgba(0, 0, 0, 0.951), rgba(0, 0, 0, 0.5)), url('image/R\ 1.png');
        border-radius: 10px;
        background-size: cover;
        background-position: center;
        height: 500px;
        width: 650px;
      }
      main .hero .main-highlight .cont {
        padding: 100px 50px;
      }
      main .hero .main-highlight .cont div {
        font-family: Poppins, sans-serif;
      }
      main .hero .s1 {
        margin: 10px 20px;
        height: 500px;
        width: 650px;
        gap: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
      }
      main .hero .s1 .sub1 {
        background: #FCE7F3;
        border-radius: 10px;
        background-size: cover;
        background-position: center;
        height: 240px;
        width: 100%;
      }
      main .hero .s1 .sub1 .sub1-con1 {
        padding: 50px 50px;
      }
      main .hero .s1 .sub2 {
        background: #EC4899;
        border-radius: 10px;
        background-size: cover;
        background-position: center;
        height: 240px;
        width: 100%;
      }
      main .hero .s1 .sub2 .sub2-con1 {
        padding: 50px 50px;
      }
      @media (max-width: 768px) {
        main .hero {
          flex-direction: column;
          padding: 0 20px;
          height: auto;
        }
        main .hero .main-highlight,
        main .hero .s1 {
          width: 100%;
          height: auto;
        }
        main .hero .main-highlight .cont {
          padding: 50px 20px;
        }
      }
      .category-section {
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        font-family: Poppins, sans-serif;
        color: rgba(40, 29, 27, 1);
        font-weight: 700;
        padding: 0 80px;
      }
      @media (max-width: 991px) {
        .category-section {
          padding-left: 20px;
        }
      }
      .category-carousel {
        position: relative;
        display: flex;
        width: 100%;
        max-width: 1322px;
        flex-direction: column;
        justify-content: flex-start;
        padding: 52px 0;
      }
      @media (max-width: 991px) {
        .category-carousel {
          max-width: 100%;
        }
      }
      .shop-by-category-title {
        font-size: 48px;
        line-height: 1;
        letter-spacing: -0.96px;
        z-index: 0;
      }
      @media (max-width: 991px) {
        .shop-by-category-title {
          max-width: 100%;
          font-size: 40px;
        }
      }
      .categories-container {
        z-index: 0;
        display: flex;
        margin-top: 32px;
        width: 100%;
        align-items: flex-start;
        gap: 24px;
        font-size: 20px;
        white-space: nowrap;
        letter-spacing: -0.4px;
        line-height: 1.2;
        justify-content: flex-start;
        flex-wrap: wrap;
      }
      @media (max-width: 991px) {
        .categories-container {
          max-width: 100%;
          white-space: initial;
        }
      }
      .category-item {
        display: flex;
        min-width: 240px;
        flex-direction: column;
        justify-content: flex-start;
        flex: 1;
        flex-basis: 0%;
      }
      @media (max-width: 991px) {
        .category-item {
          max-width: 100%;
          white-space: initial;
        }
      }
      .category-img {
        aspect-ratio: 0.98;
        object-fit: contain;
        object-position: center;
        width: 100%;
        border-radius: 16px;
        background-blend-mode: normal;
      }
      @media (max-width: 991px) {
        .category-img {
          max-width: 100%;
        }
      }
      .category-name {
        margin-top: 14px;
      }
      @media (max-width: 991px) {
        .category-name {
          max-width: 100%;
        }
      }
      @media (max-width: 768px) {
        nav .nav1 {
          padding: 10px 20px;
        }
        .search-input-wrapper {
          min-width: 200px;
        }
        .header-icons {
          padding-left: 20px;
        }
        main .hero {
          flex-direction: column;
          padding: 0 20px;
          height: auto;
        }
        main .hero .main-highlight,
        main .hero .s1 {
          width: 100%;
          height: auto;
        }
        main .hero .main-highlight .cont {
          padding: 50px 20px;
        }
        .navigation {
          padding: 16px 20px;
        }
      }
</style>
<body class="hold-transition skin-blue layout-top-nav">


	<?php include 'includes/navbar.php'; ?>
	 <main>
        <div class="hero">
            <div class="main-highlight">
                <div class="cont">
                    <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 28px; display: inline-flex">
                        <div style="width: 596px; color: white; font-size: 48px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 57.60px; word-wrap: break-word" class="fade-in">Elevate Your Style with Adda</div>
                        <div style="justify-content: flex-start; align-items: flex-start; gap: 12px; display: inline-flex" class="fade-in">
                          <div style="width: 2px; height: 65px; background: #F9A8D4"></div>
                          <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: inline-flex">
                            <div style="justify-content: flex-start; align-items: center; gap: 8px; display: inline-flex">
                              <div style="color: white; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 500; line-height: 30px; word-wrap: break-word">Sale up to</div>
                              <div style="padding-left: 12px; padding-right: 12px; padding-top: 4px; padding-bottom: 4px; background: #FF8A00; border-radius: 5px; justify-content: flex-start; align-items: flex-start; gap: 10px; display: flex">
                                <div style="color: white; font-size: 20px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 30px; word-wrap: break-word">30% OFF</div>
                              </div>
                            </div>
                            <div style="opacity: 0.80; color: white; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 400; line-height: 21px; word-wrap: break-word">Free shipping on all your order.</div>
                          </div>
                        </div>
                        <div style="padding-left: 40px; padding-right: 40px; padding-top: 16px; padding-bottom: 16px; background: white; border-radius: 53px; justify-content: center; align-items: center; gap: 16px; display: inline-flex">
                          <div style="color: #DB2777; font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 19.20px; word-wrap: break-word">Shop now</div>
                          <img src="image\Group.svg" alt="">
                        </div>
                      </div>
                </div>
            </div>
            <div class="s1">
                <div class="sub1">
                    <div class="sub1-con1">
                        <div style="width: 132px; height: 103px; flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 24px; display: inline-flex">
                            <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 12px; display: flex">
                              <div style="flex-direction: column; justify-content: flex-start; align-items: flex-start; gap: 8px; display: flex">
                                <div style="color: #1A1A1A; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; text-transform: uppercase; line-height: 14px; letter-spacing: 0.42px; word-wrap: break-word" class="fade-in">Summer Sale</div>
                                <div style="color: #1A1A1A; font-size: 32px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 38.40px; word-wrap: break-word" class="fade-in" >75% OFF</div>
                              </div>
                            </div>
                            <div style="border-radius: 43px; justify-content: center; align-items: center; gap: 12px; display: inline-flex">
                              <div style="color: #DB2777; font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 19.20px; word-wrap: break-word"class="fade-in" >Shop Now</div>
                              <img src="image\Group.svg" alt="" class="fade-in">
                            </div>
                          </div>
                    </div>
                </div>
                <div class="sub2">
                    <div class="sub2-con1">
                        <div style="width: 343px; height: 153px; flex-direction: column; justify-content: center; align-items: center; gap: 32px; display: inline-flex">
                            <div style="align-self: stretch; flex-direction: column; justify-content: center; align-items: center; gap: 12px; display: inline-flex">
                              <div style="text-align: center; color: white; font-size: 14px; font-family: 'Poppins', sans-serif; font-weight: 500; text-transform: uppercase; line-height: 14px; letter-spacing: 0.42px; word-wrap: break-word"class="fade-in">Best Deal</div>
                              <div style="width: 343px; text-align: center; color: white; font-size: 32px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 38.40px; word-wrap: break-word"class="fade-in">Special Products Deal of the Month</div>
                            </div>
                            <div style="align-self: stretch; border-radius: 43px; justify-content: center; align-items: center; gap: 12px; display: inline-flex">
                              <div style="text-align: center; color: white; font-size: 16px; font-family: 'Poppins', sans-serif; font-weight: 600; line-height: 19.20px; word-wrap: break-word"class="fade-in"><a link="https://adaajaipur.free.nf/ecommerce/search.php"></a></div>
                              <img src="image/white arrow.svg" alt=""class="fade-in">
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <div class="category-section">
        <div class="category-carousel">
          <div class="shop-by-category-title">Shop by Category</div>
          <div class="categories-container">
            <div class="category-item">
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/7edac4fc8e0606340e21fd87a55204c972082036f318e7d814d2f3975f838f4a?apiKey=f92c23ab3a3d41e68ba9cae894fa753e&"
                alt="Sarees"
                class="category-img"
                tabindex="0"
              />
              <div class="category-name">Sarees</div>
            </div>
            <div class="category-item">
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/c0052b09716520b6dbaa28097e896743749998c110a95711c7b75f1c52d73246?apiKey=f92c23ab3a3d41e68ba9cae894fa753e&"
                alt="Lehengas"
                class="category-img"
                tabindex="0"
              />
              <div class="category-name">Lehengas</div>
            </div>
            <div class="category-item">
              <img
                loading="lazy"
                src="https://cdn.builder.io/api/v1/image/assets/TEMP/269cb9d4bdb92af780b14df5d0736e733521cb9f8134ad0d25bca44d6ac42d89?apiKey=f92c23ab3a3d41e68ba9cae894fa753e&"
                alt="Kurtis"
                class="category-img"
                tabindex="0"
              />
              <div class="category-name">Kurtis</div>
            </div>
          </div>
          <!-- <div class="divider"></div> -->
        </div>
      </div>
      </div>
	  <!--<div class="content-wrapper">
	    <div class="container">

	      
	      <section class="content">
	        <div class="row">
	        	<div class="col-sm-9">
	        		<?php
	        			if(isset($_SESSION['error'])){
	        				echo "
	        					<div class='alert alert-danger'>
	        						".$_SESSION['error']."
	        					</div>
	        				";
	        				unset($_SESSION['error']);
	        			}
	        		?>
	        		<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
		                <ol class="carousel-indicators">
		                  <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
		                  <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
		                </ol>
		                <div class="carousel-inner">
		                  <div class="item active">
		                    <img src="images/banner1.png" alt="First slide">
		                  </div>
		                </div>
		                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
		                  <span class="fa fa-angle-left"></span>
		                </a>
		                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
		                  <span class="fa fa-angle-right"></span>
		                </a>
		            </div>
		            <h2>Monthly Top Sellers</h2>
		       		<?php
		       			$month = date('m');
		       			$conn = $pdo->open();

		       			try{
		       			 	$inc = 3;	
						    $stmt = $conn->prepare("SELECT *, SUM(quantity) AS total_qty FROM details LEFT JOIN sales ON sales.id=details.sales_id LEFT JOIN products ON products.id=details.product_id WHERE MONTH(sales_date) = '$month' GROUP BY details.product_id ORDER BY total_qty DESC LIMIT 6");
						    $stmt->execute();
						    foreach ($stmt as $row) {
						    	$image = (!empty($row['photo'])) ? 'images/'.$row['photo'] : 'images/noimage.jpg';
						    	$inc = ($inc == 3) ? 1 : $inc + 1;
	       						if($inc == 1) echo "<div class='row'>";
	       						echo "
	       							<div class='col-sm-4'>
	       								<div class='box box-solid'>
		       								<div class='box-body prod-body'>
		       									<img src='".$image."' width='100%' height='230px' class='thumbnail'>
		       									<h5><a href='product.php?product=".$row['slug']."'>".$row['name']."</a></h5>
		       								</div>
		       								<div class='box-footer'>
		       									<b>&#36; ".number_format($row['price'], 2)."</b>
		       								</div>
	       								</div>
	       							</div>
	       						";
	       						if($inc == 3) echo "</div>";
						    }
						    if($inc == 1) echo "<div class='col-sm-4'></div><div class='col-sm-4'></div></div>"; 
							if($inc == 2) echo "<div class='col-sm-4'></div></div>";
						}
						catch(PDOException $e){
							echo "There is some problem in connection: " . $e->getMessage();
						}

						$pdo->close();

		       		?> 
	        	</div>  
	        	
	        </div>
	      </section>
	     
	    </div>
	  </div>
<div class="col-sm-3">
	        		<?php include 'includes/sidebar.php'; ?>
	        	</div>-->
                
  	<?php include 'includes/footer.php'; ?>
</div>

<?php include 'includes/scripts.php'; ?>
</body>
</html>