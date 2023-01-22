window.onload = hideForm(document.querySelectorAll('#edit_post_form'))
window.onload = getAllPosts()

// Hide and show effect

function hideForm(elements) {
  elements = elements.length ? elements : [elements]
  elements[0].style.display = 'none' // Hide the update form
}
function showForm(elements) {
  elements = elements.length ? elements : [elements]
  elements[0].style.display = 'block'
}

var output = document.getElementById('output')

function createNewPost(fdata) {
  var myData = new FormData(fdata) // Taking data from form element
  var xhr = new XMLHttpRequest()
  xhr.onload = function () {
    displayMessage(xhr.responseText)
  }
  xhr.open(fdata.method, fdata.action, true)
  xhr.send(myData)
  return false //prevent the form from posting
}
// Json response of create new post
function displayMessage(data) {
  var target = document.getElementById('output')
  var jcontent = JSON.parse(data)
  var text = ''
  text = jcontent.message
  target.innerHTML = text
  document.getElementById('create_post_form').reset()
  getAllPosts() // Get all posts after creating one
}

// Get all posts

function getAllPosts() {
  var url = 'http://localhost/ajax_posts/api/posts/readAll.php'
  var xhr = new XMLHttpRequest()
  xhr.open('GET', url, true)

  xhr.onreadystatechange = function () {
    if (xhr.readyState < 4) {
      var target = document.getElementById('display_post')
      //target.innerHTML = 'LOADING'
      //showLoading()
    }
    if (xhr.readyState == 4 && xhr.status == 200) {
      displayPost(xhr.responseText)
    }
  }
  xhr.send()
}

function displayPost(data) {
  var content = JSON.parse(data)
  var target = document.getElementById('display_post')
  var text = ''

  for (var i = 0; i < content.data.length; i++) {
    var post_id = content.data[i].post_id
    text += '<div class="post_holder">'
    text += '<div class="post_name"><h2>' + content.data[i].post_name + '</h2></div>'
    text +='<div class="post_email"><h4>' +content.data[i].post_email +'</h4></div>'
    text +='<div class="post_body"><p>' + content.data[i].post_body + '</p></div>'
    text +='<div><button type="button" class="deletePost" onclick="deletePost(' +post_id +')" id="classButton">Delete post<button></div>'
    text +='<div><button type="button" class="updatePost" onclick="updatePost(' +post_id +')" id="classButton">Update post</button></div>'
    text += '</div>'
  }
  target.innerHTML = text
}

function deletePost(post_id) {
  var url =
    'http://localhost/ajax_posts/api/posts/delete.php?post_id=' + post_id
  var xhr = new XMLHttpRequest()
  xhr.open('DELETE', url, true)
  xhr.send(post_id)
  var target = document.getElementById('output')

  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      var data = xhr.responseText
      var jcontent = JSON.parse(data)
      var text = ''
      text = jcontent.message
      target.innerHTML = text
      getAllPosts()
    }
  }
}

function updatePost(post_id) {
  showForm(document.querySelectorAll('#edit_post_form'))
  var url =
    'http://localhost/ajax_posts/api/posts/readOnePost.php?post_id=' + post_id
  var xhr = new XMLHttpRequest()
  xhr.open('GET', url, true)
  xhr.onreadystatechange = function () {
    if (xhr.readyState == 4 && xhr.status == 200) {
      prepareEditForm(xhr.responseText)
    }
  }
  xhr.send()
}
function prepareEditForm(data) {
  var content = JSON.parse(data)
  document.getElementById('edit_post_id').value = content.post_id
  document.getElementById('edit_post_name').value = content.post_name
  document.getElementById('edit_post_email').value = content.post_email
  document.getElementById('edit_post_body').value = content.post_body
}
function updateData(fdata) {
  var myData = new FormData(fdata) // Taking data from form element
  var xhr = new XMLHttpRequest()
  xhr.onload = function () {
    displayUpdateMessage(xhr.responseText)
  }
  xhr.open(fdata.method, fdata.action, true)
  xhr.send(myData)
  return false
}

function displayUpdateMessage(data) {
  var target = document.getElementById('output')
  var content = JSON.parse(data)
  target.innerHTML = content.message
  document.getElementById('edit_post_form').reset()
  hideForm(document.querySelectorAll('#edit_post_form'))
  getAllPosts()
}
