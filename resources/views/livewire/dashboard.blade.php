 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Shipments</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format($totalCreatedShipments) }}
                      {{-- <span class="text-success text-sm font-weight-bolder">Today +10</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-app text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Delivered</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format($totalDeliveredShipments) }}
                      {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-success shadow text-center border-radius-md">
                    <i class="ni ni-delivery-fast text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-4 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">On Transit</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format($totalUndeliveredShipments) }}
                      {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-secondary shadow text-center border-radius-md">
                    <i class="ni ni-user-run text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row my-4">
        <div class="col-lg-12 col-md-12 mb-md-0 mb-4">
          <div class="card">
            <div class="card-header pb-0">
              <div class="row">
                <div class="col-lg-6 col-7">
                  <h6> <i class="fa fa-plane text-info" aria-hidden="true"></i> Recently Added</h6>
                  <p class="text-sm mb-0">
                  </p>
                </div>
                <div class="col-lg-6 col-5 my-auto text-end">
                  <div class="dropdown float-lg-end pe-4">
                  </div>
                </div>
              </div>
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
                      </tr>
                  </thead>
                  <tbody>
                      @foreach ($latestShipments as $index => $shipment)
                          <tr>
                              <td>
                                  <p class="text-xs font-weight-bold mb-0 text-center">{{ $index + 1 }}</p>
                              </td>
                              <td>
                                  <p class="font-weight-bold mb-0 text-center">{{ $shipment->tracking_id }}</p>
                              </td>
                              <td class="align-middle text-center">
                                  <p class="text-xs font-weight-bold mb-0">{{ $shipment->shipper_name }}</p>
                                  <p class="text-xs text-secondary mb-0">{{ $shipment->shipper_state .', '. $shipment->shipper_country }}</p>
                              </td>
                              <td class="align-middle text-center">
                                  <p class="text-xs font-weight-bold mb-0">{{ $shipment->receiver_name }}</p>
                                  <p class="text-xs text-secondary mb-0">{{ $shipment->receiver_state .', '. $shipment->receiver_country }}</p>
                              </td>
                              <td class="align-middle text-center text-sm">
                                @php
                                        $status = $shipment->trackingInfo->first()->status;
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
                                  <span class="text-xs font-weight-bold">{{ $shipment->created_at->format('d/m/y') }}</span>
                              </td>
                          </tr>
                      @endforeach
                  </tbody>
              </table>


              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
