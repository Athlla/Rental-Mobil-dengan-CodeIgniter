<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="box-title">Tambah Data Mobil</h4>
        </div>
        <div class="card-body">
          <div class="box box-primary">
            <?php echo form_open_multipart('merk/edit'); ?>
            <input type="hidden" name="id" value="<?php echo $edit->idmerk; ?>">
              <div class="box-body">  
                <?php if(validation_errors() != false) : ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Merk Mobil</label>
                    <input type="text" name="merk" id="merk" class="form-control" id="merk" placeholder="Merk Mobil" value="<?= $edit->namamerk; ?>">
                  </div>
                </div>
              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Update</button>
              </div>
            <?php echo form_close(); ?>
          </div>       
        </div>
      </div>
    </div>
  </div>
</div>