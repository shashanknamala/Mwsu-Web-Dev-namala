<?php

    print_r($_GET);
    if(isset($_GET['size'])){
        $size = $_GET['size'];
    }else{
        $size = 20;
    }
    if(isset($_GET['start'])){
        $start = $_GET['start'];
    }else{
        $start = 0;
    }

    $next = $start + $size;
    $prev = $start - $size;

    if($prev<0){
        $prev = 0;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset=utf-8 />
    <title></title>
    <link rel="stylesheet" type="text/css" media="screen" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script   src="https://code.jquery.com/jquery-2.2.4.js"   integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="   crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--[if IE]>
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <style>
        .pagination>li>a, .pagination>li>span { border-radius: 50% !important;margin: 0 5px;}
    </style>
</head>
<body>
<div class="btn-toolbar">
    <button class="btn btn-primary">New User</button>
    <button class="btn">Import</button>
    <button class="btn">Export</button>
</div>
<div class="well">
    <table class="table table-striped">
      <thead>
      </thead>
      <tbody>
      </tbody>
    </table>
</div>
<div class="container">
<ul class="pagination">
              <li class="disabled"><a href="#">«</a></li>
              <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
              <li><a href="#">2</a></li>
              <li><a href="#">3</a></li>
              <li><a href="#">4</a></li>
              <li><a href="#">5</a></li>
              <li><a href="#">»</a></li>
            </ul>
</div>
<div class="modal small hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Delete Confirmation</h3>
    </div>
    <div class="modal-body">
        <p class="error-text">Are you sure you want to delete the user?</p>
    </div>
    <div class="modal-footer">
        <button class="btn" data-dismiss="modal" aria-hidden="true">Cancel</button>
        <button class="btn btn-danger" data-dismiss="modal">Delete</button>
    </div>
</div>
<script>
$.get( "http://45.55.252.21/api/api.php/products?order=id&page=1,20")
  .done(function( data ) {
    console.log( data );
    var cols = data.products.columns;
    var col_head = "<tr>";
    for(var i=0;i<cols.length;i++){
        console.log(cols[i]);
        col_head = col_head + "<th>"+cols[i]+"</th>";
    }
    col_head = col_head + "<th style=\"width: 36px;\"></th></tr>";
    console.log(col_head);
    $('thead').append(col_head);
  });
 $.get( "http://45.55.252.21/api/api.php/products?order=id&page=1,20")
  .done(function( data ) {
    var rec = data.products.records;
    for(var i=0;i<rec.length;i++){
		var rec_body = "<tr>";
		for(var j=0;j<rec[i].length;j++)
		{
			//console.log(rec[i][j]);
			if(j< (rec[i].length)-1){
			rec_body = rec_body + "<td>"+rec[i][j]+"</td>"; }
			else{
			rec_body = rec_body + "<td><img src="+rec[i][j].replace("\~","50",-1)+"></td>";}
		}
		rec_body = rec_body + "<td style=\"width: 36px;\"></td></tr>";
		//console.log(rec_body);
		$('tbody').append(rec_body);
    }
  });
</script>
<br>
<a href="<?php echo"{$_SERVER['PHP_SELF']}?start={$prev}&size={$size}"?>">Back</a> --  <a href="<?php echo"{$_SERVER['PHP_SELF']}?start={$next}&size={$size}"?>">Forward</a>
</body>
</html>
