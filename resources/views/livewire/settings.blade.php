<main class="main-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{__('tpl.s21')  }}</h6>
                    </div>
                    @if ($showDemoNotification)
                    <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                        role="alert">
                        <span class="alert-text text-white">
                            {{ __('tpl.demoNotif') }}</span>
                        <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                @if (session()->has('success'))
                <div class="mt-3 alert alert-success alert-dismissible fade show" role="alert">
                    <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                    {{ session('success') }}
                </div>
            @endif
                    <div class="card-body pt-4 p-3">
                        <form wire:submit.prevent="save" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="trackingInitials" class="form-label">Tracking Initials</label>
                                        <input type="text" wire:model.defer="settings.tracking_initials" class="form-control" id="trackingInitials">
                                        @error('settings.tracking_initials') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="trackingNumbers" class="form-label">Tracking Numbers</label>
                                        <input type="number" wire:model.defer="settings.tracking_numbers" class="form-control" id="trackingNumbers">
                                        @error('settings.tracking_numbers') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="siteName" class="form-label">Site Name</label>
                                        <input type="text" wire:model.defer="settings.site_name" class="form-control" id="siteName">
                                        @error('settings.site_name') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="siteEmail" class="form-label">Site Email</label>
                                        <input type="email" wire:model.defer="settings.site_email" class="form-control" id="siteEmail">
                                        @error('settings.site_email') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="siteDescription" class="form-label">Site Description</label>
                                        <textarea wire:model.defer="settings.site_description" class="form-control" id="siteDescription"></textarea>
                                        @error('settings.site_description') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="siteKeyword" class="form-label">Site keywords</label>
                                        <input class="form-control" id="siteKeyword" data-color="dark" type="text" value="{{ $settings->keyword }}" placeholder="Enter something" wire:model.defer="settings.keyword"/>
                                    @error('settings.keyword') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="logo" class="form-label">Logo <small>(250 x 250 min & 512 x 512 max)</small></label>
                                        <input type="file" wire:model="logo" class="form-control" id="logo">
                                        @error('logo') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="icon" class="form-label">Icon <small>(250 x 250 min & 512 x 512 max)</small></label>
                                        <input type="file" wire:model="icon" class="form-control" id="icon">
                                        @error('icon') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label for="tawktoId" class="form-label">Tawk.to ID (xxxxxxxxxxxxxxxxxxxxxxxx/xxxxxxxxx)</label>
                                        <input type="text" wire:model.defer="settings.tawkto_id" class="form-control" id="tawktoId">
                                        @error('settings.tawkto_id') <span class="text-danger">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                        </div>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0"><strong>Logo & Favicon</h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">

                        <div class="border card card-plain text-center">
                            <h6>Logo</h6>
                            @if ($settings->site_logo)
                            <img src="{{ Storage::url($settings->site_logo) }}" alt="Logo" class="mt-2" style="max-width: 200px;">
                        @endif
                        </div>
                    <br>
                        <div class="border card card-plain text-center">
                            <h6>Favicon</h6>
                            @if ($settings->site_icon)
                            <img src="{{ Storage::url($settings->site_icon) }}" alt="Icon" class="mt-2" style="max-width: 50px;">
                        @endif
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>