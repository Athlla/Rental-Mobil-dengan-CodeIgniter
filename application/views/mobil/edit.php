<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="box-title">Edit Data Mobil <strong><?php echo $edit->type; ?></strong></h4>
        </div>
        <div class="card-body">
          <div class="box box-primary">
              <?php echo form_open_multipart('mobil/edit'); ?>
              <input type="hidden" name="id" value="<?php echo $edit->idmobil; ?>">
              <div class="box-body">
                <?php if(validation_errors() != false) : ?>
                  <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?= validation_errors(); ?>
                  </div>
                <?php endif; ?>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Type Mobil</label>
                    <input type="text" name="type" id="type" class="form-control" placeholder="Type Mobil" value="<?php echo $edit->type; ?>">
                  </div>
                </div>
                <div class="form-group">
                <label>Merk Mobil</label>
                <option value="" selected="selected"></option>
                <select class="form-control select2" name="idmerk" id="idmerk" style="width: 100%;">
                  <?php $no = 1; ?>
                  <?php foreach($list as $row) : ?> 
                    <option value="<?= $row->idmerk; ?>" <?php if($edit->idmerk == $row->idmerk) { ?>selected="selected"<?php } ?> ><?php echo $row->namamerk; ?></option>
                  <?php $no++; ?>
                  <?php endforeach; ?> 
                </select>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                    <label for="merk">Tahun Mobil</label>
                    <input type="text" name="tahun" id="tahun" class="form-control" placeholder="Tahun Mobil" 
                    value="<?php echo $edit->tahunproduksi; ?>">
                  </div>
                </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">No. Plat Mobil</label>
                  <input type="text" name="plat" id="plat" class="form-control" placeholder="No. Plat Mobil" value="<?php echo $edit->platnomer; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Jumlah Kursi</label>
                  <input type="text" name="kursi" id="kursi" class="form-control" placeholder="Jumlah Kursi" value="<?php echo $edit->kursi; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Tarif Sewa /Jam</label>
                  <input type="text" name="tarif" id="tarif" class="form-control" placeholder="Tarif Sewa /Jam" value="<?php echo $edit->tarif; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">Tarif Overtime /Jam</label>
                  <input type="text" name="lembur" id="lembur" class="form-control" placeholder="Tarif Overtime /Jam" value="<?php echo $edit->lembur; ?>">
                </div>
              </div>
              <div class="form-group">
                <div class="nk-int-st">
                  <label for="merk">No. Rangka Mobil</label>
                  <input type="text" name="rangka" id="rangka" class="form-control" placeholder="No. Rangka Mobil" value="<?php echo $edit->norangka; ?>">
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