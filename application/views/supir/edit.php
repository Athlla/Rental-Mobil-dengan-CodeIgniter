<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="box-title">Tambah Data Supir</h4>
        </div>
        <div class="card-body">
          <div class="box box-primary">
            <?php echo form_open_multipart('supir/edit'); ?>
            <input type="hidden" name="id" value="<?php echo $edit->idsupir; ?>">
              <div class="box-body">
                <?php if(validation_errors() != false) { ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Nama Supir</label>
                  <input type="text" name="namasupir" id="namasupir" class="form-control" placeholder="Nama Supir" value="<?php echo $edit->namasupir; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Tanggal Lahir</label>
                  <input type="date" name="tgllahir" id="datepicker" class="form-control" placeholder="Tanggal Lahir" 
                  value="<?php echo $edit->tgllahir; ?>" data-date-format="yyyy-mm-dd">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Alamat</label>
                  <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" value="<?php echo $edit->alamat; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">No. KTP</label>
                  <input type="number" name="noktp" id="noktp" class="form-control" placeholder="No. KTP" value="<?php echo $edit->noktp; ?>">
                </div>
              </div>
              <div class="box-footer">
                <button type="button" class="btn btn-default" onclick="window.history.back()">Cancel</button>
                <button type="submit" class="btn btn-primary" name="submit" value="submit">Save</button>
              </div>
            <?php echo form_close(); ?>
          </div>       
        </div>
      </div>
    </div>
  </div>
</div>