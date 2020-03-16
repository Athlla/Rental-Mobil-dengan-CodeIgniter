<div class="container">
  <div class="row mt-3">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">
          <h4 class="box-title">Tambah Data Mobil</h4>
        </div>
        <div class="card-body">
          <div class="box box-primary">
            <?php echo form_open('transaksi/add'); ?>
              <div class="box-body">
                <?php if(validation_errors() != false) { ?>
                  <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <?php echo validation_errors(); ?>
                </div>
                <?php } ?>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Tanggal Sewa</label>
                    <input type="date" name="tglsewa" id="datepicker" class="form-control" placeholder="Tanggal Sewa" 
                    value="<?php echo set_value('tglsewa'); ?>" data-date-format="yyyy-mm-dd" />
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Nama Pelanggan</label>
                    <input type="text" name="namapelanggan" id="namapelanggan" class="form-control" placeholder="Nama Pelanggan" 
                    value="<?php echo set_value('namapelanggan'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">No. KTP</label>
                    <input type="number" name="noktp" id="noktp" class="form-control" placeholder="No. KTP" 
                    value="<?php echo set_value('noktp'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">No. HP</label>
                    <input type="number" name="nohp" id="nohp" class="form-control" placeholder="No. HP" 
                    value="<?php echo set_value('nohp'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <div class="nk-int-st">
                    <label for="merk">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" 
                    value="<?php echo set_value('alamat'); ?>">
                  </div>
                </div>
                <div class="form-group">
                  <label>Type Mobil</label>
                  <select class="form-control select2" name="idmobil" id="idmobil" style="width: 100%;">
                  <option value="" selected="selected">--- Pilih</option>
                    <?php
                    $no = 1;
                    foreach($mobil as $row) {
                    ?> 
                      <option value="<?php echo $row->idmobil; ?>"><?php echo $row->type; ?></option>
                    <?php
                    $no++; }
                    ?> 
                  </select>
                </div>
                <div class="form-group">
                  <label>Supir</label>
                  <select class="form-control select2" name="idsupir" id="idsupir" style="width: 100%;">
                  <option value="" selected="selected">--- Pilih</option>
                  <option value="0">Lepas Kunci</option>
                    <?php
                    $no = 1;
                    foreach($supir as $row) {
                    ?> 
                      <option value="<?php echo $row->idsupir; ?>"><?php echo $row->namasupir; ?></option>
                    <?php
                    $no++; }
                    ?> 
                  </select>
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