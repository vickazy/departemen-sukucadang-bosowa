
<!-- Modal -->
<div class="modal fade" id="modalNewOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?=$detail->nama_barang;?></h4>
      </div>
      <div class="modal-body">
      <div class="row">
        <div class="col-md-4">
          <?php if($detail->gambar == NULL): ?>
              <img src="<?=base_url();?>app-assets/images/no-picture.jpg" style="width: 80%;border:solid 1px" alt="" />
          <?php else: ?>
                <img src="<?=base_url();?>app-uploads/<?=$detail->gambar;?>" style="width: 80%;border:solid 1px" alt="" />
          <?php endif;?>
        </div>
        <div class="col-md-8">
        <?=$detail->deskripsi;?>

        <br>
        <br>
        Nomor Part: <?=$detail->no_part;?><br>
        Nomor Rangka: <?=$detail->no_rangka;?><br>
        Stok: <?=$detail->stok;?><br>
        Harga: <?=$detail->harga;?><br>

        </div>
      </div>
        
      </div>
      <div class="modal-footer">
        <a class="btn btn-success" href="<?=base_url();?>home/pesan/?id_sukucadang=<?=$detail->id_sukucadang;?>">Pesan Sekarang</a>
        
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function(){
    $("#modalNewOrder").modal('show');

    $('#customSize').click(function(){
        var type = $('.ukuran-form').attr('data-type');
        changeSize(type);
    })

    function changeSize(type)
    {
      if(type=='select'){
        $('.ukuran').html('<input type="text" class="form-control" name="ukuran" data-type="textbox" placeholder="Masukan Ukuran" value="">');
      }else {
        $('.ukuran').html('<select name="ukuran" class="form-control ukuran-form" data-type="select"><option>small</option><option>medium</option><option>large</option></select>');
      }
    }
  });
</script>