<div>
    <div class="container-fluid py-4">
        <div class="card">
            {{-- <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('tpl.s4') }}</h6>
            </div> --}}
            <div class="card-body pt-4 p-3">

                @if ($showDemoNotification)
                    <div wire:model="showDemoNotification" class="mt-3  alert alert-primary alert-dismissible fade show"
                        role="alert">
                        <span class="alert-text text-white">
                            {{ __('tpl.demoNotif') }}</span>
                        <button wire:click="$set('showDemoNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                @if ($showSuccesNotification)
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ __('tpl.shipmentupdated') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif

                <form wire:submit.prevent="updateShipment" role="form text-left">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="tracking_id" class="form-control-label">{{ __('tpl.s1') }}</label>
                                <div class="@error('tracking_id')border border-danger rounded-3 @enderror">
                                    <input wire:model="tracking_id"  class="form-control" type="text"
                                        id="tracking_id" readonly>
                                </div>
                                @error('tracking_id') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-9"></div>
                    </div>
                    <div class="row">
                        <h6 class="mb-0">{{ __('tpl.s3') }}</h6>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_name" class="form-control-label">{{ __('tpl.s2') }}</label>
                                <div class="@error('shipper_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_name" class="form-control" type="text" placeholder="{{__('tpl.s2') }}"
                                        id="shipper_name">
                                </div>
                                @error('shipper_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_phone_number" class="form-control-label">{{ __('tpl.s5') }}</label>
                                <div class="@error('shipper_phone_number')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_phone_number" class="form-control" type="text" placeholder="{{__('tpl.s5') }}"
                                        id="shipper_phone_number">
                                </div>
                                @error('shipper_phone_number') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="shipper_address" class="form-control-label">{{ __('tpl.s6') }}</label>
                                <div class="@error('shipper_address')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_address" class="form-control" type="text" placeholder="{{__('tpl.s6') }}"
                                        id="shipper_address">
                                </div>
                                @error('shipper_address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_country" class="form-control-label">{{ __('tpl.s17') }}</label>
                                <div class="@error('shipper_country')border border-danger rounded-3 @enderror">
                                    <select wire:model="shipper_country" class="form-select" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('shipper_country') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_state" class="form-control-label">{{ __('tpl.s15') }}</label>
                                <div class="@error('shipper_state')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_state" class="form-control" type="text" placeholder="{{__('tpl.s15') }}"
                                        id="shipper_state">
                                </div>
                                @error('shipper_state') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_city" class="form-control-label">{{ __('tpl.s14') }}</label>
                                <div class="@error('shipper_city')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_city" class="form-control" type="text" placeholder="{{__('tpl.s14') }}"
                                        id="shipper_city">
                                </div>
                                @error('shipper_city') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="shipper_zipcode" class="form-control-label">{{ __('tpl.s16') }}</label>
                                <div class="@error('shipper_zipcode')border border-danger rounded-3 @enderror">
                                    <input wire:model="shipper_zipcode" class="form-control" type="text" placeholder="{{__('tpl.s16') }}"
                                        id="shipper_zipcode">
                                </div>
                                @error('shipper_zipcode') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="package_name" class="form-control-label">{{ __('tpl.s7') }}</label>
                                <div class="@error('package_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="package_name" class="form-control" type="text" placeholder="{{__('tpl.s7') }}"
                                        id="package_name">
                                </div>
                                @error('package_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="package_type" class="form-control-label">{{ __('tpl.s8') }}</label>
                                <div class="@error('package_type')border border-danger rounded-3 @enderror">
                                    <select wire:model="package_type" class="form-select" id="package_type">
                                        <option value="">{{__('Select Package Type')}}</option>
                                        @foreach($packageTypes as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('package_type') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="package_weight" class="form-control-label">{{ __('tpl.s9') }}</label>
                                <div class="@error('package_weight')border border-danger rounded-3 @enderror">
                                    <input wire:model="package_weight" class="form-control" type="number" step="0.1" placeholder="1.8" id="package_weight">
                                </div>
                                @error('package_weight') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <h6 class="mb-0">{{ __('tpl.s10') }}</h6>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="receiver_name" class="form-control-label">{{ __('tpl.s2') }}</label>
                                <div class="@error('receiver_name')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_name" class="form-control" type="text" placeholder="{{__('tpl.s2') }}"
                                        id="receiver_name">
                                </div>
                                @error('receiver_name') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="receiver_phone_number" class="form-control-label">{{ __('tpl.s5') }}</label>
                                <div class="@error('receiver_phone_number')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_phone_number" class="form-control" type="text" placeholder="{{__('tpl.s5') }}"
                                        id="receiver_phone_number">
                                </div>
                                @error('receiver_phone_number') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="receiver_address" class="form-control-label">{{ __('tpl.s6') }}</label>
                                <div class="@error('receiver_address')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_address" class="form-control" type="text" placeholder="{{__('tpl.s6') }}"
                                        id="receiver_address">
                                </div>
                                @error('receiver_address') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receiver_country" class="form-control-label">{{ __('tpl.s17') }}</label>
                                <div class="@error('receiver_country')border border-danger rounded-3 @enderror">
                                    <select wire:model="receiver_country" class="form-select" id="country">
                                        <option value="">Select Country</option>
                                        @foreach ($countries as $country)
                                        <option value="{{ $country }}">{{ $country }}</option>
                                    @endforeach
                                    </select>
                                </div>
                                @error('receiver_country') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receiver_state" class="form-control-label">{{ __('tpl.s15') }}</label>
                                <div class="@error('receiver_state')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_state" class="form-control" type="text" placeholder="{{__('tpl.s15') }}"
                                        id="receiver_state">
                                </div>
                                @error('receiver_state') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receiver_city" class="form-control-label">{{ __('tpl.s14') }}</label>
                                <div class="@error('receiver_city')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_city" class="form-control" type="text" placeholder="{{__('tpl.s14') }}"
                                        id="receiver_city">
                                </div>
                                @error('receiver_city') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="receiver_zipcode" class="form-control-label">{{ __('tpl.s16') }}</label>
                                <div class="@error('receiver_zipcode')border border-danger rounded-3 @enderror">
                                    <input wire:model="receiver_zipcode" class="form-control" type="text" placeholder="{{__('tpl.s16') }}"
                                        id="receiver_zipcode">
                                </div>
                                @error('receiver_zipcode') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn bg-gradient-dark btn-md mt-4 mb-4">{{__('tpl.s19') }}</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
