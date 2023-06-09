<div>
    <form wire:submit.prevent="updateSettings">
        <!-- Form fields for each setting -->
        <div>
            <label for="site_name">Site Name</label>
            <input wire:model.defer="settings.site_name" type="text" id="site_name">
            @error('settings.site_name') <span>{{ $message }}</span> @enderror
        </div>

        <!-- Add form fields for other settings -->

        <button type="submit">Save</button>
    </form>
</div>
