<center class="row page-content" style="padding-top: 20px">
    <h1>Daftar Suku Cadang</h1>
    <?php
    if($sukucadang != ""):
    foreach($sukucadang as $row):?>
    <a href="?view=<?=$row->id_sukucadang;?>">
    <div class="col-md-4">
        <div class="panel panel-default">
          <div class="panel-body">
            <?php if($row->gambar == NULL): ?>
              <img src="<?=base_url();?>app-assets/images/no-picture.jpg" style="width: 80%;border:solid 1px" alt="" />
          <?php else: ?>
                <img src="<?=base_url();?>app-uploads/<?=$row->gambar;?>" style="width: 80%;border:solid 1px" alt="" />
          <?php endif;?>
          </div>
          <div class="panel-heading"><?=$row->nama_barang;?></div>
        </div>
    </div>
    </a>
<?php endforeach; else:?>
Tidak ada data.
<?php endif;?>
</center>