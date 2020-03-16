<div class="container">
  <div class="box mt-3">
    <div class="box-header">
      <h3 class="box-title">Data Merk Mobil</h3>
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
            <th>Nama Merk</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1; ?>
          <?php foreach($merk as $row) : ?>         
          <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $row->namamerk; ?></td>
            <td>
              <button type="submit" class="btn btn-primary" onclick="location.href='<?=base_url()?>merk/edit/<?php echo $row->idmerk; ?>'"><i class="fa fa-fw fa-edit"></i>Edit</button>
              <button type="submit" class="btn btn-danger" onclick="if(confirm('Apakah anda yakin akan menghapus <?php echo $row->namamerk; ?>?')) window.location.href='<?=base_url()?>merk/hapus/<?php echo $row->idmerk; ?>';"><i class="fa fa-fw fa-trash-o"></i>Delete</button>
            </td>
          </tr>
          <?php $no++; ?>
          <?php endforeach; ?> 
        </tbody>
      </table>
    </div>
</div>
</div>