@extends('layouts.master')

@section('css')
<style>
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    @@media (max-width: 767px) {
        #collapseOne {
            padding-right: 35px;
        }
    }
</style>
@endsection

@section('breadcrumb')
<ol class="breadcrumb" style="margin-top:-15px">
    <li><a href="/"><i class="fa fa-dashboard">iPub</i></a></li>
    <li>Upload</li>
    <li>Photo</li>
</ol>
@endsection

@section('content')
<section class="content" style="margin-top:-35px">
    <div class="callout callout-info">
        <h4><i class="fa fa-exclamation-triangle"> </i> Note</h4>
        <p>Your pictures should be of medium size.  Click 'SEE ALL PHOTOS' to see older photos</p>
    </div>


                @if(session('success'))
                    <div class="alert alert-success alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        {{ session('success') }}
                    </div>
                @endif
                @if(session('typeError'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{ session('typeError') }}
                    </div>
                @endif
                @if(session('widthError'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{ session('widthError') }}
                    </div>
                @endif
                @if(session('sizeError'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{ session('sizeError') }}
                    </div>
                @endif
                @if(session('fileError'))
                    <div class="alert alert-danger alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                         {{ session('fileError') }}
                    </div>
                @endif


    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default" id="panel2">
            <div class="panel-heading" role="tab" id="headingTwo">
              <h4 class="panel-title">
                <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Click me to upload a new photo
                </a>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse " role="tabpanel" aria-labelledby="headingTwo">
                
              <div class="panel-body">
                  <div class="timeline-item " style="background:none;margin-top:-20px">
                      <div class="col-md-12" style="margin-left:-5px; margin-right:-35px;">&nbsp
                          <form action="{{ url('/photo/store') }}" method="POST" style="width:101%;" enctype="multipart/form-data">
                             {{ csrf_field() }}
                             {{ method_field('PUT') }}
                             <div class="fileUpload btn  btn-file btn-primary" style="width:100%; margin-left:2px">
                                 <span> CLICK HERE TO CHOOSE</span>
                                 <input type="file" class="upload"  id="uploadBtn" name="photo" style="border-radius:3px">
                             </div>
                             <span style="margin-left:2px;">
                                 <input id="uploadFile" placeholder="Choose File" name="photo" disabled="disabled" style="width:100%; border-radius:3px"/>
                             </span>
                             <div class="form-group has-feedback  {{ $errors->has('title') ? ' has-error' : '' }}" >
                                 <label for="title">Title</label>
                                 <input type="text" class="form-control" name="title" placeholder="Title" style="border-radius:3px" >
                                 @if ($errors->has('title'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('title') }}</strong>
                                     </span>
                                 @endif
                             </div>
                             <div class="form-group has-feedback  {{ $errors->has('description') ? ' has-error' : '' }}">
                                 <label for="description">Brief description</label>
                                 <textarea type="text" class="form-control" name="description" rows="3" value="Brief description" placeholder="Brief description" style="border-radius:3px"></textarea>
                                 @if ($errors->has('description'))
                                     <span class="help-block">
                                         <strong>{{ $errors->first('description') }}</strong>
                                     </span>
                                 @endif
                             </div>
                             <div class="form-group has-feedback">
                                 <label for="category">Category</label>
                                 <select class="form-control" name="category" style="border-radius:3px">
                                   <option value="electronics">Electronics</option>
                                   <option value="fashion">Fashion</option>
                                   <option value="sports">Sports</option>
                                   <option value="health">Health</option>
                                   <option value="ngo">NGO</option>
                                 </select>
                             </div>
                             <div class="form-group has-feedback">
                                 <label for="sub_category">Sub-category</label>
                                 <select class="form-control" name="sub_category" style="border-radius:3px">
                                   <option value="electronics">Electronics</option>
                                   <option value="fashion">Fashion</option>
                                   <option value="sports">Sports</option>
                                   <option value="health">Health</option>
                                   <option value="ngo">NGO</option>
                                 </select>
                             </div>
                             @if(Auth::check())
                                <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                             @endif
                             <div class="row">
                                 <div class="col-xs-12">
                                     <button type="submit" class="btn btn-primary btn-block btn-flat" style="border-radius:3px">UPLOAD
                                 </div>
                             </div>
                             &nbsp;
                         </form>
                     </div>
                 </div>
              </div>
            </div>
        </div>

        <div class="row">
            @if(session('successDelete'))
                <div class="alert alert-success alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('successDelete') }}
                </div>
            @endif
            @if(session('failDelete'))
                <div class="alert alert-danger alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    {{ session('failDelete') }}
                </div>
            @endif
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
              <h4 class="panel-title">
                <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 See all photos
                </a>
              </h4>
            </div>
            <div>
                 @if( count($pubs) == 0 )
                    <div class="alert alert-success alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p style="text-align:centre; margin-left: 15px"><b>You have no photos. Upload a photo to get going.<b></p>
                </div>
                 @elseif( count($pubs) > 0)
            </div>
            <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne"><!-- /.collapsible start -->
                <div class="panel-body" style="margin-left:60px"> <!-- panel-body start -->
                <div class="timeline-item">  <!-- timeline-item start -->
                <div class="col-md-12" style="margin-left: -35px">
                    @foreach( $pubs as $pub )
                        <div class="col-md-6">
                           <!--  <li>{{ $pub->pubFiles->first()->filename }}</li> -->
                            <div class="box box-widget">
                                  <div class="box-header with-border">
                                    <div class="user-block" style="margin-left:-40px">
                                      <span class="username"> {{ $pub->title }}</span>
                                      <span class="description">Shared publicly - {{ substr("$pub->created_at", 0, -9) }}</span> 
                                    </div>
                                    <!-- /.user-block -->
                                    <div class="box-tools">
                                      <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                      </button>
                                      <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                    <!-- /.box-tools -->
                                  </div>
                                  <!-- /.box-header -->
                                  <div class="box-body">
                                    <img class="img-responsive pad" src=" {{ url('/photo/' . $pub->pubFiles->first()->filename) }}" alt="Photo"  style="max-height:400px; margin:0.1px auto">
                                    <p style="margin-left:10px">{{$pub->description}} </p>
                                    <button type="button" class="btn btn-primary btn-xs" style="margin-left:10px"><i class="fa fa-pencil-square-o" ></i><a href="{{ url('photo/'.$pub->id.'/edit') }}" style="color:#fff">Edit</a></button>
                                    <button type="button" class="btn btn-danger btn-xs" style="margin-left:10px" data-toggle="modal" data-target="#alert"><i class="fa fa-trash-o">Delete</i></button>


                                    <div class="modal fade" id="alert" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class = "text-danger">&times;</span></button>
                                                        <h4 class="modal-title"><i class="fa fa-warning"></i>&nbspAlert</h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p> Do you really want to delete this pub?</p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-success"><a href="{{ url('photo/'.$pub->id.'/destroy') }}" style="color:#fff; ">Yes</a></button>

                                                        <button type="button" class="btn btn-danger"><a href="{{ url('upload/photo') }}" style="color:#fff; ">No</a></button>
                                                    </div>
                                                </div> <!-- modal-content -->
                                            </div> <!-- modal-dialog -->
                                    </div> <!-- example-modal -->


                                    <span class="pull-right text-muted">{{ $pub->views }} views - {{ $pub->ratings }} ratings</span>
                                  </div>
                            </div>
                        </div> 
                    @endforeach
                    @endif
                </div>
                {{ $pubs->links() }}
                </div><!-- timeline-item end -->
                </div><!-- panel-body start -->
            </div><!-- /.collapsible end -->
        </div>
    </div>
    <script>
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>
</section>
@endsection