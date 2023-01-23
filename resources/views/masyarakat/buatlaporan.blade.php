<div class="mb-3">
    <label for="recipient-name" class="col-form-label">Judul Laporan</label>
    <input required type="text" class="form-control" id="recipient-name" name="judul_laporan">
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Keterangan:</label>
    <textarea class="form-control" id="message-text" name="keterangan"></textarea>
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Lokasi:</label>
    <input required type="text" name="lokasi" class="form-control">
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Lampiran:</label>
    <input required type="file" class="form-control img-inp" multiple accept=".jpg"
        name='lampiran[]'>
</div>
<div class="mb-3">
    <label for="message-text" class="col-form-label">Tanggal:</label>
    <input required type="date" class="form-control" name='tanggal'>
</div>