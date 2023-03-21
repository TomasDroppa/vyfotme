<!doctype html>
<html lang="en">
  	<head>
		<title>Cenik</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery-3.6.4.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>
    
    
   

    	<link rel="stylesheet" href="<?php echo base_url('assets/css/galerie.css'); ?>">
	</head>
	<body>

		<nav class="navbar navbar-expand-lg navbar-light bg-light ">
			
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse justify-content-center" id="navbarNavDropdown">	
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/vyfotme/gallery">Hlavní stránka</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/vyfotme/bookingsystem/admin/">Administrace rezervací</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/vyfotme/manage_gallery">Administrace galerie</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://localhost/vyfotme/manage_cenik">Administrace ceníku</a>
					</li>

				</ul>
			</div>
		</nav>

		<div class="container">
			
			
			<!-- Display status message -->
			<?php if(!empty($success_msg)){ ?>
			<div class="col-xs-12">
				<div class="alert alert-success"><?php echo $success_msg; ?></div>
			</div>
			<?php }elseif(!empty($error_msg)){ ?>
			<div class="col-xs-12">
				<div class="alert alert-danger"><?php echo $error_msg; ?></div>
			</div>
			<?php } ?>
			
			<div class="row">
				<div class="col-md-18 head">
					<div class="nadpisy">
						<h5><?php echo $title; ?></h5>
					</div>
					<!-- Add link -->
					<div class="float-right">
						<a href="<?php echo base_url('manage_gallery/add'); ?>" class="btn btn-success"><i class="plus"></i>Nahrát fotky</a>
					</div>
				</div>
				
				<!-- Data list table --> 
				<table class="table table-striped table-bordered">
					<thead class="thead-dark">
						<tr>
							<th width="5%">Číslo</th>
							<th width="10%"></th>
							<th width="35%">Název</th>
							<th width="19%">Vytvořeno</th>
							<th width="8%">Status</th>
							<th width="23%">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php if(!empty($gallery)){ $i=0; 
							foreach($gallery as $row){ $i++;
								$image = !empty($row['file_name'])?'<img src="'.base_url().'uploads/images/'.$row['file_name'].'" alt="" />':'';
								$statusLink = ($row['status'] == 1)?site_url('manage_gallery/block/'.$row['id']):site_url('manage_gallery/unblock/'.$row['id']); 
								$statusTooltip = ($row['status'] == 1)?'Click to Inactive':'Click to Active'; 
						?>
						<tr>
							<td><?php echo $i; ?></td>
							<td><?php echo $image; ?></td>
							<td><?php echo $row['title']; ?></td>
							<td><?php echo $row['created']; ?></td>
							<td><a href="<?php echo $statusLink; ?>" title="<?php echo $statusTooltip; ?>"><span class="badge <?php echo ($row['status'] == 1)?'badge-success':'badge-danger'; ?>"><?php echo ($row['status'] == 1)?'Active':'Inactive'; ?></span></a></td>
							<td>
								<a href="<?php echo base_url('manage_gallery/view/'.$row['id']); ?>" class="btn btn-primary">Zobrazit</a>
								<a href="<?php echo base_url('manage_gallery/edit/'.$row['id']); ?>" class="btn btn-warning">Upravit</a>
								<a href="<?php echo base_url('manage_gallery/delete/'.$row['id']); ?>" class="btn btn-danger" onclick="return confirm('Opravdu chceš fotku smazat?')?true:false;">Smazat</a>
							</td>
						</tr>
						<?php } }else{ ?>
						<tr><td colspan="6">Nenalezeny žádné fotky...</td></tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>