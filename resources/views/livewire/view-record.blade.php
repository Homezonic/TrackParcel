<main class="main-content">
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-md-2 mt-4">

            </div>
            <div class="col-md-7 mt-4">
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
                        <a href="{{ route('delivered-shipments') }}" target="_self"
                    class="btn btn-secondary active mb-0 text-blue" role="button" aria-pressed="true">
                    Back
                </a>
                    </div>

                </div>
            </div>
            <div class="col-md-3 mt-4">

            </div>
        </div>
    </div>
</main>
