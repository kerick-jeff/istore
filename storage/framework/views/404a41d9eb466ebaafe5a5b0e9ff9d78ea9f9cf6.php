<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('js/loading/waitMe.css')); ?>" media="screen" title="no title">
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
        @media(max-width: 767px) {
            #collapseOne { padding-right: 35px; }
            #collapseTwo { padding-right: 35px; }
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('breadcrumb'); ?>
<ol class="breadcrumb" style="margin-top:-15px">
    <li><a href="/"><i class="fa fa-dashboard">iPub</i></a></li>
    <li>Upload</li>
    <li>Video</li>
</ol>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>    <style>
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
        @media(max-width: 767px) {
            #collapseOne { padding-right: 35px; }
            #collapseTwo { padding-right: 35px; }
        }
    </style>
<section class="content" style="margin-top:-35px">

    <div class="alert alert-warning alert-dismissible" id="message" role="alert">
        <button type="button" id="close" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4><i class="fa fa-exclamation-triangle"> </i> Note</h4>
        <p><b>Your pictures should be of medium size.  Click 'SEE ALL VIDEOS' to see older videos</b></p>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('typeError')): ?>
        <div class="alert alert-danger alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('typeError')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('widthError')): ?>
        <div class="alert alert-danger alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('widthError')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('sizeError')): ?>
        <div class="alert alert-danger alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('sizeError')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('fileError')): ?>
        <div class="alert alert-danger alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('fileError')); ?>

        </div>
    <?php endif; ?>
    <?php if(session('editFormMessage')): ?>
        <div class="alert alert-danger alert-dismissible" id="sessionMessages" role="alert" style="width:100%">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <?php echo e(session('editFormMessage')); ?>

        </div>
    <?php endif; ?>

    <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default" id="panel2">
            <div class="panel-heading" role="tab" id="headingTwo" style="padding: 0px">
              <h4 class="panel-title">
                <button class="collapsed btn-block btn-primary" style="height: 50px; border-style: none" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Click me to upload a new video
              </button>
              </h4>
            </div>
            <div id="collapseTwo" class="panel-collapse collapse <?php echo e(session('aria') ? session('aria') : ''); ?>" role="tabpanel" aria-labelledby="headingTwo">
              <div class="panel-body">
                  <div class="timeline-item " style="background:none;margin-top:-20px">
                      <div class="col-md-12" style="margin-left:-5px; margin-right:-35px;">&nbsp
                          <form action="<?php echo e(url('/video/store')); ?>" method="POST" style="width:101%;" enctype="multipart/form-data">
                             <?php echo e(csrf_field()); ?>

                             <div class="fileUpload btn  btn-file btn-primary" style="width:100%; margin-left:2px">
                                 <span><i class="icon fa fa-file"></i>&nbsp; CLICK HERE TO CHOOSE</span>
                                 <input type="file" class="upload"  id="uploadBtn" name="video" style="border-radius:3px" required>
                             </div>
                             <span style="margin-left:2px;">
                                 <input id="uploadFile" placeholder="Choose File" name="video" disabled="disabled" style="width:100%; border-radius:3px"/>
                             </span>
                             <div class="form-group has-feedback  <?php echo e($errors->has('title') ? ' has-error' : ''); ?>" >
                                 <label for="title">Title</label>
                                 <input type="text" class="form-control" name="title" placeholder="Title" style="border-radius:3px" >
                                 <?php if($errors->has('title')): ?>
                                     <span class="help-block">
                                         <strong><?php echo e($errors->first('title')); ?></strong>
                                     </span>
                                 <?php endif; ?>
                             </div>
                             <div class="form-group has-feedback  <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                 <label for="description">Brief description</label>
                                 <textarea type="text" class="form-control" name="description" rows="3" value="Brief description" placeholder="Brief description" style="border-radius:3px"></textarea>
                                 <?php if($errors->has('description')): ?>
                                     <span class="help-block">
                                         <strong><?php echo e($errors->first('description')); ?></strong>
                                     </span>
                                 <?php endif; ?>
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
                             <?php if(Auth::check()): ?>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                             <?php endif; ?>
                             <div class="row">
                                 <div class="col-xs-12">
                                     <button type = "submit" id = "upload" class = "btn btn-primary btn-block btn-flat" style="border-radius:3px"><i class="icon fa fa-upload"></i>&nbsp;UPLOAD</button>
                                 </div>
                             </div>
                             &nbsp;
                         </form>
                     </div>
                 </div>
              </div>
            </div>
        </div>

        <div class="row" id="sessionMessages">
            <!-- Delete video messages -->
            <?php if(session('successDelete')): ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class = "icon fa fa-check"></i> Deleted <br />
                    <?php echo e(session('successDelete')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('failDelete')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class = "icon fa fa-icon-warning-sign"></i>&nbsp;
                    <?php echo e(session('failDelete')); ?>

                </div>
            <?php endif; ?>

            <!-- Edit video messages -->
            <?php if(session('successEdit')): ?>
                <div  class="alert alert-success alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class = "icon fa fa-check"></i> Edited <br />
                    <?php echo e(session('successEdit')); ?>

                </div>
            <?php endif; ?>
            <?php if(session('failEdit')): ?>
                <div class="alert alert-danger alert-dismissible" role="alert" style="width:97.2%; margin-left:15px">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class = "icon fa fa-icon-warning-sign"></i>&nbsp;
                    <?php echo e(session('failEdit')); ?>

                </div>
            <?php endif; ?>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne" style="padding: 0px; margin-bottom:18px;">
              <h4 class="panel-title">
                <button class="btn-block btn-primary" data-toggle="collapse" style="height: 50px; border-style: none" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                 See all video
             </button>
              </h4>
            </div>
            <div>
                 <?php if( count($pubs) === 0 ): ?>
                    <div class="alert alert-info alert-dismissible" role="alert" style="width:98%; margin-left:10px">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p style="text-align:centre; margin-left: 15px"><b><i class = "icon fa fa-info"></i>You have no video. Upload a video to get going.<b></p>
                    </div>
                 <?php elseif( count($pubs) > 0): ?>
            </div>
            <div id="collapseOne" class="panel-collapse collapse <?php echo e(session('aria') ? '' : 'in'); ?>" role="tabpanel" aria-labelledby="headingOne"><!-- /.collapsible start -->
                <div class="panel-body" style="margin-left:60px"> <!-- panel-body start -->
                <div class="timeline-item">  <!-- timeline-item start -->
                <div class="col-md-12" style="margin-left: -35px">
                    <?php foreach( $pubs as $pub ): ?>
                        <div class="col-md-6" style="height: 650px; margin-top:-20px">
                            <div class="box box-widget">
                                  <div class="box-header with-border">
                                    <div class="user-block" style="margin-left:-40px">
                                      <span class="username"> <?php echo e($pub->title); ?></span>
                                      <span class="description">Shared publicly - <?php echo e(substr("$pub->created_at", 0, -9)); ?></span>
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
                                  <div class="box-body" id="box" >
                                   <div style="padding-left: 0%; height:100%; ">

                                    <video style="object-fit: fill; max-width: 100%;min-height: 320px; max-height: 100%" controls>
                                      <source src="<?php echo e(url('video/' . $pub->pubFiles()->first()->filename )); ?>" >
                                    Your browser does not support the video tag.
                                    </video>

                                   </div>
                                   <div style=" height:100px">
                                   <div class="eg" style=" background-color: #F0F0F0; border-radius: 3px;overflow: hidden; white-space: pre-wrap;text-overflow: ellipsis; margin-bottom: 10px;white-space: pre-wrap;      /* CSS3 */
   white-space: -moz-pre-wrap; /* Firefox */
   white-space: -pre-wrap;     /* Opera <7 */
   white-space: -o-pre-wrap;   /* Opera 7 */
   word-wrap: break-word;"> <span class="description" style="margin-left:10px;padding:10px auto;"><?php echo e($pub->description); ?> </span> </div>
                                    <button id="editButton" type="button" class="btn btn-primary btn-xs" style="margin-left:10px" data-toggle="modal" data-target="#alertEdit" data-id="<?php echo e($pub->id); ?>" data-title="<?php echo e($pub->title); ?>" data-description="<?php echo e($pub->description); ?>" data-category="<?php echo e($pub->category); ?>" data-subCategory="<?php echo e($pub->sub_category); ?>"><i class="fa fa-pencil-square-o">&nbsp;Edit</i></button>
                                    <button id="deleteButton" type="button" class="btn btn-danger btn-xs" style="margin-left:10px" data-toggle="modal" data-target="#alertDelete" data-id ="<?php echo e($pub->id); ?>"><i class="fa fa-trash-o">&nbsp;Delete</i></button>
                                    <span class="pull-right text-muted"><?php echo e($pub->views); ?> views - <?php echo e($pub->ratings); ?> ratings</span>
                                    </div>
                                  </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <?php endif; ?>
                </div>
                <?php echo e($pubs->links()); ?>

                </div><!-- timeline-item end -->
                </div><!-- panel-body start -->
            </div><!-- /.collapsible end -->
        </div>
    </div>

<!-- Delete video modal. pops up onclick of delete button -->
 <div class="modal fade" id="alertDelete" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class = "text-danger">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-warning"></i>&nbsp;&nbsp;Alert</h3>
            </div>
            <div class="modal-body">
                <p> Do you really want to delete this pub?</p>
            </div>
            <div class="modal-footer">
            <form id="deleteForm" action="" method="POST">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('DELETE')); ?>

                 <div class="form-group"><input type="hidden" name="id" id = "id"></div>
                <button type="submit button" id="deleteYes" class="btn btn-primary">Yes</button>
                <button type="button" id="deleteNo" class="btn btn-danger"><a href="<?php echo e(url('upload/video')); ?>" style="color:#fff; ">No</a></button>
            </form>

            </div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- example-modal -->
