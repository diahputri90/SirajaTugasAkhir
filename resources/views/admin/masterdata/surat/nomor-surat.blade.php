<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Sistem Surat Menyurat</title>
  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/img/brand/logo.png')}}" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="{{ asset('assets/vendor/nucleo/css/nucleo.css') }}" type="text/css">
  <link rel="stylesheet" href="{{ asset('assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}" type="text/css">
  <!-- Page plugins -->
  <!-- Argon CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/argon.css?v=1.2.0') }}" type="text/css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">

</head>

<body>
  <!-- Sidenav -->
  @include('admin.layouts.sidenav')

  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
    @include('admin.layouts.navbar')

    <!-- Header -->
    <!-- Header -->
    <div class="header bg-primary pb-6">
        <div class="container-fluid">
          <div class="header-body">
            <div class="row align-items-center py-4">
              <div class="col-lg-6 col-7">
                {{--  <h6 class="h2 text-white d-inline-block mb-0">Default</h6>  --}}
                <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                  <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Dashboards</a></li>
                    {{--  <li class="breadcrumb-item active" aria-current="page">Default</li>  --}}
                  </ol>
                </nav>
              </div>
              <div class="col-lg-6 col-5 text-right">
                <a href="#" class="btn btn-sm btn-neutral">New</a>
                <a href="#" class="btn btn-sm btn-neutral">Filters</a>
              </div>
            </div>
            <!-- Card stats -->
          </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
      <div class="row">
        <div class="col-xl-12 order-xl-1">
            <div class="card">
                <div class="card-header">
                    <div class="col-lg-12">
                        <div class="float-left">
                            <!-- Search form -->
                            <form class="navbar-search navbar-search-light form-inline mr-sm-3" id="navbar-search-main">
                            <div class="form-group mb-0">
                                <div class="input-group input-group-alternative input-group-merge">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-search"></i></span>
                                </div>
                                <input class="form-control" placeholder="Search" type="text">
                                </div>
                            </div>
                            <button type="button" class="close" data-action="search-close" data-target="#navbar-search-main" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            </form>
                        </div>
                        <div class="float-right">
                            <button class="btn btn-md btn-primary" id="btn_add"><i class="fa fa-plus"></i>
                            Tambah</button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="card shadow">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="tabs-icons-text-1" role="tabpanel" aria-labelledby="tabs-icons-text-1-tab">
                                <div class="row">
                                    <div class="col">
                                        <div class="card">
                                            <!-- Card header -->
                                            <div class="card-header border-0">
                                            <h3 class="mb-0">Data Nomor Surat</h3>
                                            </div>
                                            <!-- Light table -->
                                            <div class="table-responsive">
                                            <table class="table align-items-left table-flush">
                                                <thead class="thead-light">
                                                    <tr class="text-left">
                                                        <th class="col-sm-1">No</th>
                                                        <th class="col-1">Kode Surat</th>
                                                        <th class="col-7">Keterangan</th>
                                                        <th class="col-3 text-center">Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody class="list" id="nomorsurat_list" name="nomorsurat_list">
                                                @foreach ($nomorsurat as $data)
                                                    <tr>
                                                        <td> {{ $data->master_surat_id }} </td>
                                                        <td class="kodesurat"> {{ $data->kode_nomor_surat }} </td>
                                                        <td scope="row"> {{ $data->keterangan }} </td>
                                                        <td class="text-center">
                                                            <a href="javascript:void(0)" class="btn btn-sm btn-flat btn-warning edit" data-id="{{ $data->master_surat_id }}"><i class="fa fa-edit"></i></a>
                                                            <a href="#" id="delete" class="btn btn-sm btn-flat btn-danger delete" data-id="{{ $data->master_surat_id }}"><i class="fa fa-trash"></i></a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody>
                                            </table>
                                            </div>
                                            <!-- Card footer -->
                                            <div class="card-footer py-4">
                                                {{ $nomorsurat->links('vendor.pagination.bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      </div>
      <!-- Footer -->
      @include('admin.layouts.footer')

      <!-- Sweet-Alert -->
      @include('sweetalert::alert')

      <!-- Modal Add -->
      @include('admin.masterdata.surat.add-nomor-surat')

      <!-- Modal Edit -->
      @include('admin.masterdata.surat.edit-nomor-surat')

    </div>
  </div>


  <!-- JQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

  {{--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script>

    $(document).ready(function () {
        $('.edit').click(function(e) {
            e.preventDefault();

            var mastersuratid = $(this).data('id');
            var kodenomorsurat = $(this).data('kode');
            var keterangan = $(this).data('keterangan');
            $('#master_surat_id').val(mastersuratid);
            $('#kode_nomor_surat').val(kodenomorsurat);
            $('#keterangan').val(keterangan);

        });
    });

    $('.delete').click(function(e) {
        e.preventDefault();
        var mastersuratid = $(this).attr('data-id');

            swal({
                title: "Apakah yakin menghapus data ?",
                text: "Data nomor surat akan terhapus!",
                icon: "warning",
                buttons: ["Batal", "Hapus"],
                successMode: true,
            })
            .then((isConfirm) => {
                if (isConfirm) {
                    window.location ="/nomor-surat/delete/"+mastersuratid+""
                    swal("Berhasil! Data nomor surat telah terhapus!", {
                        icon: "success",
                    });
                } else {
                    swal("Gagal! Data nomor surat batal terhapus!", {
                        icon: "error",
                    });
                }
            });
    });

  </script>

  {{--  <script>
    jQuery(document).ready(function($) {

        //---- Open model Create ----//
        jQuery('#btn_add').click(function() {
            jQuery('#btn_save').val('add');
            jQuery('#myForm').trigger('reset');
            jQuery('#formNomorSurat').modal('show');
        });

        //CREATE
        $('#btn_save').click(function(e) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
                }
            });

            e.preventDefault();
            var formData = {
                kode_nomor_surat : jQuery('#kode_nomor_surat').val(),
                keterangan : jQuery('#keterangan').val(),
            };

            var state = jQuery('#btn_save').val();
            console.log(state);
            var master_surat_id = jQuery('#master_surat_id').val();
            $.ajax({
                type: "POST",
                url: "{{ route('add-nomor-surat') }}",
                data: formData,
                dataType: "json",
                success: function(data) {
                    var nomorsurat = '<tr id="nomorsurat'+ data.master_surat_id +'"><td>' + data.master_surat_id + '</td><td>' + data.kode_nomor_surat + '</td><td scope="row">' + data.keterangan + '</td><td class="text-center"><a href="#" class="btn btn-sm btn-flat btn-warning"><i class="fa fa-edit"></i></a><a href="#" id="delete" class="btn btn-sm btn-flat btn-danger delete" data-id="{{ $data->master_surat_id }}"><i class="fa fa-trash"></i></a></td></tr>';
                    if (state == "add") {
                        jQuery('#nomorsurat_list').append(nomorsurat);
                    } else {
                        jQuery('#nomorsurat' + master_surat_id).replaceWith(nomorsurat);
                    }
                    jQuery('#myForm').trigger('reset');
                    jQuery('#formNomorSurat').modal('hide');
                    swal("Sukses!", "Data berhasil ditambahkan!", "success");
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });
    });
  </script>  --}}

  <script type="text/javascript">
    $(document).ready(function ($) {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn_add').click(function () {
            $('#myForm').trigger("reset");
            $('#ajaxNomorSuratModel').html("Tambah Nomor Surat");
            window.$('#formNomorSurat').modal('show');
        });

        $('.edit').click(function () {

            var master_surat_id = $(this).data('id');

            //ajax
            $.ajax({
                type: "POST",
                url: "{{ route('edit-nomor-surat') }}",
                data: { master_surat_id: master_surat_id },
                dataType: 'json',
                success: function (res) {
                    $('#ajaxNomorSuratModel').html("Edit Nomor Surat");
                    window.$('#formNomorSurat').modal('show');
                    $('#master_surat_id').val(res.master_surat_id);
                    $('#kode_nomor_surat').val(res.kode_nomor_surat);
                    $('#keterangan').val(res.keterangan);
                }

            });
        });

        $('#btn_save').click(function (event) {
            var master_surat_id = $("#master_surat_id").val();
            var kode_nomor_surat = $("#kode_nomor_surat").val();
            var keterangan = $("#keterangan").val();

            $("#btn_save").html('Mohon ditunggu...');
            $("#btn_save").attr("disabled", true);

            //ajax
            $.ajax({
                type: "POST",
                url: "{{ route('add-update-nomor-surat') }}",
                data: {
                    master_surat_id: master_surat_id,
                    kode_nomor_surat: kode_nomor_surat,
                    keterangan: keterangan,
                },
                dataType: 'json',
                success: function (res) {
                    window.location.reload();
                    $("#btn_save").html('Submit');
                    $("#btn_save").attr("disabled", false);
                    swal("Sukses!", "Data berhasil ditambahkan!", "success");
                },
                error: function (request, status, error) {
                    swal(request.responseText);
                }
            });
        });
    });
  </script>

  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="{{ asset('assets/vendor/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/js-cookie/js.cookie.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js') }}"></script>
  <!-- Optional JS -->
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.min.js') }}"></script>
  <script src="{{ asset('assets/vendor/chart.js/dist/Chart.extension.js')}}"></script>
  <!-- Argon JS -->
  <script src="{{ asset('assets/js/argon.js?v=1.2.0') }}"></script>
</body>

</html>
