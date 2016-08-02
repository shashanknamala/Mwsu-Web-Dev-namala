<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>

	<meta charset=utf-8 />
	<title>Client Side Pagination</title>
	<link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" media="screen" href="./css/font-awesome.css" />
	<script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="./plugin/jquery.twbsPagination.js"></script>
	

<style>
.thumbnail img {
    width: 30%;
}
</style>
</head>

<body>



<div class="modal hide" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false">
        <div class="modal-header">
            <h1>Processing...</h1>
        </div>
        <div class="modal-body">
            <div class="progress progress-striped active">
                <div class="bar" style="width: 100%;"></div>
            </div>
        </div>
    </div>
</div>



    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Start Bootstrap</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">About</a>
                    </li>
                    <li>
                        <a href="#">Services</a>
                    </li>
                    <li>
                        <a href="#">Contact</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <div class="col-md-3">
                <p class="lead">Shop Name</p>
                <ul class="list-group">
				  <li class="list-group-item active">tablet</li>
				  <li class="list-group-item">smartphone</li>
				  <li class="list-group-item">laptop</li>
				  <li class="list-group-item">ipad</li>
				  <li class="list-group-item">game console</li>
				  <li class="list-group-item">desktop computer</li>
				  <li class="list-group-item">camera</li>
				</ul>
            </div>

            <div class="col-md-9">

                <div class="row carousel-holder" id="slide">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="http://webmarketingninjas.co/wp-content/uploads/2014/10/preventing-shopping-cart-abandonment-the-last-hurdle-to-successful-conversions.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="https://media.licdn.com/mpr/mpr/shrinknp_800_800/AAEAAQAAAAAAAAdXAAAAJDMxYzkwYWM5LTUzYzgtNGRjNC05OGEyLWU4OGVkYTVmN2U4Mg.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="https://onmogul.s3.amazonaws.com/uploads/froala_image/image/13909/fee69fda4a.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row1" id="products">

 
                </div>
				<div class="row">
				  <div class="col-xs-12 col-sm-12"><center>
					  <ul id="pagination-demo" class="pagination-sm"></ul>
					  </center>
				</div>

            </div>

        </div>

    </div>
    <!-- /.container -->

    <div class="container">

        <hr>


    </div>

	
