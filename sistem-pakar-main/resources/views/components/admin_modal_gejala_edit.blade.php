<!-- Tombol Tambah Gejala -->
<div class="d-flex justify-content-end mb-3">
  <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#storeModal">
    <i class="fa fa-plus"></i> Tambah Gejala
  </button>
</div>

<!-- Modal Edit Gejala -->
<div class="modal fade modal-fullscreen-md-down" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Ubah Gejala</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        {{-- form --}}
        <form id="edit-gejala" action="" method="post">
          @method("put")
          @csrf
          <div class="input-form d-flex">
            <input type="hidden" name="id" id="edit-id_gejala">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="edit-kode-gejala" name="kode_gejala" readonly>
              <label for="edit-kode-gejala">Kode Gejala</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="edit-gejala" name="gejala">
              <label for="edit-gejala">Gejala</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Ubah</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
      </div>
    </div>
  </div>
</div>
{{-- end modal edit gejala --}}

{{-- modal tambah gejala --}}
<div class="modal fade modal-fullscreen-md-down" id="storeModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        {{-- form tambah --}}
        <form id="tambah-gejala" action="{{ route('gejala.store') }}" method="post">
          @csrf
          <div class="input-form d-flex">
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="tambah-kode-gejala" name="kode_gejala" required>
              <label for="tambah-kode-gejala">Kode Gejala</label>
            </div>
            <div class="form-floating mb-3 p-2 mx-2">
              <input type="text" class="form-control" id="tambah-gejala-input" name="gejala" required>
              <label for="tambah-gejala-input">Gejala</label>
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
{{-- end modal tambah gejala --}}

<script>
  function updateInput(idGejala, kode, gejala){
    document.getElementById("edit-kode-gejala").value = kode;
    document.getElementById("edit-gejala").value = gejala;
    document.getElementById("edit-id_gejala").value = idGejala;
  }

  function actionUbahGejala(params) {
    const formGejala = document.getElementById('edit-gejala');
    formGejala.setAttribute('action', params);
    formGejala.setAttribute('method', 'POST');
    console.log(formGejala);
  }

  // Reset form saat modal tambah dibuka
  const tambahModal = document.getElementById('storeModal');
  tambahModal.addEventListener('show.bs.modal', function () {
    document.getElementById("tambah-kode-gejala").value = '';
    document.getElementById("tambah-gejala-input").value = '';
  });
</script>

