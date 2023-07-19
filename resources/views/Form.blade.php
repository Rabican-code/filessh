<form action="/" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <label for="file">File:</label>
        <input type="file" id="file" name="file" required>
    </div>

    <div>
        <label for="max_downloads">Max Downloads:</label>
        <input type="number" id="max_downloads" name="max_downloads" value="5" required>
    </div>

    <div>
        <label for="expire_after">Expire After (in days):</label>
        <input type="number" id="expire_after" name="expire_after" value="1" required>
    </div>

    <div>
        <button type="submit">Upload</button>
    </div>
</form>
