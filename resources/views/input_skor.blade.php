@extends('layout.tampilan')
@section('content')
<div style="margin: auto" class="col-10">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Input Skor</h4>
            <form method="post" action="{{ route('inputSkor') }}">
                @csrf

                <div class="form-group">
                    <label for="club_id">Klub:</label>
                    <select name="club_id" class="form-control">
                        @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="result">Hasil:</label>
                    <select name="result" class="form-control">
                        <option value="M">Menang</option>
                        <option value="S">Seri</option>
                        <option value="K">Kalah</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="goals_for">Gol Untuk:</label>
                    <input type="number" name="goals_for" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="goals_against">Gol Lawan:</label>
                    <input type="number" name="goals_against" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</div>

@endsection
