 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Tracking</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format(47377) }}
                      {{-- <span class="text-success text-sm font-weight-bolder">Today +10</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Delivered</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format(4377) }}
                      {{-- <span class="text-success text-sm font-weight-bolder">+3%</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">On Transit</p>
                    <h5 class="font-weight-bolder mb-0">
                      {{ number_format(377) }}
                      {{-- <span class="text-danger text-sm font-weight-bolder">-2%</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">*</p>
                    <h5 class="font-weight-bolder mb-0">
                     new feature
                      {{-- <span class="text-success text-sm font-weight-bolder">+5%</span> --}}
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
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
                    <a href="/createShipment" target="_blank"
                        class="btn btn-info active mb-0 text-white" role="button" aria-pressed="true">
                        Add New
                    </a>
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
                      <th class="text-secondary opacity-7"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">  1</p>
                      </td>
                      <td>
                        <p class="text-xs font-weight-bold mb-0 text-center">PT7442382838</p>
                        <p class="text-xs text-secondary mb-0 text-center">
                          <a href="#" class="" data-bs-toggle="tooltip"
                        data-bs-original-title="Edit Tracking">
                        <i class="fas fa-edit text-black"></i>
                    </a>
                    <span>
                       <a href="#" class="" data-bs-toggle="tooltip"
                        data-bs-original-title="Delete">
                        <i class="cursor-pointer fas fa-trash text-danger"></i>

                    </span>
                        </p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">John Michael</p>
                        <p class="text-xs text-secondary mb-0">Lagos</p>
                      </td>
                      <td class="align-middle text-center">
                        <p class="text-xs font-weight-bold mb-0">Niven Michael</p>
                        <p class="text-xs text-secondary mb-0">Abuja</p>
                      </td>
                      <td class="align-middle text-center text-sm">
                        <span class="badge badge-sm bg-gradient-success">On Transit</span>
                      </td>
                      <td class="align-middle text-center">
                        <span class="text-xs font-weight-bold">23/04/18</span>
                      </td>
                      <td class="align-middle">
                        <a href="#" class="mx-3" data-bs-toggle="tooltip"
                        data-bs-original-title="Add Record">
                        <i class="fas fa-edit text-success"></i>
                    </a>
                      </td>

                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
