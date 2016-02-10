<html>
<head>
  <title>Profile Page</title>
  <style type="text/css">
  	.container , .header{
  		width: 500px;
  		background-color: #E6E6FA;
  	}
  	.header a{
  		margin-left: 450px;
  	}
  	.total {
  		border: 2px solid black;
  		width:250px;
  	}
  	.total h5 {
  		margin-left: 10px;
  	}
  	table {
  		border-collapse: collapse;
  	}
  	td {
  		border: 1px solid black;
  		padding:5px;
  	}
  	.welcome h1{
  		font-size: 28px;
  		color: 191970;
  	}
  </style>
</head>
<body>
	<div class="header">
		<a href="/users/logout">Logout</a>
	</divr>
	<div class="container">
  		<div class="top">
  			<div class="welcome">
				<h1>Welcome, <?= $this->session->userdata('name'); ?> !</h1>
<?php 	
				$pokeCount = 0;
				foreach ($pokes as $poke) {
					$pokeCount += $poke['poke_count'];
				}
?>			<h4>Number of people who poked you: <?= count($pokes) ?></h4>
			</div>
			<div class="total">
<?php 	
				$pokeCount = 0;
				foreach ($pokes as $poke) 
				{
					$pokeCount += $poke['poke_count'];
?>				<h5><?= $poke['name']; ?> poked you <?= $poke['poke_count']; ?> times.</h5>
<?php 
				}
?>
			</div>
  		</div>
  	</div>
	
  <div class="container">
				<h3>People you may want to poke:</h3>
				<table>
		      <thead>
		        <tr>
		          <th>Name</th>
		          <th>Alias</th>
		          <th>Email Address</th>
		          <th>Poke History</th>
		          <th>Action</th>
		        </tr>
		      </thead>
		      <tbody>
	 
<?php 			
						foreach ($users as $user) {
							$query = "SELECT pokes.poke_count FROM pokes where pokes.user_id = ?";
							$pokes = $this->db->query($query, $user['id'])->result_array();
							$pokeCount = 0;
							foreach ($pokes as $poke) 
							{
								$pokeCount += $poke['poke_count'];
							}
?>	     
<?php
					// foreach ($user as $user) {
					// 	$pokeCount=0;
					// 	foreach ($totals as $total) {
					// 		$pokeCount += $poke['poke_count'];
					// 	}
					// CAN'T PASS DATA QUERY INTO VIEW WITH CONTROLLER
?>
				<tr>
		          <td><?= $user['name']; ?></td>
		          <td><?= $user['alias']; ?></td>
		          <td><?= $user['email']; ?></td>
		          <td>Poked <?= $pokeCount ?> Time(s)</td>
		          <td>
		          	<form action="/users/pokeUser" method="POST">
		          		<input type="hidden" name="user_id" value="<?= $user['id']; ?>">
		          		<input type="hidden" name="poker_id" value="<?= $this->session->userdata('id'); ?>">
		          		<input type="submit" value="Poke">
		          	</form>
		          </td>
		        </tr>
<?php 			
							} 
?>

		      </tbody>
		    </table>			
  </div>
</body>
</html>