<!-- Delete modal end -->

<!-- Edit modal for video-->
<div class="modal fade" id="alertEdit" tabindex="-1" role="dialog" aria-labelledby="myModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true" class = "text-danger">&times;</span></button>
                <h3 class="modal-title"><i class="fa fa-pencil-square-o"></i>&nbsp;&nbsp;Edit post</h3>
            </div>
            <div class="modal-body">
                <form id="editForm" action="" method="POST" style="width:101%;">
                             <?php echo e(csrf_field()); ?>

                             <?php echo e(method_field('PATCH')); ?>

                             <div class="form-group"><input type="hidden" name="id" id = "id"></div>
                             <div class="form-group has-feedback  <?php echo e($errors->has('title') ? ' has-error' : ''); ?>" >
                                 <label for="title">Title</label>
                                 <input type="text" class="form-control" name="title" placeholder="Title" style="border-radius:3px"   id="title" required>
                                 <?php if($errors->has('title')): ?>
                                     <span class="help-block">
                                         <strong><?php echo e($errors->first('title')); ?></strong>
                                     </span>
                                 <?php endif; ?>
                             </div>
                             <div class="form-group has-feedback  <?php echo e($errors->has('description') ? ' has-error' : ''); ?>">
                                 <label for="description">Brief description</label>
                                 <textarea type="text" class="form-control" name="description" rows="3" value="Brief description" placeholder="Brief description" style="border-radius:3px" id="description" required></textarea>
                                 <?php if($errors->has('description')): ?>
                                     <span class="help-block">
                                         <strong><?php echo e($errors->first('description')); ?></strong>
                                     </span>
                                 <?php endif; ?>
                             </div>
                             <div class="form-group has-feedback">
                                 <label for="category">Category</label>
                                 <select class="form-control" name="category" style="border-radius:3px" id="category" required>
                                   <option value="electronics">Electronics</option>
                                   <option value="fashion">Fashion</option>
                                   <option value="sports">Sports</option>
                                   <option value="health">Health</option>
                                   <option value="ngo">NGO</option>
                                 </select>
                             </div>
                             <div class="form-group has-feedback">
                                 <label for="sub_category">Sub-category</label>
                                 <select class="form-control" name="sub_category" style="border-radius:3px" id="subCategory" required>
                                   <option value="electronics">Electronics</option>
                                   <option value="fashion">Fashion</option>
                                   <option value="sports">Sports</option>
                                   <option value="health">Health</option>
                                   <option value="ngo">NGO</option>
                                 </select>
                             </div>
                             <?php if(Auth::check()): ?>
                                <input type="hidden" name="user_id" value="<?php echo e(Auth::user()->id); ?>">
                             <?php endif; ?>
                             &nbsp;
                             <div class="form-group has-feedback" style="float:right">
                                <button id="update" type="submit" class="btn btn-primary">Update</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal"><a href="<?php echo e(url('upload/video')); ?>" style="color:#fff; ">Cancel</a></button>
                             </div>
                         </form>
            </div>
            <div class="modal-footer"></div>
        </div> <!-- modal-content -->
    </div> <!-- modal-dialog -->
