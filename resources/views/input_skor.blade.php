{{-- <!-- Form input skor -->
<form method="post" action="{{ route('inputSkor') }}">
    @csrf
    <div id="input-multiple">
        <div class="input-row">
            <label for="club_id">Klub:</label>
            <select name="club_id[]">
                @foreach ($clubs as $club)
                    <option value="{{ $club->id }}">{{ $club->name }}</option>
                @endforeach
            </select>
            <label for="result">Hasil:</label>
            <select name="result[]">
                <option value="M">Me</option>
                <option value="S">S</option>
                <option value="K">K</option>
            </select>
            <input type="number" name="goals_for[]" class="goals-for" required>
            <input type="number" name="goals_against[]" class="goals-against" required>
        </div>
    </div>
    <button type="button" id="add-row">Add</button>
  <button type="submit">Simpan</button>
</form>

<script>
    let index = 1; // Start with 1 for the first dynamically added row
    $("#add-row").click(function() {
        let newRow = `
            <div class="input-row">
                <label for="club_id">Klub:</label>
                <select name="club_id[]">
                    @foreach ($clubs as $club)
                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                    @endforeach
                </select>
                <label for="result">Hasil:</label>
                <select name="result[]">
                    <option value="M">Me</option>
                    <option value="S">S</option>
                    <option value="K">K</option>
                </select>
                <input type="number" name="goals_for[]" class="goals-for" required>
                <input type="number" name="goals_against[]" class="goals-against" required>
            </div>
        `;
        $("#input-multiple").append(newRow);
        index++; // Increment the index for the next dynamically added row
    });
</script> --}}


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
