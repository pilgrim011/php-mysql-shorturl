<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
<link rel="stylesheet" type="text/css" href="/main.css">
    <title>URL Shortener</title>
  </head>
  <body>
<div class="myform">
     <form action = "" method = "get">
  Submit url:
  <input type="url" name="usrurl" id= "newreq">
​<input type="submit" name="submit" onClick="return empty()">
</form>
</div>
<div class="myclass">
</div>
<script>
function empty() {
    var x;
    x = document.getElementById("newreq").value;
    if (x == "") {
        alert("Enter a Valid url");
        return false;
    };
}
</script>
<footer>
          <div class="centar">
                      <a href="http://www.tvojsajt.com/">Izrada sajta TvojSajt.com</a>
          </div>
  </footer><!-- /#footer -->
  </body>
</html>
