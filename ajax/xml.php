<html>
<head>
<script>
function showCD(str) {
  if (str=="") {
    document.getElementById("txtHint").innerHTML="";
    return;
  }
  var xmlhttp=new XMLHttpRequest();
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","xml.php?q="+str,true);
  xmlhttp.send();
}
</script>
</head>
<body>

<form>
Pick a girl:
<select name="cds" onchange="showCD(this.value)">
  <option value="">Pick a girl:</option>
  <option value="Bob Dylan">Bob Dylan</option>
  <option value="Bee Gees">Bee Gees</option>
  <option value="Cat Stevens">Cat Stevens</option>
</select>
</form>
<div id="txtHint"><b>CD info will be listed here...</b></div>

</body>
</html>