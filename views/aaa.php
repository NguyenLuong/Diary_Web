<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  /* Note: Try to remove the following lines to see the effect of CSS positioning */
  .affix {
      top: 20px;
  }
  </style>
</head>
<body>

<div class="container-fluid" style="background-color:#2196F3;color:#fff;height:200px;">
  <h1>Bootstrap Affix Example</h1>
  <h3>Fixed (sticky) vertical sidenav on scroll</h3>
  <p>Scroll this page to see how the left navigation menu behaves with data-spy="affix".</p>
  <p><strong>The left menu sticks to the page when you have scrolled a specified amount of pixels.</strong></p>
</div>
<br>

<div class="container">
  <div class="row">
    
      <div class="col-sm-3 nav nav-pills nav-stacked" data-spy="affix" data-offset-top="205">
      <b>thong tin nguoi dung</b>
       
      <div>
      <form role="form" method="post">
           <div class="form-group">
            <label for="usr">Subject:</label>
            <input type="text" class="form-control" id="subject" name="subject">
            </div>
          
        <div class="form-group">
          <label for="content">Content:</label>
          <textarea class="form-control" rows="5" id="content" name="content"></textarea>
        </div>
          
         <div class="form-group">
            <label for="sel1">Chia sẻ bài đăng</label>
            <select class="form-control" id="share" name="sharewith">
              <option>Mọi người</option>
              <option>Bạn bè</option>
              <option>Chỉ mình tôi</option>
            </select>
      </div>
          
        <div>
            <button type="submit" name="submit" class="btn btn-default">Đăng bài</button>
        </div>
          
      </form>  
      </div>
      </div>
      
    <div class="col-sm-9">   
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
      <h1>Some text to enable scrolling</h1>
    </div>
  </div>
</div>

</body>
</html>