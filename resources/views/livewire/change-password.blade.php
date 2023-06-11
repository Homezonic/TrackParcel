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
            @if (session()->has('error'))
            <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                {{ session('error') }}
            </div>
        @endif
                    <div class="card-body pt-4 p-3">
                        <form wire:submit.prevent="changePassword">
                            <div class="form-group">
                                <label for="oldPassword">Old Password</label>
                                <input type="password" wire:model.defer="oldPassword" class="form-control" id="oldPassword">
                                @error('oldPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="newPassword">New Password</label>
                                <input type="password" wire:model.defer="newPassword" class="form-control" id="newPassword">
                                @error('newPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="confirmPassword">Confirm Password</label>
                                <input type="password" wire:model.defer="confirmPassword" class="form-control" id="confirmPassword">
                                @error('confirmPassword')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-5 mt-4">
                <div class="card h-100 mb-4">
                    <div class="card-header pb-0 px-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h6 class="mb-0"><strong></h6>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
<ul>
    <li>Min. 8 character</li>
    </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>