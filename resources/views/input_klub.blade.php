@extends('layout.tampilan')
@section('content')
<div class="col-10 m-5">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Klub</h4>

            <form method="post" action="/input-klub">
                @csrf
                <div class="form-group">
                    <label for="exampleInputName1">Nama klub</label>
                    <input type="text" required class="form-control" name="name" id="name" placeholder="masukan nama klub">
                </div>
                <div class="form-group">
                    <label for="exampleInputName1">Kota Asal Klub</label>
                    <input type="text" required name="kota" class="form-control" id="kota" placeholder="masukan kota asal klub">
                </div>

                <button type="submit" class="btn btn-primary mr-2">Submit</button>
                <button class="btn btn-light">Cancel</button>
            </form>
        </div>
    </div>
</div>
@endsection
