<?php
use yii\helpers\Url;
include"conf.php"
?>
<div class="container">
			<div class="row">

				<div class="col-sm-3">
					<h2>Filters</h2>
						<div class="panel-group category-products" id="accordian">
						
						<div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse"  href="#color">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Color
                                        </a>
                                    </h4>
                                </div>
                                <div id="color" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                        	<?php
												$query = "select distinct(color) from item ";
												$rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
												while($color_data = mysqli_fetch_assoc($rs)){ 
											?>
                                            <li><!-- <a href="#">Nike </a> -->
                                            <input type="checkbox" onclick="filter();" class="item_filter color" value="<?php echo $color_data['color']; ?>">&nbsp;&nbsp; <?php echo $color_data['color']; ?></a>
											<?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                           </div>

                           <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" href="#material">
                                            <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                                            Material
                                        </a>
                                    </h4>
                                </div>
                                <div id="material" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            <?php
												$query = "select distinct(material) from item ";
												$rs = mysqli_query($con,$query) or die("Error : ".mysql_error());
												while($material_data = mysqli_fetch_assoc($rs)){ 
											?>	
                                            <li><!-- <a href="#">Nike </a> -->
                                            <input type="checkbox" onclick="filter();" class="item_filter material" value="<?php echo $material_data['material']; ?>">&nbsp;&nbsp; <?php echo $material_data['material']; ?></a>
											<?php } ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                           </div>


						</div>
				</div>

				
				<!--all images of decor from itemimage table-->
				<div class='col-sm-9'>
					<h2 class="title text-center"><input type="text" id="cat" value="<?= $cat ?>" style="display: none;" ><?= $cat ?> Items</h2>
						<?php foreach(array_keys($category) as $i ) {

								
							//echo $category[$i]->item_id ?>
				<div id="product-data">
						<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">

											<img src="images/product-details/<?php echo $category[$i]->image?>" alt="photo" />
											
											<h2>&#8377;<?=$category[$i]->rent_per_day?></h2>
											<p><?=$category[$i]->name?></p>									
											<a href="<?=Url::to(['/site/product','id'=>$category[$i]->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
											
										</div>

										<div class="product-overlay">
                                        <div class="overlay-content">
                                            <h2></h2>
                                            <p></p>
                                            <a href="<?=Url::to(['/site/product','id'=>$category[$i]->item_id])?>" class="btn btn-default product-details"><i class="fa fa-search"></i>View Details</a>
                                        </div>
                                    </div>
										
								</div>
								
							</div>
						</div>
					</div>
						<?php }?>
				
						
			</div>	
			</div>
			
		</div>

<script src="js/jquery.js"></script>
<script type="text/javascript">
	
	var color,material;

	function multiple_values(inputclass){
		//alert(inputclass);
		var val = new Array();
		$("."+inputclass+":checked").each(function() {
		    val.push($(this).val());
		});
		return val;
	}

	function filter(){
		color = multiple_values("color");
		material = multiple_values("material");
		cat = document.getElementById("cat").value;


		$.ajax({
			url:"ajax.php",
			type:"post",
			data:{
				
				cat:cat
			},
			cache:false,
			success:function(html){
				//$('#product-data').html(result);
				alert(html);	
			}
		});
	}
</script>	