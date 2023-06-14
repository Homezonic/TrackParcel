<main class="main-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-7 mt-4">
                <div class="card">
                    <div class="card-header pb-0 px-3">
                        <h6 class="mb-0">{{__('tpl.s20')  }} <strong>{{ $shipment->tracking_id }}</strong></h6>
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

                @if ($showSuccesNotification)
                    <div wire:model="showSuccesNotification"
                        class="mt-3 alert alert-primary alert-dismissible fade show" role="alert">
                        <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                        <span
                            class="alert-text text-white">{{ __('tpl.trackingupdated') }}</span>
                        <button wire:click="$set('showSuccesNotification', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                        </button>
                    </div>
                @endif
                    <div class="card-body pt-4 p-3">
                        <form wire:submit.prevent="saveTrackingInfo" role="form text-center">
                            <div class="mb-3">
                                <label for="status" class="form-control-label">Status</label>
                               <select wire:model="status" class="form-select" id="status">
                                    <option value="">Select Status</option>
                                    <option value="Pickup">Pickup</option>
                                    <option value="On Transit">On Transit</option>
                                    <option value="On Hold">On Hold</option>
                                    <option value="Delayed">Delayed</option>
                                    <option value="Out for Delivery">Out for Delivery</option>
                                    <option value="Failed Delivery Attempt">Failed Delivery Attempt</option>
                                    <option value="Delivered">Delivered</option>
                                </select>
                                @error('status') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="details" class="form-label">Add Details <small>(optional)</small></label>
                                <input type="text" wire:model="details" class="form-control" id="details">
                                @error('details') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="location" class="form-label">Location <small>(e.g Houston, TX)</small></label>
                                <input type="text" wire:model="location" class="form-control" id="location">
                                @error('location') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="mb-3">
                                <label for="date" class="form-label">Tracked At</label>
                                <input type="datetime-local" wire:model="date" class="form-control" id="date">
                                @error('date') <span class="text-danger">{{ $message }}</span> @enderror
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
                                <h6 class="mb-0"><strong>{{ $shipment->tracking_id }}'s</strong> History</h6>
                            </div>
                            <div class="col-md-6 d-flex justify-content-end align-items-center">
                                <i class="far fa-calendar-alt me-2"></i>
                                <small>{{ $trackingInfos->count() }} record(s)</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-4 p-3">
                        <ul class="list-group">
                            @foreach($trackingInfos as $trackingInfo)
                            <li class="list-group-item border-0 d-flex justify-content-between ps-0 mb-2 border-radius-lg">
                                <div class="d-flex align-items-center">
                                    @if ($trackingInfo->status === 'Out For Delivery' || $trackingInfo->status === 'Delivered')
                                    <button class="btn btn-icon-only btn-rounded btn-outline-success mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-truck"></i>
                                    </button>
                                    @elseif ($trackingInfo->status === 'Delayed' || $trackingInfo->status === 'On Hold')
                                    <button class="btn btn-icon-only btn-rounded btn-outline-danger mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    @else
                                    <button class="btn btn-icon-only btn-rounded btn-outline-info mb-0 me-3 btn-sm d-flex align-items-center justify-content-center">
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    @endif

                                    <div class="d-flex flex-column">
                                        <h6 class="mb-1 text-dark text-sm">{{ $trackingInfo->status }}</h6>
                                        <span class="text-xs">{{ $trackingInfo->details }}</span>
                                    </div>
                                </div>
                                @if ($trackingInfo->status === 'Out For Delivery' || $trackingInfo->status === 'Delivered')
                                <div class="d-flex align-items-center text-success text-gradient text-sm font-weight-bold">
                                    {{ $trackingInfo->date }}
                                </div>
                                @elseif ($trackingInfo->status === 'Delayed' || $trackingInfo->status === 'On Hold')
                                <div class="d-flex align-items-center text-danger text-gradient text-sm font-weight-bold">
                                    {{ $trackingInfo->date }}
                                </div>
                                @else
                                <div class="d-flex align-items-center text-info text-gradient text-sm font-weight-bold">
                                    {{ $trackingInfo->date }}
                                </div>
                                </button>
                                @endif
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</main>
