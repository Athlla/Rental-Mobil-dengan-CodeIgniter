<div class="container">
  <div class="box mt-3">
    <div class="box-header">
      <h3 class="box-title">Data Mobil</h3>
    </div>
    <div class="box-body mt-3">
      <?php if($this->session->flashdata('info')) { ?>
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <?php echo $this->session->flashdata('info'); ?>
        </div>
      <?php } ?>
      <table id="example1" class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>No.</th>
            <th>Merk</th>
            <th>Type</th>
            <th>Plat Nomer</th>
            <th>Tarif /jam</th>
            <th>Overtime /jam</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach($mobil as $row) :?>         
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $row->namamerk; ?></td>
              <td><?php echo $row->type; ?></td>
              <td><?php echo $row->platnomer; ?></td>
              <td><?php echo number_format($row->tarif); ?></td>
              <td><?php echo number_format($row->lembur); ?></td>
              <td><button type="submit" class="btn btn-primary" onclick="location.href='<?=base_url()?>mobil/edit/<?php echo $row->idmobil; ?>'"><i class="fa fa-fw fa-edit"></i>Edit</button>
                  <button type="submit" class="btn btn-danger" onclick="if(confirm('Apakah anda yakin akan menghapus <?php echo $row->type; ?>?')) window.location.href='<?=base_url()?>mobil/hapus/<?php echo $row->idmobil; ?>';"><i class="fa fa-fw fa-trash-o"></i>Delete</button></td>
            </tr>
          <?php $no++; ?>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>