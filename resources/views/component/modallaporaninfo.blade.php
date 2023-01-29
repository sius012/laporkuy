<div class="modal fade" id="modal-laporan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
    data-bs-focus="false">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Laporan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="containers">
                    <div class="row">
                        <div class="col-4">
                            <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-inner img-prev-cont my-auto">

                                </div>
                                <button class="carousel-control-prev" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button"
                                    data-bs-target="#carouselExampleControls" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                        <div class="col-8">
                            <table class="table">
                                <tr>
                                    <th>Judul Laporan</th>
                                    <td>
                                        <p class="modal-judul-laporan"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Tanggal</th>
                                    <td>
                                        <p class="modal-tanggal-laporan"></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>
                                        @include("component.status2")
                                    </td>
                                </tr>
                            </table>
                            <div class="container ">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg1"><b> Keterangan</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg2"><b> Keterangan Admin</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg3"><b>Petugas</b></a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link p-2 tab-open" aria-current="page" href="#"
                                            data-target="#tab-pg4"><b>Log</b></a>
                                    </li>
                                </ul>
                                <div class="cont-detail">
                                    <div class="container tab-cont" style="height: 200px" id="tab-pg1">
                                        <p></p>
                                    </div>
                                    <div class="container tab-cont" style="height: 200px" id="tab-pg2">
                                        <p></p>
                                    </div>
                                    <div class="container tab-cont" style="height: 200px; " id="tab-pg3">
                                        <ul class="list-group list-petugas  m-3">
                                            <li class="list-group-item">An item</li>

                                        </ul>
                                    </div>
                                    <div class="container tab-cont" id="tab-pg4" style="height: 200px">
                                        <ul class="list-group list-log  m-3"
                                            style="overflow-y: scroll !important;height: 200px">
                                            <li class="list-group-item">An item</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>