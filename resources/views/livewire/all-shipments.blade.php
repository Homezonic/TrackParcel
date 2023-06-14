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
                <div class="row my-4">
                    <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
                      <div class="card">
                        <div class="card-header pb-0">
                          <div class="row">
                            <div class="col-lg-6"></div>
                            <div class="col-lg-6 col-5 my-auto text-end">
                              <div class="dropdown float-lg-end pe-4">
                                <a href="{{ route('createShipment') }}" target="_self"
                                    class="btn btn-info active mb-0 text-white" role="button" aria-pressed="true">
                                    Add New
                                </a>
                              </div>
                            </div>
                          </div>
                          @if (session()->has('success'))
                          <div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                            <span class="alert-icon text-white"><i class="ni ni-like-2"></i></span>
                            <span class="alert-text text-white">{{ session('success') }}</span>
                            <button type="button" class="btn-close text-white" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @endif
                        </div>
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
                                            $status = 'Label Created';
                                                $statusClass = 'bg-gradient-secondary';
                                        }
                                    @endphp

                                    <span class="badge badge-sm {{ $statusClass }}">{{ $status }}</span>
                                </td>


                                  <td class="align-middle text-center">
                                    <span class="text-xs font-weight-bold">{{ $shipment->created_at }}</span>
                                  </td>
                                  <td class="align-middle">
                                    <a href="{{ route('shipments.edit', $shipment->id) }}" class="mx-3" data-bs-toggle="tooltip"
                                    data-bs-original-title="Edit Shipment">
                                    <i class="fas fa-edit text-info"></i>
                                  </a>
                                  <span>&nbsp;</span>
                                    <a href="#" class="" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" wire:click.prevent="confirmDelete({{ $shipment->id }})"
                                      data-bs-original-title="Delete Record">
                                      <i class="cursor-pointer fas fa-trash text-danger"></i>
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
