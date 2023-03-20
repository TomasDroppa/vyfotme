<form action="" method="post" id="createCenikModel" name="createCenikModel">
    <div class="modal-body">
        <div class="form-group">
            <label>Služba</label>
            <input type="text" name="sluzba" id="sluzba" class="form-control" placeholder="Služba">
            <p class ="sluzbaError"></p>
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="text" name="cena" id="cena" class="form-control" placeholder="Cena">
            <p class ="cenaError"></p>
        </div>

        <div class="form-group">    
            <label>Délka focení</label>
            <input type="text" name="delka_foceni" id="delka_foceni" class="form-control" placeholder="Doba focení">
            <p class ="delka_foceniError"></p>
        </div>               
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
        <button type="submit" class="btn btn-primary">Uložit změny</button>
    </div>
</form>    