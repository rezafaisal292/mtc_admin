{{ Form::open(['url' => 'membersosmed/filter', 'method' => 'post', 'class' => 'form-horizontal form-filter', 'role' => 'form', 'autocomplete' => 'off']) }}
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
                        {{ Form::fgSelect('Member', 'member',$member, request()->member, ['class' => 'form-control'], ) }}
                    </div>
                    <div class="col-md-3">
                        {{ Form::fgSelect('Sosmed', 'sosmed',$sosmed, request()->sosmed, ['class' => 'form-control'],) }}
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