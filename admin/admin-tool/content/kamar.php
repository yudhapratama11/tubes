<html>
  <head>
    <title>Pemesanan Kamar</title>

  </head>
  <script>
    $(document).ready(function(){
        $("#myBt").click(function(){
            $("#myModal").modal();
        });
    });
    </script>
    <script>
    $(document).ready(function(){
        $("#myBt1").click(function(){
            $("#myModal1").modal();
        });
    });
      </script>

    <div class="col-md-10" style="padding:0px">
      <ol class="breadcrumb" style="margin:0;border-radius:0;">
         <li><a href="index.php">Home</a></li>
         <li class="active">Data User</li>
      </ol>
   </div>
   <div class="col-md-10" style="min-height:600px">
         <div class="col-md-12" style="padding:10px; padding-left:0;padding-right:0;">
            <button class="btn btn-info" id="myBt">Tambah</button>
         </div>

         <div class="modal fade" id="myModal1" role="dialog">
         <div class="modal-dialog">

           <!-- Modal content(untuk Tambah)-->
         <div class="modal-content">
           <form action="content/input-kamar.php" method="post" enctype="multipart/form-data">
               <div class="modal-header" style="padding:30px 50px;">
                   <button type="button" class="close" data-dismiss="modal">&times;</button>
                   <h4><center>Edit Kamar</center></h4>
               </div>
               <div class="modal-body" style="padding:40px 50px;">
                       <div class="form-group">
                         <label for="usrname">Nama Kamar</label>
                         <input type="text" name="namakamar" class="form-control" id="namakamar" value=""/>
                       </div>
                       <div class="form-group">
                         <label for="psw">Tipe Kamar</label>
                         <input type="text" class="form-control" name="tipekamar" id="tipekamar" placeholder="cth. Superior"/>
                       </div>
                       <div class="form-group">
                         <label for="usrname">Gambar</label>
                         <input type="file" name="berkas" />
                       </div>
                       <div class="form-group">
                         <label for="psw">Deskirpsi</label>
                         <input type="text" class="form-control" name="deskripsi" id="tipekamar" placeholder="cth. Superior"/>
                       </div>
                       <div class="form-group">
                         <label for="psw">Harga</label>
                         <input type="text" class="form-control" name="harga" id="tipekamar" placeholder="cth. Superior"/>
                       </div>
                       <br>
                       <input type="submit" name="upload" value="upload" />
               </div>
               <div class="modal-footer">
                   <!-- <button class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> -->
               </div>
             </form>
           </div>

         </div>
         </div>
         <!--Modal-->
        <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

          <!-- Modal content(untuk Tambah)-->
        <div class="modal-content">
          <form action="content/input-kamar.php" method="post" enctype="multipart/form-data">
              <div class="modal-header" style="padding:30px 50px;">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4><center>Tambah Kamar</center></h4>
              </div>
              <div class="modal-body" style="padding:40px 50px;">
                      <div class="form-group">
                        <label for="usrname">Nama Kamar</label>
                        <input type="text" name="namakamar" class="form-control" id="namakamar" placeholder="cth. Sriwijaya"/>
                      </div>
                      <div class="form-group">
                        <label for="psw">Tipe Kamar</label>
                        <input type="text" class="form-control" name="tipekamar" id="tipekamar" placeholder="cth. Superior"/>
                      </div>
                      <div class="form-group">
                        <label for="usrname">Gambar</label>
                        <input type="file" name="berkas" />
                      </div>
                      <div class="form-group">
                        <label for="psw">Deskirpsi</label>
                        <input type="text" class="form-control" name="deskripsi" id="tipekamar" placeholder="cth. Superior"/>
                      </div>
                      <div class="form-group">
                        <label for="psw">Harga</label>
                        <input type="text" class="form-control" name="harga" id="tipekamar" placeholder="cth. Superior"/>
                      </div>
                      <br>
                      <input type="submit" name="upload" value="upload" />
              </div>
              <div class="modal-footer">
                  <!-- <button class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> -->
              </div>
            </form>
          </div>

        </div>
        </div>
        <!--end modal-->

            <table class="table table-bordered">
               <tr>
                 <th class="info">No</th>
                  <th class="info">Nama Kamar</th>
                  <th class="info">Tipe Kamar</th>
                  <th class="info">Gambar</th>
                  <th class="info">Deskripsi</th>
                  <th class="info">Harga</th>
                  <th class="info">Status</th>
                  <th class="info" colspan="2">Action</th>
               </tr>

               <?php
                include('../../koneksi.php');
                $halaman = 5;
                $pages = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
                $mulai = ($pages>1) ? ($pages * $halaman) - $halaman : 0;
                $sql = "SELECT * FROM kamar LIMIT $mulai, $halaman";
                $result1 = mysqli_query($conn,"SELECT * FROM kamar");
                $no = $mulai + 1;
                if($result=mysqli_query($conn,$sql))
                {
                  $total = mysqli_num_rows($result1);
                  $pages = ceil($total/$halaman);
                  if(mysqli_num_rows(mysqli_query($conn,$sql)) != 0)
                  {

                    while($data = mysqli_fetch_assoc($result)){
                        echo '<tr>';
                            echo '<td>'.$no++.'</td>';
                            echo '<td style="display:none;" class="idkamarz" width="12%">'.$data['id_kamar'].'</td>';
                            echo '<td class="namakamar" width="12%">'.$data['nama_kamar'].'</td>';
                            echo '<td class="tipekamar" width="12%">'.$data['tipe_kamar'].'</td>';
                            echo '<td class="gambarkamar" width="15%"><center><img src="../admin-tool/image/'.$data['gambar_kamar'].'" width="100%"></center></td>';
                            echo '<td class="deskripsi">'.$data['deskripsi'].'</td>';
                            echo '<td class="hargakamar" width="15%">Rp. '.$data['harga_kamar'].'</td>';
                            if($data['is_deleted'] == 0)
                            {
                              echo '<td width="10%">Tersedia</td>';
                            }
                            else
                            {
                              echo '<td width="10%">Tidak Tersedia</td>';
                            }
                            echo '<td style="display:none;" class="hargakamartemp" width="15%">'.$data['harga_kamar'].'</td>';
                            if($data['is_deleted'] == 0)
                            {
                              echo '<td width="13%"><button class="btn btn-warning edit">Edit</button> <a class="btn btn-danger" href="content/empty.php?id='.$data['id_kamar'].'" onclick="return confirm(\'Yakin?\')">Empty</a></td>';
                            }
                            else
                            {
                              echo '<td width="13%"><button class="btn btn-warning edit">Edit</button> <a class="btn btn-success" href="content/instock.php?id='.$data['id_kamar'].'" onclick="return confirm(\'Yakin?\')">Stock</a></td>';
                            }
                            
                          echo '</tr>';
                    }
                  }
                  else
                  {
                    echo '<tr><td colspan="6">Tidak ada data!</td><tr>';
                  }
                }
              ?>

            </table>

          <div class="col-md-12">
             <nav align="center">
               <ul class="pagination">
                 <?php for ($i=1; $i<=$pages ; $i++){ ?>
                  <li><a href="?kamar&halaman=<?php echo $i; ?>"><?php echo $i; ?></a></li>

                  <?php } ?>
               </ul>
             </nav>
          </div>
   </div>

   <div class="modal fade" id="myModalEdit" role="dialog">
    <div class="modal-dialog">
      <!-- Modal content(untuk Tambah)-->
    <div class="modal-content">
      <form action="content/edit-kamar.php" method="post" enctype="multipart/form-data">
          <div class="modal-header" style="padding:30px 50px;">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4><center>Edit User</center></h4>
          </div>
          <div class="modal-body" style="padding:40px 50px;">
          
                  <div class="form-group">
                    <label for="usrname">Nama Kamar</label>
                    <input type="hidden" name="idkamarz" id="idkamarz" class="form-control" id="id"/>
                    <input type="text" name="namakamar" class="form-control" id="namalengkap"/>
                  </div>
                  <div class="form-group">
                    <label for="usrname">Tipe Kamar</label>
                    <input type="text" class="form-control" name="tipekamar" id="username" placeholder="cth. Superior"/>
                  </div>
                  <div class="form-group">
                    <label for="usrname">Gambar Kamar (Kosongkan Jika tidak mau mengganti)</label>
                    <input type="file" class="form-control" name="berkas" id="gambarkamar" placeholder="cth. Superior"/>
                  </div>
                  <div class="form-group">
                    <label for="usrname">Deksripsi</label>
                    <input type="text" class="form-control" name="deskripsi" id="deskripsi" placeholder="cth. Superior"/>
                  </div>
                  <div class="form-group">
                    <label for="usrname">Harga</label>
                    <input type="text" class="form-control" name="hargakamar" id="hargakamar" placeholder="cth. Superior"/>
                  </div>
                  <br>
                  <input type="submit" name="upload" value="Edit" />
          </div>
          <div class="modal-footer">
              <!-- <button class="btn btn-danger btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button> -->
          </div>
        </form>
      </div>

    </div>
    </div>
<script>
    $(function(){
        $('.edit').click(function(e) {
            
            e.preventDefault();
            $("#myModalEdit").modal();
            $('#idkamarz').val($(this).closest('tr').find('.idkamarz').text());
            $('#namalengkap').val($(this).closest('tr').find('.namakamar').text());
            $('#username').val($(this).closest('tr').find('.tipekamar').text());
            $('#deskripsi').val($(this).closest('tr').find('.deskripsi').text());
            $('#hargakamar').val($(this).closest('tr').find('.hargakamartemp').text());
        });
    });
</script>
