@extends('layouts.app')



@section('content-main')

<div class="container-fluid p-5">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
                <div class="inner">
                    <h3>{{ $resultado[0]->total }}</h3>
                    <p>{{ $resultado[0]->estatus }}s</p>
                </div>
            <div class="icon">
                <i class="fas fa-folder-open"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
            <div class="inner">
                <h3>{{ $resultado[3]->total }}</h3>
                <p>{{ $resultado[3]->estatus }}s</p>
            </div>
            <div class="icon">
                <i class="fas fa-thumbs-up"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{ $resultado[2]->total }}</h3>
                <p>{{ $resultado[2]->estatus }}</p>
            </div>
            <div class="icon">
                <i class="fas fa-tasks"></i>
            </div>
        </div>
    </div>

    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
            <div class="inner">
                <h3>{{ $resultado[1]->total }}</h3>
                <p>{{ $resultado[1]->estatus }}s</p>
            </div>
            <div class="icon">
                <i class="fas fa-window-close"></i>
            </div>
        </div>
    </div>
          <!-- ./col -->

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                  <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Tickets asignados</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                      <canvas id="donutChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                    </div>
                    <!-- /.card-body -->
                </div>
                  <!-- /.card -->
                </div>
                <!-- /.col (LEFT) -->
                <div class="col-md-6">
                  <!-- LINE CHART -->
                  <div class="card card-info">
                    <div class="card-header">
                      <h3 class="card-title">Tickets generados por departamento</h3>

                      <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                          <i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                          <i class="fas fa-times"></i>
                        </button>
                      </div>
                    </div>
                    <div class="card-body">
                      <div class="chart">
                        <canvas id="barChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                      </div>
                    </div>
                    <!-- /.card-body -->
                  </div>
                  <!-- /.card -->
                </div>
                <!-- /.col (RIGHT) -->
              </div>
              <!-- /.row -->
            </div><!-- /.container-fluid -->
          <!-- /.content -->
</div>

@endsection

@section('scriptsPage')
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('js/estadisticas.js') }}" type="module"></script>
@endsection
