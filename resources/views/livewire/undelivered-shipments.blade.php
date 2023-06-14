<div>
    <div class="container-fluid py-4">
        <div class="card">
            {{-- <div class="card-header pb-0 px-3">
                <h6 class="mb-0">{{ __('tpl.s4') }}</h6>
            </div> --}}
            <div class="card-body pt-4 p-3">
                <div class="row my-4">
                    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                      <div class="card">
                        <div class="card-body px-0 pb-2">
                          <div class="table-responsive">
                            <table class="table align-items-center mb-0">
                              <thead>
                                <tr>
                                  <th class="text-uppercase text-center text-xs">S/N</th>
                                  <th class="text-uppercase text-center text-xs">Tracking Number</th>
                                  <th class="text-uppercase text-center text-xs">Sender</th>
                                  <th class="text-uppercase text-center text-xs">Receiver</th>
                                  <th class="text-uppercase text-center text-xs">Status</th>
                                  <th class="text-uppercase text-center text-xs">Date</th>
                                  <th class="text-secondary opacity-7"></th>
                                </tr>
                              </thead>
                              <tbody>
                                @php
                                $startRow = ($shipments->currentPage() - 1) * $shipments->perPage() + 1;
                            @endphp
                                @foreach ($shipments as $shipment)
                                <tr>
                                  <td>
                                    <p class="text-xs font-weight-bold mb-0 text-center">{{ $startRow++ }}</p>
                                  </td>
                                  <td>
                                    <p class="font-weight-bold mb-0 text-center ">{{ $shipment->tracking_id }}</p>
                                  </td>
                                  <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $shipment->shipper_name }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $shipment->shipper_city }}, {{ $shipment->shipper_state }}</p>
                                  </td>
                                  <td class="align-middle text-center">
                                    <p class="text-xs font-weight-bold mb-0">{{ $shipment->receiver_name }}</p>
                                    <p class="text-xs text-secondary mb-0">{{ $shipment->receiver_city }}, {{ $shipment->receiver_state }}</p>
                                  </td>
                                  <td class="align-middle text-center text-sm">
                                    @php
                                        $status = $shipment->trackingInfo()->latest()->value('status');
                                        $statusClass = '';

                                        switch ($status) {
                                            case 'Pickup':
                                                $statusClass = 'bg-gradient-secondary';
                                                break;
                                            case 'On Transit':
                                                $statusClass = 'bg-gradient-info';
                                                break;
                                            case 'On Hold':
                                                $statusClass = 'bg-gradient-danger';
                                                break;
                                            case 'Delayed':
                                                $statusClass = 'bg-gradient-primary';
                                                break;
                                            case 'Out for Delivery':
                                                $statusClass = 'bg-gradient-info';
                                                break;
                                            case 'Failed Delivery Attempt':
                                                $statusClass = 'bg-gradient-warning';
                                                break;
                                            case 'Delivered':
                                                $statusClass = 'bg-gradient-success';
                                                break;
                                            default:
                                                $statusClass = 'bg-gradient-secondary';
                                        }
                                    @endphp

                                    <span class="badge badge-sm {{ $statusClass }}">{{ $status }}</span>
                                </td>



                                  <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $shipment->created_at }}</span>
                                  </td>
                                  <td class="align-middle">
                                    <a href="{{ route('trackrecord', $shipment->id) }}" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Add Record">
                                    <i class="fas fa-plus text-success"></i>
                                </a>
                                  </td>

                                </tr>
                                @endforeach
                              </tbody>
                            </table>

                            @include('components.pagination', ['paginator' => $shipments])


                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
        </div>
<!-- Modal -->
<div  class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="confirmDeleteModalLabel" aria-hidden="true" wire:ignore.self>
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Are you sure you want to delete this shipment?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" wire:click="cancelDelete">No</button>
                <button type="button" class="btn btn-danger" wire:click="deleteShipment">Yes</button>
      </div>
    </div>
  </div>
</div>
    </div>
</div>