<script>
(function($) {
    //http://esimakin.github.io/twbs-pagination/
	

    var myWait;
    myWait = myWait || (function () {
        var waitDiv = $('<div class="modal" id="pleaseWaitDialog" data-backdrop="static" data-keyboard="false"><div class="progress"> <div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width:98%"> LOADING... </div></div></div>');
        return {
            show: function() {
                waitDiv.modal();
            },
            hide: function () {
                waitDiv.modal('hide');
            },

        };
    })();

    myWait.show();

    // Set up some variables for our pagination
    var page = 1;
    var page_size = 12;
    var total_records = 0;
    var total_pages = 0;
    var rows = "";
    var col_head = "";

	// $.get("http://45.55.252.21/api/api.php/categories?order=name")
	// .done(function(data) {
        
            // // Pull the products out of our json object 
            // var rows = data.categories.records;
			
			// //console.log(rows);
			
			// for (var i = 0; i < rows.length; i++) {
				// var cat = String(rows[i][1]).trim();
				// //console.log(cat);
				// if(i==0)
				// {
				// var catButton = '<li class="list-group-item active">'+cat+'</li>';
				// }
				// else
				// {
					// var catButton = '<li class="list-group-item">'+cat+'</li>';
				// }
				// $('.list-group').append(catButton);
			// }
			
	// });
	
	var count = 0;
    function loadProductData(page,page_size,category) {
	
		var category = typeof category !== 'undefined' ?  ","+category : 0;
    
        myWait.show();
        //console.log("skldkkdkd");
		//console.log(category);
        // Perform a get request to our api passing the page number and page size as parameters
		//console.log("http://mwsu-webdev.xyz/api/api.php/products?page=" + page + "," + page_size&filter=categor,eq,"+category);
		
		if(category)
			var url = "http://45.55.252.21/api/api.php/products?page=" + page + "," + page_size + "&filter=category,eq" + category + "&order=id";
		else
			var url = "http://45.55.252.21/api/api.php/products?page=" + page + "," + page_size + "&order=id";
	
		//console.log(url);
        $.get(url)
		// The '.done' method fires when the get request completes
        .done(function(data) {
        
			//console.log(data);
            // Pull the products out of our json object 
            var records = data.products.records;

            // Start an empty html string
            for (var i = 0; i < records.length; i++) {
				var item = {};
                //Start a new row for each product and put the product id in a data-element
				item.id = records[i][0];

                // Loop through each item for a product and append a table data tag to our row
                for (var j = 1; j < records[i].length; j++) {
                
                    if(j == 1){
						item.category = records[i][j] ;
					}else if(j == 2){
						item.description = records[i][j] ;
					}else if(j == 3){
						item.price = records[i][j] ;
					}else{
                        var result = records[i][j] .split(' ');
                        var img = result[0].replace("~","100");
                        item.image = "<img width=\"100\" src="+img+">";
						item.img=img;
                    }
                }
				//console.log(item);
				addProductItem(item);
				
            }

            // At this point "rows" should have 'page_size' number of items in it,
            // so append all those rows to the body of the table.
            $('tbody').html(rows);
            
            myWait.hide();
			
        });
    } // End .done
	
	function addProductItem(item){
		//{id: "1", category: "tablet", description: "Fire Tablet, 7" Display, Wi-Fi, 8 GB - Includes Special Offers, Black", 
		//price: "49.99", image: "<img src=https://images-na.ssl-images-amazon.com/images/I/41A4mMSdBJL._AC_US150_.jpg>"}
		
		var words = item.description.split(" ");
		var name = words[0]+' '+words[1];
		var desc = item.description.substring(0,40) + '...';
		
		var itemHtml = '';
		itemHtml += '<div class="col-sm-4 col-lg-4 col-md-4" id="prod_name">'+
		'	<div class="thumbnail" id='+item.id+'>'+
		'		'+item.image +
		'		<div class="caption">'+
		'			<h4 class="pull-right">$'+item.price+'</h4>'+
		'			<h4><a href="#">'+name+'</a>'+
		'			</h4>'+
		'			<p>'+desc+'</p>'+
		'		</div>'+
		'		<div class="ratings">'+
		'			<p class="pull-right">12 reviews</p>'+
		'			<p>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star"></span>'+
		'				<span class="glyphicon glyphicon-star-empty"></span>'+
		'			</p>'+
		'		</div>'+
		'	</div>'+
		'</div>';
		//console.log(itemHtml);
		
		$('#products').append(itemHtml);
		
		$('#'+item.id+'').click(function() {

			window.location.href='startbootstrap-shop-item/index.html';
			localStorage.setItem('_id',item.id );

		});
		
			
	}
	


	

	$("ul li").click(function() {
		$(this).parent().children().removeClass("active");
		$(this).addClass("active");
		$this = $(this);
		var column = $this.text();
		//console.log(column);
		//$('#slide').empty();
		$('#products').empty();
		loadProductData(page,10,column);
		//display_item();
	});
    
    function getTotalPages(){
        $.get("http://45.55.252.21/api/api.php/products")

        // The '.done' method fires when the get request completes
        .done(function(data) {
			//console.log("jones");
            total_records = data.products.records.length;
            total_pages = parseInt(total_records / page_size);
            loadProductData(1, 6);
            $('#pagination-demo').twbsPagination({
                totalPages: total_pages,
                visiblePages: 12,
                onPageClick: function (event, page) {
					//$('.row').empty();
                    $('#page-content').text('Page ' + page);
					$('#products').empty();
                    loadProductData(page,12);
                }
            });
			
        });

    }
    
	 function guid() {
	  function s4() {
		return Math.floor((1 + Math.random()) * 0x10000)
		  .toString(16)
		  .substring(1);
	  }
	  return s4() + s4() + '-' + s4() + '-' + s4() + '-' +
		s4() + '-' + s4() + s4() + s4();
	}
	
    getTotalPages();



	
}(jQuery));




</script>


</body>

</html>
