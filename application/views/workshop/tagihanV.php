<!-- This Page CSS -->

<div class="page-wrapper">
  <div class="col-md-12">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Invoice</h4>
        <ul class="nav nav-pills m-t-30 m-b-30">
          <li class=" nav-item">
            <a href="#unpaid" class="nav-link active" data-toggle="tab" aria-expanded="false">Belum Dibayar</a>
          </li>
          <li class="nav-item">
            <a href="#paid" class="nav-link" data-toggle="tab" aria-expanded="false">Sudah Dibayar</a>
          </li>
        </ul>
        <div class="tab-content br-n pn">
          <div id="unpaid" class="tab-pane active">
            <div class="row">
              <!-- basic table -->
              <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">No. Tagihan</th>
                      <th class="text-center">Tgl. Tagihan</th>
                      <th class="text-center">Tgl. Jatuh Tempo</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tagihan perizinan #542372</td>
                      <td>1 Desember 2018</td>
                      <td>8 Desember 2018</td>
                      <td>Rp. 3.000.000</td>
                      <td>
                        <button type="button" class="btn waves-effect waves-light btn-primary">Lihat</button>
                        <button type="button" class="btn waves-effect waves-light btn-success">Konfirmasi</button>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <div id="paid" class="tab-pane">
            <div class="row">
              <!-- basic table -->
              <div class="table-responsive">
                <table id="zero_config" class="table table-striped table-bordered">
                  <thead>
                    <tr>
                      <th class="text-center">No. Tagihan</th>
                      <th class="text-center">Tgl. Tagihan</th>
                      <th class="text-center">Tgl. Jatuh Tempo</th>
                      <th class="text-center">Total</th>
                      <th class="text-center">Action</th>

                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tagihan perizinan #542372</td>
                      <td>1 Desember 2018</td>
                      <td>8 Desember 2018</td>
                      <td>Rp. 3.000.000</td>
                      <td>
                        <button type="button" class="btn waves-effect waves-light btn-primary">Lihat</button>
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
  </div>
</div>
