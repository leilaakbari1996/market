@if (session()->has('success'))
  <div class="row">
    <div class="col-sm-2"></div>
        <div class="col-sm-10">
            <div class="alert alert-success alert-dismissible mr-3">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fa fa-check"></i> توجه!</h5>
                {{session()->get('success')}}
            </div>
        </div>
    </div>
  @endif
