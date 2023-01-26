@extends("layouts.layout_user")
@section("title", "Laporan Saya")
@section("titletab", "Laporan Saya")
@section("content")
@push("scripts")
<script>
$(document).ready(function() {
    function loadTab(target = null) {
        var targetelm = target == null ? "keterangan-tab" : target;
        $(".tab-cont").each(function() {
            if ($(this).hasClass(targetelm) == false) {
                $(this).hide("fast");
            } else {
                $(this).show("fast");
            }
        });
    }

    loadTab();
    $(".button-tab").click(function() {

        loadTab($(this).attr("lk-data-target"));
    });

})
</script>


@endpush
<div class="dic mb-5"></div>
<div class="containers m-3">
    <div class="row">
        <div class="col-1"></div>
        <div class="col-7">
            @foreach($laporan as $lp)
              @include("component.laporan_comp")
            @endforeach
        </div>
        <div class="col-4">
</div>
    </div>

</div>



<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-body">
                <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="..." class="d-block w-100" alt="...">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection