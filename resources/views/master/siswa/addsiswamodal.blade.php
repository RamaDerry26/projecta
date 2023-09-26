<div class="modal fade" id="addsismodal" tabindex="-1" role="dialog" aria-labelledby="Add Siswa Modal"aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
                <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Siswa</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                    <div class="mb-3">
                        <label for="name">Nama</label>
                        <input class="form-control" id="name" name="name" type="text" placeholder="Nama" required>         
                    </div>
                    <div class="mb-3">
                        <label for="about">Tentang</label>
                        <input class="form-control" id="about" name="about" type="text" placeholder="Tentang" required>
                    </div>
                    <div class="mb-3">
                        <label for="photo" class="required" >
                            Profil :
                        </label>
                        <input type="file" id="image" class="form-control" name="photo" onchange="previewImage()" required>
                    </div>
                    <img class="img-preview" width="150px">

                  
            </div>

            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>

    function previewImage() {
    const image = document.querySelector('#image');
    const imgPreview = document.querySelector(".img-preview");


    const oFReader = new FileReader();
    oFReader.readAsDataURL(image.files[0]);

    oFReader.onload = (oFREvent) => {
      imgPreview.src = oFREvent.target.result;
      }

    }


  </script>