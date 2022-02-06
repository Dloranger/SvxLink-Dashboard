    <div class="card">
    <div class="card-header bg-primary text-light">
      TalkGroup Status
    </div>
    <div class="table-responsive">
      <table id="currtx" class="table table-condensed table-striped table-hover">
        <thead>
          <tr>
            <th>TG State</th>
          </tr>
        </thead>
        <tbody id="tgline">
	<?php
		$logLines = getSvxLog();
	$reverseLogLines = $logLines;
	array_multisort($reverseLogLines,SORT_DESC);
	foreach ($reverseLogLines as $logLine) {
		echo $logLine;
	}
	?>
        </tbody>
      </table>
    </div>
  </div>
<script>	  
  function doXMLHTTPRequest(scriptname, elem) {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById(elem).innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET",scriptname,true);
	xmlhttp.send();
  }
  function refreshInQSOAndLastHeardList() {
	doXMLHTTPRequest("tgstatus.php","tgline");
  }
  var transmitting = false;
  function loadXMLDoc() {
	var xmlhttp;
	if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("tgline").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET","tgstatus.php",true);
	xmlhttp.send();
	var timeout = window.setTimeout("loadXMLDoc()", 1000);
  }
  loadXMLDoc();
  </script>
