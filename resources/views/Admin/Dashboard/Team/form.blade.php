<<<<<<< HEAD
<div class="row">

    {{-- Basic Information --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Name <span class="text-danger">*</span></label>
            <input type="text" name="name" value="{{ old('name', $team->name ?? '') }}" class="form-control" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Designation <span class="text-danger">*</span></label>
            <input type="text" name="designation" value="{{ old('designation', $team->designation ?? '') }}"
                class="form-control" required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Email <span class="text-danger">*</span></label>
            <input type="email" name="email" value="{{ old('email', $team->email ?? '') }}" class="form-control"
                required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Phone <span class="text-danger">*</span></label>
            <input type="text" name="phone" value="{{ old('phone', $team->phone ?? '') }}" class="form-control"
                required>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Website</label>
            <input type="text" name="webaddress" value="{{ old('webaddress', $team->webaddress ?? '') }}"
                class="form-control">
        </div>
    </div>

    {{-- Photo --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Photo</label>
            <input type="file" name="photo" class="form-control">

            @if(isset($team) && $team->photo)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $team->photo) }}" class="img-thumbnail" style="height:90px;">
                </div>
            @endif
        </div>
    </div>

    {{-- Intro --}}
    <div class="col-md-12">
        <div class="form-group">
            <label>Introduction</label>
            <input type="text" name="intro" value="{{ old('intro', $team->intro ?? '') }}" class="form-control">
        </div>
    </div>

    {{-- Description --}}
    <div class="col-md-12">
        <div class="form-group">
            <label>Description</label>
            <textarea name="description" rows="5"
                class="form-control">{{ old('description', $team->description ?? '') }}</textarea>
        </div>
    </div>

    {{-- Experience Ratings --}}
    <div class="col-md-3">
        <div class="form-group">
            <label>Communication (%)</label>
            <input type="number" min="0" max="100" step="0.1" name="experience_communication"
                value="{{ old('experience_communication', $team->experience_communication ?? '') }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Professionalism (%)</label>
            <input type="number" min="0" max="100" step="0.1" name="experience_professionalism"
                value="{{ old('experience_professionalism', $team->experience_professionalism ?? '') }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Quality (%)</label>
            <input type="number" min="0" max="100" step="0.1" name="experience_quality"
                value="{{ old('experience_quality', $team->experience_quality ?? '') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label>Value (%)</label>
            <input type="number" min="0" max="100" step="0.1" name="experience_value"
                value="{{ old('experience_value', $team->experience_value ?? '') }}" class="form-control">
        </div>
    </div>

    {{-- Social Links --}}
    <div class="col-md-6">
        <div class="form-group">
            <label>Twitter</label>
            <input type="text" name="twitter" value="{{ old('twitter', $team->twitter ?? '') }}" class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Facebook</label>
            <input type="text" name="facebook" value="{{ old('facebook', $team->facebook ?? '') }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>Instagram</label>
            <input type="text" name="instagram" value="{{ old('instagram', $team->instagram ?? '') }}"
                class="form-control">
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <label>WhatsApp</label>
            <input type="text" name="whatsapp" value="{{ old('whatsapp', $team->whatsapp ?? '') }}"
                class="form-control">
        </div>
    </div>

=======
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
>>>>>>> beab6d01e72f6bcc4bb8b316f62c92ba2ce4291b
</div>