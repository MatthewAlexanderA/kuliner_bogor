@extends('admin.layout')
@php
    use App\Models\Category;
@endphp

@section('product')
active
@endsection
@section('title')
Resto
@endsection

@section('content')

<ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
        <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button"
            role="tab" aria-controls="home" aria-selected="true">Table</button>
    </li>
    <li class="nav-item" role="presentation">
        <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
            role="tab" aria-controls="profile" aria-selected="false">Create</button>
    </li>
</ul>
<div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <section class="content">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="pull-right">
                                        <a href="#" class="btn btn-danger" id="deleteAllSelectedBlog"
                                            onclick="location.reload()">Delete Selected</a>
                                    </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">

                                <table id="example" class="display" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th><input type="checkbox" id="chkCheckAll" /></th>
                                            <th>Image</th>
                                            <th>Nama Tempat Makan</th>
                                            <th>Kecamatan</th>
                                            <th>Other</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($product as $p)
                                        <tr>
                                            <td><input type="checkbox" name="ids" class="checkBoxClass"
                                                    value="{{ $p->id }}" /></td>
                                            <td>
                                                <div style="width: 200px;">
                                                    <img src="{{ asset('storage/' . $p->image) }}" alt="No Image"
                                                        class="img-fluid mt-3">
                                                </div>
                                            </td>
                                            <td>{{ $p->title }}</td>
                                            @php
                                                $cb = Category::where('id', $p->category)->first();
                                            @endphp
                                            <td>{{ $cb->category }}</td>

                                            <td><a class="btn btn-success" href="{{ route('menu.show',$p->id) }}">Tambah Menu</a></td>

                                            <td>
                                                <form action="{{ route('resto.destroy',$p->id) }}" method="POST">

                                                    <a class="btn btn-primary"
                                                        href="{{ route('resto.edit',$p->id) }}">Edit</a>

                                                    @csrf
                                                    @method('DELETE')

                                                    <button type="submit" class="btn btn-danger"
                                                        onclick="return confirm('Delete?')">Delete</button>
                                                </form>
                                            </td>

                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th></th>
                                            <th>Image</th>
                                            <th>Nama Tempat Makan</th>
                                            <th>Kecamatan</th>
                                            <th>Other</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </section>
</div>
<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
    <section class="create">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="pull-right">
                                    {{-- <a class="btn btn-danger" href="{{ route('resto.index') }}"> Back</a> --}}
                                </div>
                                @if ($errors->any())
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">


                                <form action="{{ route('resto.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Image</strong>
                                                <img class="img-preview img-fluid mb-3 col-sm-5">
                                                <div class="input-group mb-3">
                                                    <input type="file" class="form-control" @error('image') is-invalid
                                                        @enderror name="image" id="image" onchange="previewImage()">
                                                    @error('image')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Nama Tempat Makan</strong>
                                                <input type="text" name="title" class="form-control" @error('title')
                                                    is-invalid @enderror placeholder="Nama Tempat Makan" value="{{ old('title') }}">
                                                @error('title')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Quotes</strong>
                                                <input type="text" name="quotes" class="form-control" @error('quotes')
                                                    is-invalid @enderror placeholder="quotes" value="{{ old('quotes') }}">
                                                @error('quotes')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Description</strong>
                                                <textarea name="desc" id="contents" cols="30" rows="10">{{ old('desc') }}</textarea>
                                                <script>
                                                    CKEDITOR.replace('contents');

                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Short Description</strong>
                                                <textarea name="short_desc" id="contents1" cols="30" rows="10">{{ old('short_desc') }}</textarea>
                                                <script>
                                                    CKEDITOR.replace('contents1');

                                                </script>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12">
                                            <div class="form-group">
                                                <strong>Benefit</strong> <br>
                                                <textarea name="benefit" cols="30" rows="5" style="width: 100%;">{{ old('benefit') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
                                            <div class="form-group">
                                                <strong>Kecamatan</strong>
                                                <select class="form-control" name="category">
                                                    @foreach($category as $c)
                                                        <option value="{{$c->id}}">{{$c->category}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                              <div class="form-group">
                                                  <strong>Alamat Tempat Makan</strong>
                                                  <input type="text" name="alamat" class="form-control" @error('alamat')
                                                      is-invalid @enderror placeholder="Alamat Tempat Makan" value="{{ old('alamat') }}">
                                                  @error('alamat')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                              </div>
                                          </div>
                                          <div class="col-xs-12 col-sm-12 col-md-12">
                                              <div class="form-group">
                                                  <strong>Jam Operasi Tempat Makan</strong>
                                                  <input type="text" name="jam" class="form-control" @error('jam')
                                                      is-invalid @enderror placeholder="Jam Operasi Tempat Makan" value="{{ old('jam') }}">
                                                  @error('jam')
                                                  <div class="invalid-feedback">
                                                      {{ $message }}
                                                  </div>
                                                  @enderror
                                              </div>
                                          </div>
                                        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </div>

                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </section>
</div>
</div>


<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>

@endsection