</div> <!-- Edit modal end -->


    <script>
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").value = this.value;
        };
    </script>


</section>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>

<script type="text/javascript" src = "<?php echo e(asset('js/loading/waitMe.js')); ?>"></script>
<script type="text/javascript">

    $(document).ready(function(){

        $("#upload").click(function(){
            $("#body").waitMe({
                effect: 'roundBounce',
                text: 'Uploading...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#3c8dbc',
                sizeW: '',
                sizeH: '',
                source: '',
                onClose: function(){}
            });
        });

        $("#deleteYes").click(function(){
            $("#body").waitMe({
                effect: 'roundBounce',
                text: 'Deleting...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#3c8dbc',
                sizeW: '',
                sizeH: '',
                source: '',
                onClose: function(){}
            });
        });

        $("#deleteNo").click(function(){
            $("#body").waitMe({
                effect: 'roundBounce',
                text: 'Deleting...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#3c8dbc',
                sizeW: '',
                sizeH: '',
                source: '',
                onClose: function(){}
            });
        });

        $("#update").click(function(){
            $("#body").waitMe({
                effect: 'roundBounce',
                text: 'Updating...',
                bg: 'rgba(255,255,255,0.7)',
                color: '#3c8dbc',
                sizeW: '',
                sizeH: '',
                source: '',
                onClose: function(){}
            });
        });

        // This function is for editing video
        $('#alertEdit').on('show.bs.modal', function(e){
            $('#alertEdit #title').val($(e.relatedTarget).data('title'));
            $('#alertEdit #description').val($(e.relatedTarget).data('description'));
            $('#alertEdit #category').select(category).val($(e.relatedTarget).data('category'));
            $('#alertEdit #subCategory').select(subCategory).val($(e.relatedTarget).data('subCategory'));
            $('#editForm').submit(function(){
                var id = $('#alertEdit #id').val($(e.relatedTarget).data('id'));
                var newTitle = $('#alertEdit #title').val();
                var newDescription = $('#alertEdit #description').val();
                var newCategory = $('#alertEdit #category').val();
                var newSubCategory = $('#alertEdit #subCategory').val();
                $("#editForm").attr("action", "/video/edit/" + id + "/" + newTitle + "/" + newDescription + "/" + newCategory + "/" + newSubCategory);
            });
        });


        // This function is for deleting video
        $('#alertDelete').on('show.bs.modal', function(e){
            $('#alertDelete #id').val($(e.relatedTarget).data('id'));
           // var id = $('#alertDelete #id').val($(e.relatedTarget).data('id'));
            var id = $(e.relatedTarget).data('id');
            $('#deleteForm').attr("action", "/video/" + id + "/destroy" );
        });

        // This function is to hide the "Note" and session alerts after 30seconds
        setTimeout(function(){
            $("#message").hide();
            $("#sessionMessages").hide();
        }, 30000);

    });

    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>