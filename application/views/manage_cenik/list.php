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
					<li class="nav-item ">
						<a class="nav-link" href="http://localhost/vyfotme/manage_gallery">Administrace galerie</a>
					</li>
					<li class="nav-item active">
						<a class="nav-link" href="http://localhost/vyfotme/manage_cenik">Administrace ceníku</a>
					</li>

				</ul>
			</div>
		</nav>

    <div class="container">
        <div class="box1">
            <h2>Ceník</h2>
            <!---bootstrap modal-->
            <!---<button class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Přidej službu</button>---->
            <div class= "text-right">
              <a href="javascript:void(0);" onclick="showModal();" class="btn btn-primary">Vytvoř</a>
          
          </div>
        <table class="table table-hover table-bordered table-striped" id="cenikModelList">
            <tbody>
                <tr>
                    <th>ID</th>
                    <th>Služba</th>
                    <th>Cena</th>
                    <th>Délka focení</th>
                    <th>Upravit</th>
                    <th>Smazat</th>
                </tr>
            
            
              
                  <?php if(!empty($rows)){?>
                    <?php foreach($rows as $row){
                      $data['row'] = $row;
                      $this->load->view('manage_cenik/cenik_row',$data);

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
   
    <!-- Modal -->
       
      <div class="modal fade" id="createCenik" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="title">Vytvořit novou službu</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div id="response">

                </div> 
             </div>
          </div>
      </div>

      <div class="modal fade" id="ajaxResponseModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Alert</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                  <div class="modal-body">
                                  
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
                    </div>
                
            </div>
        </div>
      </div>

      <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Potvrzení</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                  <div class="modal-body">
                                  
                  </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
                        <button type="button" class="btn btn-danger" onclick="deleteNow();">Ano</button>

                    </div>
                
            </div>
        </div>
      </div>
      

    <script type="text/javascript">

        function showModal() {
          $("#createCenik").modal("show");
          $("#createCenik #title").html('Create');

          $.ajax({

            url: '<?php echo base_url().'index.php/Manage_cenik/showCreateForm'?>',
            type: 'POST',
            data:{},
            dataType: 'json',
            success: function(response){
              $("#response").html(response["html"]);

            }

          })
        }


        $("body").on("submit", "#createCenikModel", function(e){

          e.preventDefault();
          

          $.ajax({

            url: '<?php echo base_url().'index.php/Manage_cenik/saveModel'?>',
            type: 'POST',
            data:$(this).serializeArray(),
            dataType: 'json',
            success : function(response){
             
                if(response['status'] == 0) {
                  if(response["service"] != "") {
                    $(".serviceError").html(response["service"]).addClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#service").addClass('is-invalid');
                  } else {
                    $(".serviceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#service").removeClass('is-invalid');
                  }
                

                
                  if(response["price"] != "") {
                    $(".priceError").html(response["price"]).addClass('invalid-feedback d-block');
                    $("#price").addClass('is-invalid');
                  } else {
                    $(".priceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#price").removeClass('is-invalid');
                  }
                
                
                  if(response["photography_length"] != "") {
                    $(".photography_lengthError").html(response["photography_length"]).addClass('invalid-feedback d-block');
                    $("#photography_length").addClass('is-invalid');
                  } else {
                    $(".photography_lengthError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#photography_length").removeClass('is-invalid');
                  }
                } else {




                  $("#createCenik").modal("hide");
                  $("#ajaxResponseModal .modal-body").html(response["message"]);
                  $("#ajaxResponseModal").modal("show");


                  $(".serviceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#service").removeClass('is-invalid');

                  $(".priceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#price").removeClass('is-invalid');

                  $(".photography_lengthError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#photography_length").removeClass('is-invalid');
               
                  $("#cenikModelList").append(response["row"]);
               
               
                }

              
              }

          });
       
        });
       
        function showEditForm(id) {
          
          $("#createCenik .modal-title").html('Edit');

          $.ajax({

            url: '<?php echo base_url().'index.php/Manage_cenik/getCenikModel/'?>'+id,
            type: 'POST',
            dataType: 'json',
            success : function(response){
                $("#createCenik #response").html(response["html"]);
                $("#createCenik").modal('show');
            
              }

          });
        }
      
    

    //editCenikModel

    $("body").on("submit", "#editCenikModel", function(e){

    e.preventDefault();


    $.ajax({

      url: '<?php echo base_url().'index.php/Manage_cenik/updateModel'?>',
      type: 'POST',
      data:$(this).serializeArray(),
      dataType: 'json',
      success : function(response){
      
          if(response['status'] == 0) {
            
            if(response["service"] != "") {
                    $(".serviceError").html(response["service"]).addClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#service").addClass('is-invalid');
                  } else {
                    $(".serviceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#service").removeClass('is-invalid');
                  }
                

                
                  if(response["price"] != "") {
                    $(".priceError").html(response["price"]).addClass('invalid-feedback d-block');
                    $("#price").addClass('is-invalid');
                  } else {
                    $(".priceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#price").removeClass('is-invalid');
                  }
                
                
                  if(response["photography_length"] != "") {
                    $(".photography_lengthError").html(response["photography_length"]).addClass('invalid-feedback d-block');
                    $("#photography_length").addClass('is-invalid');
                  } else {
                    $(".photography_lengthError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                    $("#photography_length").removeClass('is-invalid');
                  }

            } else {

                  $("#createCenik").modal("hide");
                  $("#ajaxResponseModal .modal-body").html(response["message"]);
                  $("#ajaxResponseModal").modal("show");


                  $(".serviceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#service").removeClass('is-invalid');

                  $(".priceError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#price").removeClass('is-invalid');

                  $(".photography_lengthError").html("").removeClass('invalid-feedback d-block'); //d-block zabarví to na červeno
                  $("#photography_length").removeClass('is-invalid');
               
                   var id = response["row"]["id"];
                   $("#row-"+id+" .modelService").html(response["row"]["service"]);
                   $("#row-"+id+" .modelPrice").html(response["row"]["price"]);
                   $("#row-"+id+" .modelPhotography_length").html(response["row"]["photography_length"]);

            }
        
        }

    });

   });

    function confirmDeleteModel(id) {
      $("#deleteModal").modal("show");
      $("#deleteModal .modal-body").html("Opravdu to chceš smazat #"+id+ "?");
      $("#deleteModal").data("id",id);
    }

    function deleteNow() {
      var id = $("#deleteModal").data('id');
      

      $.ajax({

        url: '<?php echo base_url().'index.php/Manage_cenik/deleteModel/'?>'+id,
        type: 'POST',
        data:$(this).serializeArray(),
        dataType: 'json',
        success : function(response){

            if(response['status'] == 1) {
              $("#deleteModal").modal("hide");
              $("#ajaxResponseModal .modal-body").html(response["msg"]);
              $("#ajaxResponseModal").modal("show");
              $("#row-"+id).remove();
            } else {
              $("#deleteModal").modal("hide");
              $("#ajaxResponseModal .modal-body").html(response["msg"]);
              $("#ajaxResponseModal").modal("show");
            }

          }
        });
    
    
     }
      
      
    </script>  


    
</body>
</html>

