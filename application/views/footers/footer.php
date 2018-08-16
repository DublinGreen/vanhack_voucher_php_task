<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/jquery.min.js"></script>

<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/jquery.nanoscroller.min.js"></script><!-- nano scroller -->    
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/sidebar.js"></script><!-- sidebar -->
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/bootstrap.min.js"></script><!-- bootstrap -->
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/mmc-common.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/mmc-chat.js"></script>
<!--  Chart js -->
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/chart-js/Chart.bundle.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/chart-js/chartjs-init.js"></script>
<!-- // Chart js -->

<!--  Datamap -->
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/datamap/d3.min.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/datamap/topojson.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/datamap/datamaps.world.min.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/datamap/datamap-init.js"></script>
<!-- // Datamap -->
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/weather/jquery.simpleWeather.min.js"></script>	
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/weather/weather-init.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/owl-carousel/owl.carousel.min.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/lib/owl-carousel/owl.carousel-init.js"></script>
<script src="<?php echo($dashboardAssetsFolder); ?>assets/js/scripts.js"></script><!-- scripit init-->

<script>
    function getReadyApp() {
        //alert("ready");
//                var xhttp;
//                var url = "http://blockchain.info/tobtc";
//                var str = "?currency=USD&value=500&cors=true";
//                
//                alert(url + str);
//                
//                xhttp = new XMLHttpRequest();
//                xhttp.onreadystatechange = function() {
//                  if (this.readyState == 4 && this.status == 200) {
//                      alert(this.responseText);
//                     //document.getElementById("txtHint").innerHTML = ;
//                  }
//                };
//                xhttp.open("GET", url+str, true);
//                xhttp.send();   
    }

    function copyToClipboard(elem) {
        // create hidden text element, if it doesn't already exist
        var targetId = "_hiddenCopyText_";
        var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
        var origSelectionStart, origSelectionEnd;
        if (isInput) {
            // can just use the original source element for the selection and copy
            target = elem;
            origSelectionStart = elem.selectionStart;
            origSelectionEnd = elem.selectionEnd;
        } else {
            // must use a temporary form element for the selection and copy
            target = document.getElementById(targetId);
            if (!target) {
                var target = document.createElement("textarea");
                target.style.position = "absolute";
                target.style.left = "-9999px";
                target.style.top = "0";
                target.id = targetId;
                document.body.appendChild(target);
            }
            target.textContent = elem.textContent;
        }
        // select the content
        var currentFocus = document.activeElement;
        target.focus();
        target.setSelectionRange(0, target.value.length);

        // copy the selection
        var succeed;
        try {
            succeed = document.execCommand("copy");
        } catch (e) {
            succeed = false;
        }
        // restore original focus
        if (currentFocus && typeof currentFocus.focus === "function") {
            currentFocus.focus();
        }

        if (isInput) {
            // restore prior selection
            elem.setSelectionRange(origSelectionStart, origSelectionEnd);
        } else {
            // clear temporary content
            target.textContent = "";
        }
        return succeed;
    }
</script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-100587873-1', 'auto');
  ga('send', 'pageview');

</script>

</body>
</html>









