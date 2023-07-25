<!-- Form input data klub -->
<form method="post" action="/input-klub">
    @csrf
    <label for="name">Nama Klub:</label>
    <input type="text" name="name" required>
    <button type="submit">Simpan</button>
</form>
