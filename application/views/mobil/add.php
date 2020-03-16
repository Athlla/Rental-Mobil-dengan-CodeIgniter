<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="box-title">Tambah Data Mobil</h4>
        </div>
        <div class="card-body">
          <div class="box box-primary">
            <?php echo form_open_multipart('mobil/add'); ?>
              <div class="box-body">  
                <?php if(validation_errors() != false) : ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo validation_errors(); ?>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Type Mobil</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="Type Mobil">
                  </div>
                </div>
                <div class="form-group">
                  <label>Merk Mobil</label>
                  <select class="form-control select2" name="idmerk" id="idmerk" style="width: 100%;">
                  <?php foreach($list as $row) : ?> 
                    <option value="<?php echo $row->idmerk; ?>"><?php echo $row->namamerk; ?></option>
                  <?php endforeach;?> 
                  </select>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Tahun Mobil</label>
                    <input type="number" name="tahun" id="tahun" class="form-control" placeholder="Tahun Mobil">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">No. Plat Mobil</label>
                    <input type="text" name="plat" id="plat" class="form-control" placeholder="No. Plat Mobil">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Jumlah Kursi</label>
                    <input type="text" name="kursi" id="kursi" class="form-control" placeholder="Jumlah Kursi">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Tarif Sewa /Jam</label>
                    <input type="number" name="tarif" id="tarif" class="form-control" placeholder="Tarif Sewa /Jam">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Tarif Overtime /Jam</label>
                    <input type="number" name="lembur" id="lembur" class="form-control" placeholder="Tarif Overtime /Jam">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">No. Rangka Mobil</label>
                    <input type="text" name="rangka" id="rangka" class="form-control" placeholder="No. Rangka Mobil">
                  </div>
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