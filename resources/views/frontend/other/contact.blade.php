@extends('layouts.master')

@section('title')
    Contact
@endsection

@section('content')
    <!-- Introduction Row -->
    <!-- Contact Form -->
      <!-- In order to set the email address and subject line for the contact form go to the bin/contact_me.php file. -->
      <div class="row">
          <div class="col-md-6 col-md-offset-3">
              <h3>Send us a Message</h3>
              <form>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Full Name:</label>
                          <input name="name" type="text" class="form-control" id="name" required>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Email:</label>
                          <input name="email" type="email" class="form-control" id="email" required>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Subject:</label>
                          <input name="subject" type="text" class="form-control" id="subject" required>
                      </div>
                  </div>
                  <div class="control-group form-group">
                      <div class="controls">
                          <label>Message:</label>
                          <textarea name="message" class="form-control" id="message" required maxlength="999" style="resize:none"></textarea>
                      </div>
                  </div>
                  <button type="submit" class="btn btn-primary">Send Message</button>
                  {{ csrf_field() }}
              </form>
          </div>
      </div>
      <!-- /.row -->
@endsection
