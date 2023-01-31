<script>
function getroledata(element) {
    $(document).ready(function() {
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: "/user/getroles",
            type: "post",
            dataType: "json",
            success: function(data) {

                let option = data.map(function(e) {
                    return `<option value="${e["name"]}">${e["name"]}</option>`
                });


                $(element).html(option);
            },
            error: function(err) {
                alert(err.responseText);
            }
        })
    });
}

getroledata("#rolepengguna");
</script>

<!-- Modal -->
<div class="modal fade" id="tambah-role-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Buat Role</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action='{{ url("/admin/tambahrole") }}' method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="namapengguna" class="form-label">Role</label>
                        <input type="text" class="form-control" id="namarole" aria-describedby="emailHelp"
                            name="name">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Buat Role</button>
                </div>
            </form>
        </div>
    </div>
</div>