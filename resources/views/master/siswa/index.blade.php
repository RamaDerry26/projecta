@extends('parent')
{{-- @section('title', 'Siswa') --}}
@section('content')
    <div class="card">
        <div class="card-header">Siswa</div>
        <div class="card-body">
            <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                <div class="datatable-top">
                    {{-- <div class="datatable-dropdown">
                        <label>
                            <select class="datatable-selector">
                                <option value="5">5</option>
                                <option value="10">10</option>
                                <option value="15">15</option>
                                <option value="20">20</option>
                                <option value="25">25</option>
                            </select>
                            entire per page
                        </label>
                    </div> --}}
                    {{-- <div class="datatable-search">
                        <input class="datatable-input" placeholder="Search..." type="search" title="Search within table" aria-controls="datatablesSimple" style="padding: 0.856rem 1.125rem !important;">
                    </div> --}}
                </div>
                 @if(session()->has('success'))
                    <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="datatable-top" style="text-align: start;">
                    <a class="btn btn-primary" data-toggle="modal" data-target="#addsismodal">Add</a>
                </div>
                <div class="datatable-container">
                    <table id="datatablesSimple" class="datatable-table">
                        <thead>
                            <tr>
                                <th data-sortable="true" style="width: 25%;">
                                    <a class="datatable-sorter">Foto</a>
                                </th>
                                <th data-sortable="true" style="width: 25%;">
                                    <a class="datatable-sorter">Nama</a>
                                </th>
                                <th data-sortable="true" style="width: 25%;">
                                    <a class="datatable-sorter">Tentang</a>
                                </th>
                                <th data-sortable="true" style="width: 25%;">
                                    <a class="datatable-sorter">Action</a>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($siswalist as $siswa)
                            <tr data-index="0">
                                <td class="align-middle text-center">
                                    <img src="{{ asset('storage/' . $siswa->photo) }}" alt="{{ $siswa -> name }}"
                                     height="100px" >
                                </td>
                                <td>{{ $siswa->name }}</td>
                                <td>{{ $siswa->about }}</td>
                                {{-- <td>
                                    <div class="badge bg-primary text-white rounded-pill">Full-time</div>
                                </td> --}}
                                <td style="text-align: center; display: flex; align-items:center; border-left: 0;">
                                    <a class="btn btn-warning me-3" href="{{ route('siswa.edit',$siswa->id) }}" role="button">Edit</a>                                        
                                    <form action="{{ route('siswa.destroy', $siswa->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger" type="submit">Delete</button>                                        
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="datatable-bottom">

                </div>
            </div>
        </div>
    </div>
@endsection