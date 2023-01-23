
<script>
    function getroledata(element){
        $(document).ready(function(){
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/user/getroles",
                type: "post",
                dataType: "json",
                success: function(data){
                
                   let option = data.map(function(e){
                    return `<option value="${e["name"]}">${e["name"]}</option>`
                   });
                  

                   $(element).html(option);
                },error: function(err){
                    alert(err.responseText);
                }
            })
        });
    }

    getroledata("#rolepengguna");
   

</script>
  
  <!-- Modal -->
  <div class="modal fade" id="tambah-user-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Akun</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action='{{ url("/admin/tambahuser") }}' method="POST">
        @csrf
        <div class="modal-body">
            <div class="mb-3">
                <label for="namapengguna" class="form-label">Nama Pengguna</label>
                <input type="text" class="form-control" id="namapengguna" aria-describedby="emailHelp" name="name">
            </div>
            <div class="mb-3">
                <label for="emailpengguna" class="form-label">Email Pengguna</label>
                <input type="email" class="form-control" id="emailpengguna" aria-describedby="emailHelp" name="email">
            </div>
            <div class="mb-3">
                <label for="alamatpengguna" class="form-label">Alamat Pengguna</label>
                <input type="text" class="form-control" id="alamatpengguna" aria-describedby="emailHelp" name="alamat">
            </div>
            <div class="mb-3">
                <label for="passwordpengguna" class="form-label">Password Pengguna</label>
                <input type="password" class="form-control" id="passwordpengguna" aria-describedby="emailHelp" name="password">
            </div>
           
            <div class="mb-3">
                <label for="passwordpengguna" class="form-label">Role Pengguna</label>
                <select class="form-select" name="role" id="rolepengguna">
                    
                </select>
            </div>
            
            
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Tambah Pengguna</button>
        </div>
    </form>
      </div>
    </div>
  </div>