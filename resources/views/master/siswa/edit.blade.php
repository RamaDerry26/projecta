@extends('parent')

@section('content')
<div class="card">
    <div class="card-header">
        <h1>Edit Siswa</h1>
    </div>
    <div class="card-body">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
                </ul>
            </div>
        @endif
        
        <form action="/siswa/{{ $siswa->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="">
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Nama</label>
                    <input class="form-control" id="exampleFormControlInput1" name="name" type="text" value="{{ $siswa->name }}">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1">Tentang</label>
                    <input class="form-control" id="exampleFormControlInput1" name="about" type="text" value="{{ $siswa->about }}">
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Photo</label>
                    <input type="hidden" name="oldPhoto" value="{{ $siswa->photo }}">
                    <input class="form-control" type="file" id="image" name="photo" onchange="previewImage()">
                </div>
                <img src="{{ asset('storage/' . $siswa->photo) }}" class="img-preview mb-3" width="150px">
        </div>
        <div >
            <button class="btn btn-primary" type="submit">Update</button>
            <a class="btn btn-danger" type="button" href="/siswa">Cancel</a>
        </div>
        </form>
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
@endsection