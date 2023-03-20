<h1>Create an account</h1>
<?php echo app\core\form\Form::begin('', 'post'); ?>
<form action="" method="post">
	<div class="row">
		<div class="col">  
			<div class="mb-3">
				<label for="firstname" class="form-label">Firstname</label>
				<input type="text" name="firstname" class="form-control <?php echo $model->hasError('firstname') ? ' is-invalid' : '' ?>" 
					value="<?php echo $model->firstname?>" >
				<div class="invalid-feedback"><?php echo $model->getFirstError('firstname')?></div>
			</div>
		</div>
		<div class="col">
			<div class="mb-3">
				<label for="lastname" class="form-label">Lastname</label>
				<input type="text" name="lastname" class="form-control" >
			</div>
		</div>
	</div>

  <div class="mb-3">
    <label for="emain" class="form-label">Email</label>
    <input type="text" name="email" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" name="password" class="form-control" >
  </div>
  <div class="mb-3">
    <label for="confirmPassword" class="form-label">Confirm password</label>
    <input type="password" name="confirmPassword" class="form-control" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>