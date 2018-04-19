
<!-- Modal -->
<div class="modal fade" id="modalNewOrder" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
    
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Suku Cadang</h4>
      </div>
      <div class="modal-body">

      <?=form_open_multipart('dashboard/tambahSukucadang');?>
        <?php
            $error = $this->session->flashdata('error');
            if(isset($error)){
        ?>
            <div class="alert alert-danger"><?php echo $this->session->flashdata('error');?></div>
        <?php } ?>

         <div class="form-group">
            <label>Nama Barang:</label><br>
            <input name="nama_barang" class="form-control" />
        </div>  

        <div class="form-group">
            <label>No Part:</label><br>
            <input name="no_part" class="form-control" />
        </div>  

        <div class="form-group">
            <label>No Rangka:</label><br>
            <input name="no_rangka" class="form-control" />
        </div>  

        <div class="form-group">
            <label>Harga:</label><br>
            <input name="harga" class="form-control" />
        </div>  

        <div class="form-group">
            <label>Stok:</label><br>
            <input name="stok" class="form-control" />
        </div>  

        <div class="form-group">
            <label>Gambar<span style="color:red">*</span>:</label><br>
            <input type="file" class="form-control" name="gambar" value="">
        </div>

        <div class="form-group">
            <label>Deskripsi:</label><br>
            <textarea name="deskripsi" class="form-control"></textarea>
        </div>  

      <div class="form-group">
            <button class="btn btn-primary">Tambah</button>
      </div>
      </div>

  </form>
                   
      </div>
      <div class="modal-footer">
        
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