@extends('layouts.app')

@section('page-title')
&nbsp;- Dashboard
@endsection

@section('content')

<div class="container-fluid d-flex">
  <div class="col-4">
    <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <div class="card-body rounded-10 py-5">
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <div class="ss">
              <img id="profileImgs" alt="profile" src="{{ ('/storage/profile/'.$profiles->profile_img)}}">
            </div>
          </div>
          <div class="col-6">
            <h5 class="p-0 mt-3 mb-0"><strong>{{ $profiles->user_name }}</strong></h5>
            <small class="text-muted p-0 m-0">{{$profiles->email}}</small>
            <br>
            <a href="{{route('user_management.edit', [$profiles->user_id, 'dashboard'])}}" class="btn btn-info btn-sm mt-3">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#pen-fill")}}" />
              </svg> &nbsp; Edit Profile
            </a>
            <a href="{{url('password/reset')}}" class="btn btn-dark btn-sm mt-3" data-toggle="tooltip" data-placement="bottom" title="Reset Password">
              <svg class="bi" width="16" height="16" fill="currentColor">
                <use href="{{asset("bootstrap-icons.svg#key-fill")}}" />
              </svg>
            </a>
          </div>
        </div>
        <hr class="w-75">
        <h5 class="text-center text-secondary">Personal Information</h5>
        <div class="row mt-3">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">User ID</h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->user_id }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">No Identitas</h6>
          </div>
          <div class="col-6">
            <h6>{{ $customer->cust_identity_no ?? '-' }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Tempat & Tgl Lahir</h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->tempat_lahir . ' , ' .  
            Carbon\Carbon::parse($profiles->tgl_lahir)->format('d M Y')
             }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Alamat</h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->alamat ?? '-' }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Kota</h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->kota ?? '-' }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Kodepos</h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->kodepos ?? '-' }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Mobile No: </h6>
          </div>
          <div class="col-6">
            <h6>{{ $profiles->nohp_code.$profiles->no_hp ?? '-' }}</h6>
          </div>
        </div>
        <div class="row">
          <div class="col-6 d-flex justify-content-end">
            <h6 class="text-muted">Telp No: </h6>
          </div>
          <div class="col-6">
            <h6>{{ $customer->telp_rumah ?? '-' }}</h6>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-5">
    <div class="card rounded-10 shadow mt-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">

      <div class="d-flex flex-center mb-3">
        <div class="col-5 mt-4">
          <div class="row">
            <div class="col-6 pl-3">
              <h3 id="jlhCustBaru" class="legendChart1_plBaru font-weight-bold">.</h3>
              <p class="legendChart1_plBaru">Pelanggan<br />Baru</p>
            </div>
            <div class="col-6">
              <h3 id="jlhCustAktif" class="legendChart1_plAktif font-weight-bold">.</h3>
              <p class="legendChart1_plAktif">Pelanggan<br />Aktif</p>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <h3 id="jlhPtsSementara" class="legendChart1_ptSmntra font-weight-bold">.</h3>
              <p class="legendChart1_ptSmntra">Putus<br />Sementara</p>
            </div>
            <div class="col-6">
              <h3 id="jlhPtsPermanen" class="legendChart1_ptPrmnen font-weight-bold">.</h3>
              <p class="legendChart1_ptPrmnen">Putus<br />Permanen</p>
            </div>
          </div>
        </div>

        <div class="col-4 mt-3 flex-center">
          <div class="w180px">
            <canvas id="chartPelanggan"></canvas>
          </div>
        </div>
      </div>

    </div>

    <div class="card rounded-10 shadow mt-3 p-3" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <canvas id="chartPelangganAktif"></canvas>
    </div>

  </div>
  <div class="col-3">
    <div class="card rounded-10 shadow mt-3 px-2 pt-3 pb-4" data-color="{{$profiles->menu_bg}}" data-text="{{$profiles->menu_text}}" style="background-color:{{$profiles->menu_bg}}; color:{{$profiles->menu_text}};">
      <h6 class="text-center text-muted">Area Pelanggan</h6>
      <canvas id="chartAreaPelanggan"></canvas>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.3.2/chart.min.js" integrity="sha512-VCHVc5miKoln972iJPvkQrUYYq7XpxXzvqNfiul1H4aZDwGBGC0lq373KNleaB2LpnC2a/iNfE5zoRYmB4TRDQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.0.0-rc.1/chartjs-plugin-datalabels.min.js" integrity="sha512-+UYTD5L/bU1sgAfWA0ELK5RlQ811q8wZIocqI7+K0Lhh8yVdIoAMEs96wJAIbgFvzynPm36ZCXtkydxu1cs27w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<script>
  $(function () {
      
      // Load Chart Jumlah Pelanggan
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{ url('api/jlhCustomers') }}",
        method: 'get',
        data: {
          // loc_id: loc_id,
        },
        success: function(result){          
          // console.log(result);
          $("#jlhCustBaru").text(result.jlhCustBaru);
          $("#jlhCustAktif").text(result.jlhCustAktif);
          $("#jlhPtsSementara").text(result.jlhPtsSementara);
          $("#jlhPtsPermanen").text(result.jlhPtsPermanen);

          let dataJlhPelanggan = [];
          for (const i in result) {
            dataJlhPelanggan.push(result[i]);
          }
          let ctx = document.getElementById("chartPelanggan").getContext('2d');
          let data = {
              datasets: [{
                  data: dataJlhPelanggan,
                  backgroundColor: [
                      '#28A745',
                      '#64B5F6',
                      '#FFA500',
                      '#E74A3B',
                  ],
              }],
              labels: [
                  'Pelanggan Baru',
                  'Pelanggan Aktif',
                  'Putus Sementara',
                  'Putus Permanen',
              ]
          };
          let myDoughnutChart = new Chart(ctx, {
              type: 'doughnut',
              data: data,
              options: {
                  responsive: true,
                  plugins:{
                    legend: {
                        display: false
                      }
                  },
              }
          });
        },
        error: function (e) {
          console.log(e);
        }
      });

      // Load Chart Jumlah Pelanggan Perbulan
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
        }
      });
      $.ajax({
        url: "{{ url('api/jlhCustomers') }}",
        method: 'get',
        data: {
          // loc_id: loc_id,
        },
        success: function(result){          
          // console.log(result);
          $("#jlhCustBaru").text(result.jlhCustBaru);
          $("#jlhCustAktif").text(result.jlhCustAktif);
          $("#jlhPtsSementara").text(result.jlhPtsSementara);
          $("#jlhPtsPermanen").text(result.jlhPtsPermanen);

          let dataJlhPelanggan = [];
          for (const i in result) {
            dataJlhPelanggan.push(result[i]);
          }
          let ctx = document.getElementById("chartPelanggan").getContext('2d');
          let data = {
              datasets: [{
                  data: dataJlhPelanggan,
                  backgroundColor: [
                      '#28A745',
                      '#64B5F6',
                      '#FFA500',
                      '#E74A3B',
                  ],
              }],
              labels: [
                  'Pelanggan Baru',
                  'Pelanggan Aktif',
                  'Putus Sementara',
                  'Putus Permanen',
              ]
          };
          let myDoughnutChart = new Chart(ctx, {
              type: 'doughnut',
              data: data,
              options: {
                  responsive: true,
                  plugins:{
                    legend: {
                        display: false
                      }
                  },
              }
          });
        },
        error: function (e) {
          console.log(e);
        }
      });



      // chart 2
      var ctx_2 = document.getElementById("chartPelangganAktif").getContext('2d');

      // let pel_baru = Array(12).fill().map(() => Math.round(Math.random() * 99));
      let pel_aktif = Array(12).fill().map(() => Math.round(Math.random() * 99));
      // let pts_sementara = Array(12).fill().map(() => Math.round(Math.random() * 99));
      let pts_permanen = Array(12).fill().map(() => Math.round(Math.random() * 99));

      var data_2 = {
        datasets: [
            // {
            //   label: 'Pelanggan Baru',
            //   data: pel_baru,
            //   fill: false,
            //   borderColor: '#28A745',
            //   tension: 0.1
            // },
            {
              label: 'Berlangganan',
              data: pel_aktif,
              fill: false,
              borderColor: '#64B5F6',
              tension: 0.1
            },
            // {
            //   label: 'Putus Sementara',
            //   data: pts_sementara,
            //   fill: false,
            //   borderColor: '#FFA500',
            //   tension: 0.1
            // },
            {
              label: 'Putus',
              data: pts_permanen,
              fill: false,
              borderColor: '#E74A3B',
              tension: 0.1
            }
          ],
          labels: [
              'Januari',
              'Februari',
              'Maret',
              'April',
              'Mei',
              'Juni',
              'Juli',
              'Agustus',
              'September',
              'Oktober',
              'November',
              'Desember',
          ]
      };
      var myDoughnutChart_2 = new Chart(ctx_2, {
          type: 'line',
          data: data_2,
          options: {
              responsive: true,
              legend: {
                  position: 'bottom',
                  labels: {
                      boxWidth: 12
                  }
              }
          }
      });
      // chart  3
      var ctx_3 = document.getElementById("chartAreaPelanggan").getContext('2d');
      let myData = [        	
        'ANGGREK PERMAI',
        'PESONA RHABAYU',
        'Kembang Sari Makmur',
        'Central Sukajadi',
        'Sei Panas',
        'Costarica',
      ];

      let areas = [];
      for (const area of myData) {
        areas.push(area.split(/\s+/).slice(0,2));
      }

      $("#chartAreaPelanggan").css("height",45*(myData.length));

      var data_3 = {
        labels: areas,
        datasets: [{   
          data: [65, 55, 70, 20, 40, 50],
          fill: false,
          // barPercentage:0.20,
          // categoryPercentage: 1,
          // barThickness: 1,
          // borderWidth: 1
          backgroundColor: [
            '#64B5F6',
          ],  
        }]
      };
      var myDoughnutChart_3 = new Chart(ctx_3, {
          plugins: [ChartDataLabels],
          type: 'bar',
          data: data_3,
          options: {
              indexAxis: 'y',
              responsive: false,
              // maintainAspectRatio: true,
              elements: {
                bar: {
                  borderWidth: 2,
                }
              },
              plugins:{             
                legend: {
                  display: false,
                },
                datalabels: {
                  anchor: 'center',
                  align: 'middle',
                  formatter: Math.round,
                  color: '#fff',
                  font: {
                    weight: 'bold',                   
                  }
                }
              },
          }
      });
  });

</script>


@endsection