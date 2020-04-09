<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<?php


if(isset($data)){
foreach($data->result() as $row){
	echo '
	<div class="card border-info p-3 m-2 mb-3  main " style="background: #D0ECE7">
	<b>Title:'.$row->title.'</b>
	<br><br>
	<b>Class'.$row->class.'</b>
	<br><br>
	 <div class="modal-body">
	
	 <form method="post" action = "'.base_url('addsubquiz/store_a').'">

	<div class="form-group">
	 <input type="text" class="form-control col-6"  name="question" value="'.$row->question.' ">
	<br><br>
	</div>
	 
                        <textarea class="form-control"  name = "answer" placeholder="Enter your answer here!!" required aria-required="Eveter the Question" rows="3"></textarea>

	</div>
	 <div class="card-footer">
	<div class="form-group">
	<input type="hidden" name="hidden_id" value="'.$row->q_id.'"/>
	<input type="hidden" name="hidden_title" value="'.$row->title.'"/>
	<button type="submit" name="submit" value="Submit" class="btn btn-primary">Submit</button>
	</div>
	</div>
</form>

</div>
	';
}
}

?>




</body>
</html>