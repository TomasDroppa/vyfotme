<form action="" method="post" id="editCenikModel" name="editCenikModel">
        <input type="hidden" name="id" value="<?php echo $row['id']?>"> 
    <div class="modal-body">
        <div class="form-group">
            <label>Služba</label>
            <input type="text" name="sluzba" id="sluzba" value="<?php echo $row['sluzba']?>" class="form-control" placeholder="Služba">
            <p class ="sluzbaError"></p>
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="text" name="cena" id="cena" value="<?php echo $row['cena']?>" class="form-control" placeholder="Cena">
            <p class ="cenaError"></p>
        </div>

        <div class="form-group">    
            <label>Délka focení</label>
            <input type="text" name="delka_foceni" id="delka_foceni" value="<?php echo $row['delka_foceni']?>" class="form-control" placeholder="Doba focení">
            <p class ="delka_foceniError"></p>
        </div>               
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
        <button type="submit" class="btn btn-primary">Uložit změny</button>
    </div>
</form>    