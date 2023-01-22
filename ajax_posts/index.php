<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <div>
    <div>
      <h2>CreatePostWith ajax</h2>
      <div id='output'>
        This is the original text when the page loads up first.
      </div>
      <hr />
      <!-- FORM STARTS-->

      <form id="create_post_form" method="post" action="api/posts/create_post.php"
        onsubmit="return createNewPost(this)">
        <div>
          <h4>
            Create Post
          </h4>
          <div>
            <div>
              <label>Your name
                <input type="text" id="post_name" name="post_name" placeholder="Enter your name" required>
              </label>
            </div>
            <div>
              <label>Your Mail
                <input type="email" id="post_email" name="post_email" placeholder="Enter your email" required>
              </label>
            </div>
            <div>
              <label>Your content
                <textarea type="text" id="post_body" name="post_body" placeholder="Enter your content" cols="30"
                  rows="5" required></textarea>
              </label>
            </div>
            <div>
              <input type="submit" class="button" value="Create new post">
            </div>
          </div>
        </div>
      </form>
      <!-- END OF FORM -->
      <!-- START OF EDITING POST-->
      <form id="edit_post_form" method="post" action="api/posts/updatePost.php" onsubmit="return updateData(this)">
        <div>
          <h4>
            UPDATE POST
          </h4>
          <div>
            <div>
              <label>Your name
                <input type="text" id="edit_post_name" name="edit_post_name" placeholder="Enter your name" required>
              </label>
            </div>
            <div>
              <label>Your Mail
                <input type="email" id="edit_post_email" name="edit_post_email" placeholder="Enter your mail" required>
              </label>
            </div>
            <div>
              <label>Your content
                <textarea type="text" id="edit_post_body" name="edit_post_body" placeholder="Enter your content"
                  cols="30" rows="5" required></textarea>
              </label>
            </div>
            <!-- hiddin form field-->
            <input type="hidden" id="edit_post_id" name="edit_post_id">
            <!-- hiddin form field-->
            <div>
              <input type="submit" class="button" value="Upadte post">
            </div>
          </div>
        </div>
      </form>
    </div>
    <div id="display_post">

    </div>
    <br /> <br />
  </div>
</body>
<script src="./assets/scripts/ajax_post.js"></script>
<div>
  <div>

  </div>
</div>

</html>

</html>