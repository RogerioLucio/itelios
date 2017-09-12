<!DOCTYPE html>
<html>
<head>
	<title>TESTE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/vanilla.js"></script>
	<link rel="stylesheet" type="text/css" href="sass/style.css">

</head>
	<body>
		<div class="container">
			<div class="body" style=" overflow-x: hidden;">
				<div class="external-information">
						<div class="">	
							<h1>Você visitou:</h1>
						</div>
						<div class="">
							<h1>E talvez se interesse por:</h1>		
						</div>
				</div>
				<div class="carrousel" style="max-width: 100%; overflow-x: scroll;">
					<div class="products" id="products" style="width: 4000px;"></div>
					<ol class="carousel-indicators">
				      <li class="item1 active"></li>
				      <li class="item2"></li>
				      <li class="item3"></li>
				      <li class="item4"></li>
				    </ol>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
document.onreadystatechange = () => {
  if (document.readyState === 'complete') {
   			var xhttp = new XMLHttpRequest();
				xhttp.onreadystatechange = function() {
				    if (this.readyState == 4 && this.status == 200) {
				       var requisicao= JSON.parse(xhttp.responseText);
				       var div_externa = document.getElementById("products");
				     
				       	requisicao.forEach(function(index){
				       		  div_externa.insertAdjacentHTML('beforeend', `
				       		  		<div class="product" id="escolha_item">
									<div class="image">
										<div class="thumb">
											<img src="` + index.data.item.imageName + `">
										</div>
										
									</div>

									<div class="description">
										` + index.data.item.name + `
									</div>
									<div class="price">
											<label>Por:</label> <label class="dt_preco">` + index.data.item.price + `	</label>
									</div>
									<div class="old_price">
										<label>` + index.data.item.productInfo.paymentConditions + `</label>
									</div>
								</div>
				       		  	`);
				       		index.data.recommendation.forEach(function(index, key){
				       			div_externa.insertAdjacentHTML('beforeend', `
				       				<div class="product">
									<div class="image">
										<div class="thumb">
											<img src="` + index.imageName + `">
										</div>
										
									</div>

									<div class="description">
										` + index.name + `
									</div>
									<div class="price">
											<label>Por:</label> <label class="dt_preco">` + index.price + `	</label>
									</div>
									<div class="old_price">
										<label>` + index.productInfo.paymentConditions + `</label>
									</div>
								</div>


				       			`);
				       		})
				       	})
				    }
				};
				xhttp.open("GET", "products.json", true);
				xhttp.send();
  }
};

</script>