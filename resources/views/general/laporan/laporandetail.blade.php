<script>
    $(document).ready(function(){
        $("a").closest(".laporan-row").click(function(){
            var element = $(this);
            $.ajax({
                url: "/getdetaillaporan",
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data:{
                id: $(this).attr("id_laporan"),
                },
                dataType:"json",
                type: "post",
                success: function(data){
                if(element.is("tr")){
                    
                }
                $("#detail-laporan").modal("show");
                },error: function(err){
                alert(err.responseText);
                }
            });
           }); 
    });
</script>

<div class="modal" tabindex="-1" id="detail-laporan">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Modal body text goes here.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>