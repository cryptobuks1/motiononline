<?php $__env->startSection('title',"Edit $user->name"); ?>
<?php $__env->startSection('content'); ?>
  <div class="admin-form-main-block">
    <h4 class="admin-form-text"><a href="<?php echo e(url('admin/users')); ?>" data-toggle="tooltip" data-original-title="Go back" class="btn-floating"><i class="material-icons">reply</i></a> Edit User</h4>
    <div class="row">
      <div class="col-md-6">
        <div class="admin-form-block z-depth-1">       
          <?php echo Form::model($user, ['method' => 'PATCH', 'action' => ['UsersController@update', $user->id], 'files' => true]); ?>

            <div class="form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
              <?php echo Form::label('name', 'Enter Name'); ?>

              <p class="inline info"> - Please enter your name</p>
              <?php echo Form::text('name', null, ['class' => 'form-control', 'required' => 'required']); ?>

              <small class="text-danger"><?php echo e($errors->first('name')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
              <?php echo Form::label('email', 'Email address'); ?>

              <p class="inline info"> - Please enter your email</p>
              <?php echo Form::email('email', null, ['class' => 'form-control', 'required' => 'required', 'placeholder' => 'eg: foo@bar.com']); ?>

              <small class="text-danger"><?php echo e($errors->first('email')); ?></small>
            </div>
           <div class="search form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('password', 'Password'); ?>

              <p class="inline info"> - Please enter your password</p>
              <?php echo Form::password('password', ['id' => 'password',' class' => 'form-control']); ?>

               <span toggle="#password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>
              <small class="text-danger"><?php echo e($errors->first('password')); ?></small>
            </div>
            <div class="search form-group<?php echo e($errors->has('confirm_password') ? ' has-error' : ''); ?>">
              <?php echo Form::label('confirm_password', 'Confirm Password'); ?>

              <p class="inline info"> - Please enter your password again</p>
              <?php echo Form::password('confirm_password', ['id' => 'confirm_password','class' => 'form-control']); ?>

               <span toggle="#confirm_password" class="fa fa-fw fa-eye field-icon toggle-password2"></span>

              <small class="text-danger"><?php echo e($errors->first('confirm_password')); ?></small>
            </div>
            <div class="form-group<?php echo e($errors->has('is_admin') ? ' has-error' : ''); ?>">
              <div class="row">
                <div class="col-xs-4">
                  <?php echo Form::label('is_admin', 'Administrator'); ?>

                </div>
                <div class="col-xs-5 pad-0">
                  <label class="switch">								
                    <?php echo Form::checkbox('is_admin', 1, $user->is_admin, ['class' => 'checkbox-switch']); ?>

                    <span class="slider round"></span>
                  </label>
                </div>
              </div>
              <div class="col-xs-12">
                <small class="text-danger"><?php echo e($errors->first('is_admin')); ?></small>
              </div>
            </div>
            <div class="btn-group pull-right">
              <button type="submit" class="btn btn-success">Update</button>
            </div>
          <div class="clear-both"></div>
          <?php echo Form::close(); ?>

        </div>  
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('custom-script'); ?>
<script>
  $(function(){
    $('form').on('submit', function(event){
      $('.loading-block').addClass('active');
    });
  });


  $(".toggle-password2").click(function() {

  $(this).toggleClass("fa-eye fa-eye-slash");
  var input = $($(this).attr("toggle"));
  if (input.attr("type") == "password") {
    input.attr("type", "text");
  } else {
    input.attr("type", "password");
  }
  });
  
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admin', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>