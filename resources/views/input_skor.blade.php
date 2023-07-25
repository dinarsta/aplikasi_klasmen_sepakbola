<!-- Form input skor -->
<form method="post" action="/input-skor">
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
            <label for="goals_for">GM:</label>
            <input type="number" name="goals_for[]" required>
            <label for="goals_against">GK:</label>
            <input type="number" name="goals_against[]" required>
        </div>
    </div>
    <button type="button" id="add-row">Add</button>
    <button type="submit">Simpan</button>
</form>

<script>
    $(document).ready(function() {
        $("#add-row").click(function() {
            $("#input-multiple").append(`
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
                    <label for="goals_for">GM:</label>
                    <input type="number" name="goals_for[]" required>
                    <label for="goals_against">GK:</label>
                    <input type="number" name="goals_against[]" required>
                </div>
            `);
        });
    });
</script>
