<?php session_start(); ?>
<html>
  <link
    rel="stylesheet"
    href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO"
    crossorigin="anonymous"
  />
  <link
    rel="stylesheet"
    media="screen"
    href="https://fontlibrary.org/face/segment7"
    type="text/css"
  />
  <style>
    body {
      height: 100vh;
      width: 100vw;
    }
    .jumbotron {
      font-family: "Segment7Standard";
      font-weight: normal;
      font-style: italic;
      margin-bottom: 0;
      padding: 1rem 1rem;
    }
    .btn-group-wrapper{
        height: calc(100vh - 107px);
        width: 100vw;
        background-color: #fafafa;
        outline: 1px solid #d3d3d3;
        overflow:visible;
    }
    
    .btn{
        display: block;
        height: calc((100vh - 107px)/5);
        width: 25vw;
        border-radius: 0;
        background-color: #e2e2e2;
        color: #232323;
        font-size: 8vh;
    }
    .btn.zero-btn{
        width: 50vw;
    }
    .btn.opt-btn{
        background-color: orange;
    }
  </style>
  <body>
  <?php echo "NUMBER:".$_SESSION['number']."   Old number :". $_SESSION['old_number']."  sign :".$_SESSION['sign'];?>
	  <form  method = "post" action="index_session.php" >
	  <div class="jumbotron"><h1 class="display-4">
	  <?php echo $_SESSION['number'];?> </h1></div>
	  <div class="btn-group-wrapper">
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary opt-btn" name="AC" value="AC">AC</button>
        <button type="submit" class="btn btn-secondary opt-btn" name="eraser" value="eraser">◀ </button>
        <button type="submit" class="btn btn-secondary opt-btn" name="%" value='%' >%</button>
        <button type="submit" class="btn btn-secondary opt-btn" name="/" value="/">/</button>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary" name="number[]" value=7>7</button>
        <button type="submit" class="btn btn-secondary" name="number[]" value=8 >8</button>
        <button type="submit" class="btn btn-secondary" name="number[]" value=9>9</button>
        <button type="submit" class="btn btn-secondary opt-btn" name="*" value="*">*</button>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary"name="number[]" value=4>4</button>
        <button type="submit" class="btn btn-secondary"name="number[]" value=5>5</button>
        <button type="submit" class="btn btn-secondary"name="number[]" value=6>6</button>
        <button type="submit" class="btn btn-secondary opt-btn" name="-" value='-'>-</button>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary"name="number[]" value=1>1</button>
        <button type="submit" class="btn btn-secondary"name="number[]" value=2>2</button>
        <button type="submit" class="btn btn-secondary"name="number[]" value=3>3</button>
        <button type="submit" class="btn btn-secondary opt-btn"name="+" value='+'>+</button>
      </div>
      <div class="btn-group" role="group" aria-label="Basic example">
        <button type="submit" class="btn btn-secondary zero-btn"name="number[]" value=0>0</button>
        <button type="submit" class="btn btn-secondary"name="." value=.>.</button>
        <button type="submit" class="btn btn-secondary opt-btn"name="=" value='='>=</button>
      </div>
    </div>
   </form>
  </body>
</html>
