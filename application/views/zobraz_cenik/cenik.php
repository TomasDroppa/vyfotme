<!doctype html>
<html lang="en">
  <head>
    <title>Cenik</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    
    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>/assets/css/bootstrap.min.css">
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>/assets/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/cenik.css'); ?>">
  
  </head>
  <body>

  <a href="http://localhost/vyfotme/gallery"><h1>Domů</h1></a>

    <div class="container">
        <div class="box1">
            <h2>Služby</h2>
            
           
        <table class="table table-hover table-bordered table-striped" id="cenikModelList">
            <tbody>
                <tr>
                 
                    <th>Služba</th>
                    <th>Cena</th>
                    <th>Délka focení</th>
               
                </tr>
            
            
              
                  <?php if(!empty($rows)){?>
                    <?php foreach($rows as $row){
                      $data['row'] = $row;
                      $this->load->view('zobraz_cenik/cenik_row',$data);

                   } 
                  ?>
                  <?php } else {?>
                  <tr>
                    <td>Záznamy nebyly nalezeny</td>
                  </tr>

                  <?php } ?>
                    
            </tbody>
        </table>
    </div>
   
    

    
</body>
</html>

