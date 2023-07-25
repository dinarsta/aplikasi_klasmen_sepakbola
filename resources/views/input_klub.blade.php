<!-- Form input data klub -->
<form method="post" action="/input-klub">
    @csrf
    <label for="name">Nama Klub:</label>
    <input type="text" name="name" required>
     <label for="name">kota Klub:</label>
    <input type="text" name="kota" required>
    <button type="submit">Simpan</button>
</form>
