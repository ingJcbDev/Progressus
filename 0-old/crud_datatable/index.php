<html>
	<head>
		<title>Webslesson Demo - PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</title>

        <!-- bootstrap css-->
		<link rel="stylesheet" type="text/css" href="assets/bootstrap4/css/bootstrap.min.css"/>
		<link rel='stylesheet' href='assets/dataTablesUi/css/jquery-ui.css'/>
        <!-- bootstrap datatable css-->
        <link rel='stylesheet' href='assets/dataTablesUi/css/dataTables.jqueryui.min.css'/>
        <!-- style -->
        <link rel='stylesheet' href='assets/css/style.css'/>

        <!-- bootstrap js-->
		<script src="assets/bootstrap4/js/jquery-3.3.1.min.js"></script>
    	<script src="assets/bootstrap4/js/popper.min.js"></script>
    	<script src="assets/bootstrap4/js/bootstrap.min.js"></script>
        <!-- bootstrap datatable JS-->
		<script type='text/javascript' src='assets/dataTablesUi/js/jquery.dataTables.min.js'></script> 
    	<script type='text/javascript' src='assets/dataTablesUi/js/dataTables.jqueryui.min.js'></script> 		
    	<script type='text/javascript' src='assets/js/validar.js'></script>
		
	</head>

	<body>
		<div class="container box">
			<h1 align="center">PHP PDO Ajax CRUD with Data Tables and Bootstrap Modals</h1>
			<br />
			<div class="table-responsive">
				<br />
				<div align="right">
					<button type="button" id="add_button" data-toggle="modal" data-target="#userModal" class="btn btn-info btn-lg">Add</button>
				</div>
				<br /><br />
				<table id="user_data" class="table display">
					<thead>
						<tr>
							<th>idusuario</th>
							<th>nombre</th>
							<th>tipo_documento</th>
							<th>direccion</th>
							<th>telefono</th>
							<th>email</th>
							<th>cargo</th>
							<th>login</th>
							<th>condicion</th>
						</tr>
					</thead>
				</table>
				
			</div>
		</div>
	</body>

</html>