@extends('layouts.master')

@section('title', '| Compose')

<!-- provide author and page description -->

@section('breadcrumb')
<h1>
  Mailbox
</h1>
<ol class="breadcrumb">
  <li><a href="#"><i class="fa fa-dashboard"></i> iPub</a></li>
  <li>Mailbox</li>
  <li class="active">Compose</li>
</ol>
@endsection

@section('content')

@if(session('saved'))
    <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <i class = "icon fa fa-check"></i> Success <br />
         {{ session('saved') }}
    </div>
@endif

@if(session('sent'))
    <div class="alert alert-success alert-dismissible" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
         <i class = "icon fa fa-check"></i> Success <br />
         {{ session('sent') }}
    </div>
@endif

<div class="row">
    <div class="col-md-3">
      <a href="{{ url('/mailbox/inbox') }}" class="btn btn-primary btn-block margin-bottom">Back to Inbox</a>
        <div class="box box-solid">
          <div class="box-header with-border">
            <h3 class="box-title">Folders</h3>
            <div class="box-tools">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
          </div>
          <div class="box-body no-padding">
            <ul class="nav nav-pills nav-stacked">
              <li>
                <a href="{{ url('/mailbox/inbox') }}">
                  <i class="fa fa-inbox"></i> Inbox
                  <span class="label label-info pull-right">16</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/mailbox/sent') }}">
                  <i class="fa fa-send"></i> Sent
                  <span class="label pull-right bg-green">4</span>
                </a>
              </li>
              <li>
                <a href="{{ url('/mailbox/drafts') }}">
                  <i class="fa fa-file-text"></i> Drafts
                  <span class="label label-warning pull-right">5</span>
                </a>
              </li>
            </ul>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /. box -->
    </div>
    <!-- /.col -->
    <form action="/mailbox/compose" enctype="multipart/form-data" method="POST">
      {{ csrf_field() }}

      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Compose New Message</h3>
          </div>
          <!-- /.box-header -->

          <input type="hidden" name="user_id" value = "{{ Auth::user()->id }}">
          <input type="hidden" name="sender" value = "{{ Auth::user()->email }}">
          <input type="hidden" name="is_draft" value="0">


          <div class="box-body">
            <div class="form-group">
              <input type = "email" name = "recipient" class="form-control" placeholder="To:">
              @if ($errors->has('recipient'))
                  <span class="help-block" style = "color: #DD4B39 !important;">
                      <strong>{{ $errors->first('recipient') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <input type = "text" name = "subject" class="form-control" placeholder="Subject:">
              @if ($errors->has('subject'))
                  <span class="help-block" style = "color: #DD4B39 !important;">
                      <strong>{{ $errors->first('subject') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <textarea name = "body" id="compose-textarea" class="form-control" style="height: 100px"> </textarea>
              @if ($errors->has('body'))
                  <span class="help-block" style = "color: #DD4B39 !important;">
                      <strong>{{ $errors->first('body') }}</strong>
                  </span>
              @endif
            </div>
            <div class="form-group">
              <i class="fa fa-paperclip"></i> Attachment
              <input class="btn btn-info btn-file" type="file" name="attachment" style = "max-width: 500px">
              <p class="help-block">Max. 32MB</p>
              @if ($errors->has('attachment'))
                  <span class="help-block" style = "color: #DD4B39 !important;">
                      <strong>{{ $errors->first('attachment') }}</strong>
                  </span>
              @endif
            </div>
          </div>
          <!-- /.box-body -->
          <div class="box-footer">
            <div class="pull-right">
              <button type="submit" name = "save" class="btn btn-warning"><i class="fa fa-save"></i> Save as draft</button>
              <button type="submit" name = "send" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
            </div>
            <button type="reset" class="btn btn-danger"><i class="fa fa-times"></i> Discard</button>
          </div>
          <!-- /.box-footer -->
        </div>
        <!-- /. box -->
      </div>
      <!-- /.col -->
  </form>
</div>
<!-- /.row -->

@endsection

@section('javascript')

@endsection