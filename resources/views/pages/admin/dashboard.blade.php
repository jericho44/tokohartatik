@extends('layouts.admin.main')

@section('title', 'Admin Toko Hartatik')

@section('content')
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-1">
                        <i class="pe-7s-cash"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text">Rp.</span></div>
                            <div class="stat-heading">Penghasilan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-five">
                    <div class="stat-icon dib flat-color-2">
                        <i class="pe-7s-cart"></i>
                    </div>
                    <div class="stat-content">
                        <div class="text-left dib">
                            <div class="stat-text"><span class="count"> </span></div>
                            <div class="stat-heading">Penjualan</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Widgets -->
<!--  /Traffic -->
<div class="clearfix"></div>
<!-- Orders -->
<div class="orders">
    <div class="row">
        <div class="col-xl-8">
            <div class="card">
                <div class="card-body">
                    <h4 class="box-title">Chart Pembelian </h4>
                </div>
            </div> <!-- /.card -->
        </div> <!-- /.col-lg-8 -->

        <div class="col-xl-4">
            <div class="row">
                <div class="col-lg-6 col-xl-12">
                    <div class="card br-0">
                        <div class="card-body">
                            <div class="chart-container ov-h">
                                <div id="flotPie1" class="float-chart"></div>
                            </div>
                        </div>
                    </div><!-- /.card -->
                </div>
            </div>
        </div> <!-- /.col-md-4 -->
    </div>
</div>
@endsection