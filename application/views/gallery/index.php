


<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
      
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


<div class="container">
    <h2>Gallery Images</h2>
    <hr>
    <div class="head">
        <a href="<?php echo base_url('manage_gallery/'); ?>" class="glink">Manage</a>
    </div>
    <div class="gallery">
        <?php if(!empty($gallery)){ ?> 
        <?php 
            foreach($gallery as $row){ 
                $uploadDir = base_url().'uploads/images/'; 
                $imageURL = $uploadDir.$row["file_name"]; 
        ?>
        <div class="col-lg-3">
            <a href="<?php echo $imageURL; ?>" data-fancybox="gallery" data-caption="<?php echo $row["title"]; ?>" >
                <img src="<?php echo $imageURL; ?>" alt="" />
                <p><?php echo $row["title"]; ?></p>
            </a>
        </div>
        <?php } ?> 
        <?php }else{ ?>
            <div class="col-xs-12">
                <div class="alert alert-danger">No image(s) found...</div>
            </div>
        <?php } ?>
    </div>
</div>

<!-- Fancybox CSS library -->
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/fancybox/jquery.fancybox.css'); ?>">

<!-- Fancybox JS library -->
<script src="<?php echo base_url('assets/fancybox/jquery.fancybox.js'); ?>"></script>

<!-- Initialize fancybox -->
<script>
    $("[data-fancybox]").fancybox();
</script>


  </body>
</html>






