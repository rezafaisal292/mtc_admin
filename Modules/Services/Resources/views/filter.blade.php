{{ Form::open(['url' => 'services/filter','method' => 'post','class' => 'form-horizontal form-filter','role' => 'form','autocomplete' => 'off']) }}
<div class="row">
    <div class="col-12">
        <div class="card card-info">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6" style="text-align:left">
                        Pencarian
                    </div>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body ">
                <div class="row">
                    <div class="col-md-3">
                        {{ Form::fgText('Label', 'label', request()->label, ['class' => 'form-control'], null, 'text', false) }}
                    </div>
                </div>
            </div>
            <div class="card-footer clearfix float-right">
                <button type="submit" class="btn btn-info btn-sm">
                    <i class="fas fa-search"></i>&nbsp; Cari
                </button>
            </div>
        </div>
    </div>
</div>
{{ Form::close() }}
