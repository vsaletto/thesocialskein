<div>
    <label for="cover_photo">Cover Photo</label>
    <input type="file" name="cover_photo" accept="image/*">
</div>

<div>
    <label for="social_links">Social Links</label>
    <textarea name="social_links">{{ old('social_links', json_encode(auth()->user()->social_links ?? [])) }}</textarea>
</div>
