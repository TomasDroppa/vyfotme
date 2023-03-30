<form action="" method="post" id="createCenikModel" name="createCenikModel">
    <div class="modal-body">
        <div class="form-group">
            <label>Služba</label>
            <input type="text" name="service" id="service" class="form-control" placeholder="Služba">
            <p class ="serviceError"></p>
        </div>

        <div class="form-group">
            <label>Cena</label>
            <input type="text" name="price" id="price" class="form-control" placeholder="Cena">
            <p class ="priceError"></p>
        </div>

        <div class="form-group">    
            <label>Délka focení</label>
            <input type="text" name="photography_length" id="photography_length" class="form-control" placeholder="Doba focení">
            <p class ="photography_lengthError"></p>
        </div>               
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zavřít</button>
        <button type="submit" class="btn btn-primary">Uložit změny</button>
    </div>
</form>    