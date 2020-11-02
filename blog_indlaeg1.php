<!doctype html>
<html lang="da">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">	
<meta charset="UTF-8">
<!--Bootstrap stylesheet-->
	
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	
	<!--Stylesheet-->
	<link rel="stylesheet" href="css/style.css">
	
	<!--Bootstrap JS-->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	<!-- Font awesome icons-->
	<script src="https://kit.fontawesome.com/336a1c920c.js" crossorigin="anonymous"></script>
	
</head>

<body>
 <?php 
	include 'nav.php';
?>
		<div class="container">
	<div class="row">
		<div class="col-sm-12 col-lg-6 offset-lg-3">
		<h1>Eksempel 1</h1>
<p>Praesent et laoreet lectus. Donec at sem eros. Vivamus id augue leo. Duis commodo nisi ut purus viverra, at tincidunt turpis tincidunt. Curabitur ultrices velit ante, ut faucibus felis placerat eu. Duis hendrerit cursus ornare. Pellentesque ullamcorper mollis ex non porta. Interdum et malesuada fames ac ante ipsum primis in faucibus. Fusce leo sapien, fringilla eu turpis quis, laoreet dapibus sapien. Donec elit lacus, luctus vitae posuere at, vulputate quis lacus. Suspendisse potenti. Nullam ullamcorper tortor ac ex auctor, et pellentesque felis vehicula.</p>

<p>Integer odio dui, consequat sed nisi sagittis, egestas sodales ex. Fusce imperdiet turpis eget arcu maximus, sed euismod dolor dapibus. Vivamus vitae erat metus. Proin ex nunc, aliquet eu ex vitae, consectetur gravida massa. Curabitur eget rutrum orci. Sed sit amet nisl euismod, maximus odio non, varius felis. Nullam in tortor tristique, congue dolor vitae, sagittis ante. Phasellus congue eros non pulvinar lobortis.</p>
			
	<img class="img-fluid mb-2" src="img/test.jpg" alt="test">

<p>Donec diam ante, porta at facilisis eget, fringilla sit amet lectus. Curabitur tellus nunc, semper sed auctor ut, sodales ut lectus. In rhoncus sed augue sed posuere. Proin pretium, est non feugiat vestibulum, orci mi dapibus ante, in luctus magna erat in risus. Aliquam gravida aliquam tincidunt. In hac habitasse platea dictumst. Duis at dictum urna, eu mollis nisi. Ut quis nulla ac erat tincidunt ullamcorper. Maecenas pulvinar consequat magna, at congue turpis ultricies eu. Vivamus vel odio in magna aliquam rutrum. Etiam ultricies a ipsum ac posuere. Vestibulum quis arcu sed lectus dapibus tempor. Ut vel vehicula ligula.</p>

<p>Curabitur vehicula rutrum nulla volutpat fringilla. Sed et tortor dui. Praesent molestie ullamcorper ipsum. Morbi ut aliquam risus, quis dignissim nunc. Morbi ut fringilla turpis. Mauris aliquet feugiat tortor id venenatis. Suspendisse nec laoreet nisi. Nullam fringilla metus non lacus sodales, tempus interdum purus finibus. Aliquam finibus ex a mi efficitur, quis viverra nisl placerat. Quisque ut orci condimentum, sollicitudin purus eu, volutpat eros. Donec scelerisque, tellus vel mollis maximus, nisi est sollicitudin dolor, vel consequat lacus enim ac augue. Proin hendrerit tempor sapien id congue. Sed et mattis leo. Ut consequat vehicula molestie.</p>
			</div>
			
</div>
			<hr>
	
	<!-- Media object -> Om forfatteren-->		
<div class="container p-4 m-4">
	<div class="row">
	<div class="col-lg-8 offset-2">
	<div class="media">
  <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(9).jpg" class="align-self-start mr-3 rounded-circle" alt="..." width="150">
  <div class="media-body">
	  <div class="justify-content-between d-flex">
    <h5 class="mt-0">Om forfatteren</h5>
	  <div>
	  <a class="mr-3"><i class="fab fa-facebook-f"></i></a>
		<a class="mr-3"><i class="fab fa-instagram"></i></a>
		  </div>
		  </div>
    <p>Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.</p>
  </div>
</div>
	</div>
	</div>
	</div>
			<hr>
			
	<!--Kommentar-->
			<div class="col-lg-6 offset-lg-3 p-4 mb-4">
			<!-- if user is not signed in, tell them to sign in. If signed in, present them with comment form -->
			<?php if (isset($iduser)): ?>
				<form class="clearfix" action="post_details.php" method="post" id="comment_form">
					<textarea name="comment_text" id="comment_text" class="form-control"></textarea>
					<button class="btn btn-primary btn-sm pull-right" id="submit_comment">Send kommentar</button>
				</form>
			<?php else: ?>
				<div class="border-light">
					<h4 class="text-center pb-4"><a href="login.php">Login</a> for at kommentere på indlægget</h4>
				</div>
			<?php endif ?>
			<!-- Display total number of comments on this post  -->
			<h5><span id="comments_count"><?php echo count($comments) ?></span> Kommentar(er)</h5>
			<hr>
			<!-- comments wrapper -->
			<div id="comments-wrapper">
			<?php if (isset($comments)): ?>
				<!-- Display comments -->
				<?php foreach ($comments as $comment): ?>
				<!-- comment -->
				<div class="comment clearfix">
					<img src="<?php $img ?>" alt="" class="profile_pic">
					<div class="comment-details">
						<span class="comment-name"><?php echo getUsernameById($comment['iduser']) ?></span>
						<span class="comment-date"><?php echo date("F j, Y ", strtotime($comment["created_at"])); ?></span>
						<p><?php echo $comment['body']; ?></p>
						<a class="reply-btn" href="#" data-id="<?php echo $comment['id']; ?>">Kommenter</a>
					</div>
					<!-- reply form -->
					<form action="post_details.php" class="reply_form clearfix" id="comment_reply_form_<?php echo $comment['id'] ?>" data-id="<?php echo $comment['id']; ?>">
						<textarea class="form-control" name="reply_text" id="reply_text"></textarea>
						<button class="btn btn-primary btn-xs pull-right submit-reply">Send kommantar</button>
					</form>

					<!-- GET ALL REPLIES -->
					<?php $replies = getRepliesByCommentId($comment['id']) ?>
					<div class="replies_wrapper_<?php echo $comment['id']; ?>">
						<?php if (isset($replies)): ?>
							<?php foreach ($replies as $reply): ?>
								<!-- reply -->
								<div class="comment reply clearfix">
									<img src="<?php $img ?>" alt="" class="profile_pic">
									<div class="comment-details">
										<span class="comment-name"><?php echo getUsernameById($reply['iduser']) ?></span>
										<span class="comment-date"><?php echo date("F j, Y ", strtotime($reply["created_at"])); ?></span>
										<p><?php echo $reply['body']; ?></p>
										<a class="reply-btn" href="#">reply</a>
									</div>
								</div>
							<?php endforeach ?>
						<?php endif ?>
					</div>
				</div>
					<!-- // comment -->
				<?php endforeach ?>
			<?php else: ?>
				<h6>Vær den første til at kommentere på indlægget</h6>
			<?php endif ?>
			</div><!-- comments wrapper -->
		</div><!-- // all comments -->
		
		</div>
	</div>
	
	
	
	
 <?php 
	require 'footer.php';
?>
	<!-- Javascripts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap Javascript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<script src="scripts.js"></script>
</body>
</html>