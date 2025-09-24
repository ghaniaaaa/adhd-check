<!-- Tombol Tambah Kecenderungan (di atas tabel) -->
<button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
  <i class="fa fa-plus-circle"></i> Tambah Kecenderungan
</button>

<!-- Modal Edit Kecenderungan -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Kecenderungan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form id="edit-kecenderungan" action="" method="post">
          @method("put")
          @csrf
          <div class="input-form d-flex">
              <input type="hidden" name="id" id="edit-id_kecenderungan">
              <div class="form-floating mb-3 p-2 mx-2">
                  <input type="text" class="form-control" id="edit-kode-kecenderungan" name="kode_kecenderungan" readonly>
                  <label for="edit-kode-kecenderungan">Kode Kecenderungan</label>
              </div>
              <div class="form-floating mb-3 p-2 mx-2">
                  <input type="text" class="form-control" id="edit-kecenderungan" name="kecenderungan_adhd">
                  <label for="edit-kecenderungan">Keterangan</label>
              </div>
          </div>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
{{-- end modal edit kecenderungan --}}

<!-- Modal Tambah Kecenderungan -->
<div class="modal fade modal-fullscreen-md-down" id="modalTambah" tabindex="-1" aria-labelledby="modalTambahLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form action="{{ route('kecenderungan.store') }}" method="POST">
      @csrf
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="modalTambahLabel">Tambah Kecenderungan</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
        </div>
        <div class="modal-body">
          <div class="input-form d-flex">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="kode_kecenderungan" name="kode_kecenderungan" placeholder="Kode Kecenderungan" required>
              <label for="kode_kecenderungan">Kode Kecenderungan</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="tingkat_kecenderungan" name="kecenderungan_adhd" placeholder="Keterangan" required>
              <label for="tingkat_kecenderungan">Keterangan</label>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>
{{-- end modal tambah kecenderungan --}}

<!-- SCRIPT -->
<script>
  // Fungsi untuk modal edit
  function updateInput(id, kode, keterangan){
    document.getElementById("edit-id_kecenderungan").value = id;
    document.getElementById("edit-kode-kecenderungan").value = kode;
    document.getElementById("edit-kecenderungan").value = keterangan;
  }

  function actionUbahKecenderungan(url) {
    const form = document.getElementById('edit-kecenderungan');
    form.setAttribute('action', url);
    form.setAttribute('method', 'POST');
  }

  // Reset form tambah saat modal dibuka
  const modalTambah = document.getElementById('modalTambah');
  modalTambah.addEventListener('show.bs.modal', function () {
    document.getElementById("kode_kecenderungan").value = '';
    document.getElementById("tingkat_kecenderungan").value = '';
  });
</script>
