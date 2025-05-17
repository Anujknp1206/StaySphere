<div class="form-group">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $team->name ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Photo</label>
    <input type="file" name="photo" class="form-control">
    @if(isset($team) && $team->photo)
        <img src="{{ asset('storage/' . $team->photo) }}" width="100">
    @endif
</div>

<div class="form-group">
    <label>Email</label>
    <input type="email" name="email" value="{{ old('email', $team->email ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Phone</label>
    <input type="text" name="phone" value="{{ old('phone', $team->phone ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Website</label>
    <input type="text" name="webaddress" value="{{ old('webaddress', $team->webaddress ?? '') }}" class="form-control" >
</div>

<div class="form-group">
    <label>Designation</label>
    <input type="text" name="designation" value="{{ old('designation', $team->designation ?? '') }}"
        class="form-control" required>
</div>

<div class="form-group">
    <label>Intro</label>
    <input type="text" name="intro" value="{{ old('intro', $team->intro ?? '') }}" class="form-control" required>
</div>

<div class="form-group">
    <label>Description</label>
    <textarea name="description" class="form-control"
        rows="4">{{ old('description', $team->description ?? '') }}</textarea>
</div>

<div class="form-group">
    <label>Communication (Rating)</label>
    <input type="number" name="experience_communication" min="0" max="100" step="0.1"
        value="{{ old('experience_communication', $team->experience_communication ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Professionalism (Rating)</label>
    <input type="number" name="experience_professionalism" min="0" max="100" step="0.1"
        value="{{ old('experience_professionalism', $team->experience_professionalism ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Quality (Rating)</label>
    <input type="number" name="experience_quality" min="0" max="100" step="0.1"
        value="{{ old('experience_quality', $team->experience_quality ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Value (Rating)</label>
    <input type="number" name="experience_value" min="0" max="100" step="0.1"
        value="{{ old('experience_value', $team->experience_value ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Twitter</label>
    <input type="text" name="twitter" value="{{ old('twitter', $team->twitter ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Facebook</label>
    <input type="text" name="facebook" value="{{ old('facebook', $team->facebook ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>Instagram</label>
    <input type="text" name="instagram" value="{{ old('instagram', $team->instagram ?? '') }}" class="form-control">
</div>

<div class="form-group">
    <label>WhatsApp</label>
    <input type="text" name="whatsapp" value="{{ old('whatsapp', $team->whatsapp ?? '') }}" class="form-control">
</div>