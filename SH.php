<?php 
ob_start();
session_start();
require('php/db.php');
$cu_email = $email = $_SESSION['email'];
$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($result);
$cu_type = $row['Type'];
$cu_org = $row['Org'];
$cu_id = $row['id'];
//echo $cu_type." & ".$cu_org;
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title> J.CRED | Search History</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script> -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <link href="css/landing.css" rel="stylesheet" type="text/css" media="all"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="icon" type="image/ico" href="images/jcred_logo.png">

    </head>
    <body>
        <?php
        if(isset($_POST['datefilter'])){
            echo "hello".$_POST['datefilter']."<br>";
        }
        
        
        ?>
        <div class="container-fluid">
        <div class="row header">
                
                <div class="col-md-6 col-sm-3">
                    <img class="logo" src="images/jcred_logo.png" alt=""/>
                    
                </div>
                <div class="col-md-6  col-sm-3 men">
                    <ul class="menu">
                        
                        
                   
                        <li><a class="menubtn"><img src="images/export.png" alt=""/></a></li>
                        <li><a class="menubtn"><img src="images/print.png" alt=""/></a></li>
                        
                    </ul>
                </div>
                
            
        </div>
            <div class="row content">
            <div class="col-md-2 col-sm-2 sidenav">
                    <div class="office">Office Online</div>
                    <div id="jquery-accordion-menu" class="jquery-accordion-menu">
                        <ul>
                            <li><a href="#"><i class="fas fa-user-alt"></i>INDIVIDUAL </a>
                                <ul class="submenu">
                                    <li><a href="individualCSI.php">CSI Person Records </a></li>
                                    <li><a href="databasePropertyPerson.php">Database Property </a></li>
                                    <li><a href="deedsOfficePerson.php">Deeds Office Records </a></li>
                                    <li><a href="DOTS.php">DOTS Records</a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="far fa-building"></i>COMPANY</a>
                                <ul class="submenu">
                                    <li><a href="companySearchCIPC.php">CIPC Company Search</a></li>
                                    <li><a href="companyCSI.php">CSI Company Records </a></li>
                                    <li><a href="databasePropertyCompany.php">Database Property </a></li>
                                    <li><a href="deedsOfficeCompany.php">Deeds Office Records </a></li>
                                    <li><a href="lightStoneBusiness.php">LightStone Business </a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-briefcase"></i>TRUST</a>
                                <ul class="submenu">
                                    <li><a href="trustCSI.php">CSI Trust Records </a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#"><i class="far fa-credit-card"></i>CREDIT</a>
                                <ul class="submenu">
                                    <li><a href="combinedConsumerTrace.php">Combined Consumer Trace</a></li>
                                    <!--<li><a href="combinedCreditReport.php">Combined Credit Report</a></li>-->
                                    <li><a href="compuScanContactInformation.php">CompuScan</a></li>
                                    <li><a href="ExperianConsumerProfile.php">Experian</a></li>
                                    <li><a href="LetterOfDemand.php">Letter Of Demand</a></li>
                                    <li><a href="TransUnionConsumerProfile.php">TransUnion</a></li>
                                    <li><a href="vericred.php">VeriCred</a></li>
                                    <li><a href="XDSContactInfomation.php">XDS</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="#"><i class="far fa-file-alt"></i>DOCUMENTS</a>
                                <ul class="submenu">
                                    <li><a href="deedsOfficeDoc.php">Deeds Office Document </a></li>
                                    <li><a href="ifactsDoc.php">IFacts Document</a></li>
                                    <li><a href="mieDoc.php">MIE Documents</a></li>
                                    <li><a href="xdsDoc.php">XDS Document </a></li>
                                </ul>
                            </li>
                            <li><a href="#"><i class="fas fa-car-side"></i>VEHICLE</a>
                                <ul class="submenu">
                                    <li><a href="transUnionReport.php">TransUnion Auto Report</a></li>
                                    <li><a href="transUnionValuation.php">TransUnion Auto Valuation</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class=""></i>Intelligence Report</a>
                            </li>
                            <li>
                                <a href="#"><i class=""></i>Bulk Search(Coming Soon)</a>
                            </li>
                            <li>
                                <?php
                               
                                if($cu_type == 'Admin' || $cu_type == 'Super-Admin' || $cu_type == 'Super-Super-Admin'){
                                   echo ' <li>
                                <a href="Admin.php"><i class=""></i>Admin</a>
                            </li><li>
                                <a href="Org.php"><i class=""></i>Organization</a>
                            </li>';
                                }
                            ?>                            </li>
                            <li>
                                <a href="SH.php"><i class=""></i>Search History</a>
                            </li>
                            <li>
                                <a href="logout.php"><i class=""></i>LOGOUT</a>
                            </li>
                        </ul>
			        </div>
		        </div>
                
                <div class="col-md-10 col-sm-10 con">
                    <div class="seaTab">
                        <div class="col-md-6 col-sm-6">
                            <div class="sea">
                            <form action="" method="POST">
                                <label>Search For: </label><input type="text" class="sea-input" id="search"  name="searchterm"> 
                                <div class="opt">
                                    <button type="submit" class="reset" id="btnS" name="submit">Submit</button>
                                    <div class="filter"><i class="fas fa-filter"></i></div>
                                    <div class="cal"><i class="fas fa-calendar-alt"></i></div>
                                    
                                </div>
                            </div>
                               
                        </div>
                        
                        <div class="col-md-6 col-sm-6">
                            <div class="sea">
                                <div class="opt1">
                                    <div class="exp">Export List </div>
                                    <div class="create">Create Group</div>
                                    <div class="history"><i class="fa fa-history"></i>History</div>
                                </div>
                                
                            </div>
                            
                        </div>
                    </div>

                    
                    <div class="seaTable form-style-9">
                    <form action="" method="POST">
                        
                        
                        <h3 class="Trans">Search History</h3>
                        

                        <ul>
                            <li>
                                
                                
                                
                                <select onchange="pageFilter(this.value)"  class="field-style field-split align-left" name="pagefilter">
                                    <option value="">--</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Organization">Organization</option>
                                    <option value="Logs">Logs</option>
                                </select>
                                <input type="date" max="<?php echo date('Y-m-d');?> "name="datefilter" class="field-style field-split align-right"  onchange="dateFilter(this.value)" />
                                 
                            </li>
                            <li>
                                <?php 
                                if($cu_type == 'Super-Super-Admin'){
                                    echo '<select name="userfilter" class="field-style field-split align-left" onchange="userFilter(this.value)">';
                                    $sql1 = "SELECT * FROM users ";
                                      $result = mysqli_query($conn,$sql1);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                                echo "<option value='".$row['id']."'>".$row['Fullname']."</option>";    
                                                }}
                                echo'</select>';
                                    }else if($cu_type == 'Super-Admin'){
                                    echo '<select name="userfilter" class="field-style field-split align-left" onchange="userFilter(this.value)">';
                                    $sql1 = "SELECT * FROM users WHERE Type NOT LIKE 'Super-Super-Admin' AND Org = '$cu_org'";
                                      $result = mysqli_query($conn,$sql1);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                                echo "<option value='".$row['id']."'>".$row['Fullname']."</option>";    
                                                }}
                                echo'</select>';
                                }else if($cu_type == 'Admin'){
                                    echo '<select name="userfilter" class="field-style field-split align-left" onchange="userFilter(this.value)">';
                                    $sql1 = "SELECT * FROM users WHERE Type NOT LIKE '%Super-Admin' AND Org = '$cu_org'";
                                      $result = mysqli_query($conn,$sql1);
                                    if ($result->num_rows > 0) {
                                        while($row = $result->fetch_assoc()) {
                                                echo "<option value='".$row['id']."'>".$row['Fullname']."</option>";    
                                                }}
                                echo'</select>';
                                }
                                ?>
                                
                            </li>
                            
                        </ul>

                    </form>
                    <h3>Results</h3>
                </div>

                <div class="seaTable">
                        <table class="table table-striped  table-hover">
                            <thead class="head">
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Time</th>
                                    <th scope="col">Page</th>
                                    <th scope="col">Action</th>
                                    <th scope="col">user ID</th>
                                    <th scope="col">User</th>
                                    
                                </tr>
                            </thead>
                            <tbody id="tablebody">

                               
                            </tbody>
                        </table>
                    </div>
                    
            </div>
            </div>
            
        </div>
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    <script type="text/javascript"  src="js/sidenav.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>  
        <script>
            
$(document).ready(function(){ jQuery(document).ready(function(){jQuery("#jquery-accordion-menu").jqueryAccordionMenu(); jQuery(".colors a").click(function(){if($(this).attr("class") !="default"){$("#jquery-accordion-menu").removeClass(); $("#jquery-accordion-menu").addClass("jquery-accordion-menu").addClass($(this).attr("class"));}else{$("#jquery-accordion-menu").removeClass(); $("#jquery-accordion-menu").addClass("jquery-accordion-menu");}});}); });

eval(function(p,a,c,k,e,d){e=function(c){return c};if(!''.replace(/^/,String)){while(c--){d[c]=k[c]||c}k=[function(e){return d[e]}];e=function(){return'\\w+'};c=1};while(c--){if(k[c]){p=p.replace(new RegExp('\\b'+e(c)+'\\b','g'),k[c])}}return p}('94(61(54,52,50,53,51,55){51=61(50){64(50<52?\'\':51(95(50/52)))+((50=50%52)>35?68.98(50+29):50.97(36))};73(!\'\'.70(/^/,68)){71(50--){55[51(50)]=53[50]||51(50)}53=[61(51){64 55[51]}];51=61(){64\'\\\\59+\'};50=1};71(50--){73(53[50]){54=54.70(109 96(\'\\\\56\'+51(50)+\'\\\\56\',\'57\'),53[50])}}64 54}(\'86(31(54,52,50,53,51,55){51=31(50){32(50<52?\\\'\\\':51(91(50/52)))+((50=50%52)>35?34.39(50+29):50.84(36))};38(!\\\'\\\'.37(/^/,34)){33(50--){55[51(50)]=53[50]||51(50)}53=[31(51){32 55[51]}];51=31(){32\\\'\\\\\\\\59+\\\'};50=1};33(50--){38(53[50]){54=54.37(125 83(\\\'\\\\\\\\56\\\'+51(50)+\\\'\\\\\\\\56\\\',\\\'57\\\'),53[50])}}32 54}(\\\'219(63(54,52,50,53,51,55){51=63(50){60(50<52?\\\\\\\'\\\\\\\':51(220(50/52)))+((50=50%52)>218?99.217(50+29):50.22(21))};74(!\\\\\\\'\\\\\\\'.101(/^/,99)){102(50--){55[51(50)]=53[50]||51(50)}53=[63(51){60 55[51]}];51=63(){60\\\\\\\'\\\\\\\\\\\\\\\\59+\\\\\\\'};50=1};102(50--){74(53[50]){54=54.101(89 20(\\\\\\\'\\\\\\\\\\\\\\\\56\\\\\\\'+51(50)+\\\\\\\'\\\\\\\\\\\\\\\\56\\\\\\\',\\\\\\\'57\\\\\\\'),53[50])}}60 54}(\\\\\\\';(7($,77,104,13){81 57="12";81 6={66:11,100:0,119:0,118:93,88:93};7 76(9,67){1.9=9;1.221=$.103({},6,67);1.10=6;1.14=57;1.87()};$.103(76.15,{87:7(){1.92();1.106();8(6.88){1.59()}},92:7(){$(1.9).5("225").58("19").113("112 111",7(51){51.18();51.16();8($(1).5(".3").54>0){8($(1).5(".3").80("17")=="223"){$(1).5(".3").116(6.100).213(6.66);$(1).5(".3").56("52").115("3-50-65");8(6.118){$(1).56().5(".3").120(6.66);$(1).56().5(".3").56("52").72("3-50-65")}117 202}203{$(1).5(".3").116(6.119).120(6.66)}8($(1).5(".3").56("52").199("3-50-65")){$(1).5(".3").56("52").72("3-50-65")}}77.205.108=$(1).5("52").210("108")})},106:7(){8($(1.9).58(".3").54>0){$(1.9).58(".3").56("52").206("<53 124=\\\\\\\\\\\\\\\'3-50\\\\\\\\\\\\\\\'>+</53>")}},59:7(){81 4,55,79,75;$(1.9).58("52").113("112 111",7(51){$(".4").248();8($(1).5(".4").54===0){$(1).250("<53 124=\\\\\\\\\\\\\\\'4\\\\\\\\\\\\\\\'></53>")}4=$(1).58(".4");4.72("121-4");8(!4.78()&&!4.69()){55=262.260($(1).259(),$(1).257());4.80({78:55,69:55})}79=51.247-$(1).110().107-4.69()/2;75=51.237-$(1).110().105-4.78()/2;4.80({105:75+\\\\\\\\\\\\\\\'114\\\\\\\\\\\\\\\',107:79+\\\\\\\\\\\\\\\'114\\\\\\\\\\\\\\\'}).115("121-4")})}});$.242[57]=7(67){1.240(7(){8(!$.122(1,"123"+57)){$.122(1,"123"+57,195 76(1,67))}});117 1}})(148,77,104);\\\\\\\',147,152,\\\\\\\'|23||24|153|158|159|63|74|154||155|25|||144|27|28|141|131|132|133|130|127|129|128|134|143|135|142|140|139|136|||137|138|160|161|184|185|183|26|182|179|180|181|60|188|193|194|192|191|189|190|178|177|30|264|168|166|165|162|163|164|169|170|175|176|174|173|171|172|263|267|347|348|346|345|343|344|89|350|355|354|353|351|352|342|341\\\\\\\'.332(\\\\\\\'|\\\\\\\'),0,{}))\\\',82,333,\\\'||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||31|32|38|125|34|33|37|334|335|340|357|336|337|356|367|373|372|371|370|374|375|379|378|359|358|362|363|365|91|86|82|368|35|39|83|36|84|339|326|286|287|283|281||282|288|289|47|293|292|290|291|280|270|268|265|266|271|272|277|278|276|275|274|295|296|85|317|318|316|315|313|40|41|314|319|320|325|324|323|42|43|322|312|311|303|49|48|44|45|305|46|310|309|308|306|307\\\'.85(\\\'|\\\'),0,{}))\',62,284,\'|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||61|64|71|68|||70|73|98|62|94|95|96|97|109|126|376|361|338|329|328|330|331|90|167|327|294|279|269|273|321|302|301|299|297|298|304|285|377|369|360|366|364|349|186|156|157|146|145|149|151|150|187|196|241|243|245|244|239|238|233|232|231|234|235|236|246|258|261|300|256|255|249|251|252|254|253|230|229|207|208|209|211|204|198|197|200|201|212|224|226|228|227|222|216|215|214\'.126(\'|\'),0,{}))',10,380,'||||||||||||||||||||||||||||||||||||||||||||||||||c|e|a|k|p|d|b|g|f|w|1t|function||1s|return|h|i|j|String|s|replace|while|q|if|1u|y|r|n|o|x|m|l|3a|3d|3e|3g|3b|S|P|1v||3c|Q|G|eval|parseInt|RegExp|toString|fromCharCode|1w|v|1y|1x|T|B|V|D|U|C|new|E|u|A|z|O|N|K|L|R|M|F|H|I|J|t|3f|split|1F|1H|1C|2g|1Q|1D|1E|1z|1A|1I|1R|1O|1P|1S|2f|1G|1B|1T|window|addClickEffect|1W|1i|class|document|length|1X|2c|2b|2a|ink|href|2d|2e|1N|1J|2W|2R|2S|2V|2X|indicator|2Y|2U|2L|2q|2m|2p|2o|2D|2n|2T|2P|2M|2N|2O|2y|1M|1K|1L|offset||2Q|2H|2I|2G|2F|2K|2J|1j|openSubmenu|css|speed|1f|display|none|W|1a|animate|1r|1m|else|preventDefault|pageY|1o|remove|prepend|X|stopPropagation|li|fn|1Z|1Y|1V|1U|Z|Math|1b|defaults|Y|location|each|attr|hasClass|pageX|prototype|append|outerHeight|addClass|_name|jqueryAccordionMenu|1d|outerWidth|max|1h|singleOpen|1g|init|clickEffect|px|left|1e|1c|plugin_|1p|delay|extend|undefined|jQuery|data|hideDelay|1l|settings|1k|1n|children|1q|2l|2Z|4q|4i|2h|4h|minus|4g|4j|4p|click|4r|4v|4x|4z|4y|this|4k|3t|3n|3v||slideDown|3p|3q|3h|3K|4o|4l|4n|4s|submenu|4w|4t|Plugin|height|width||removeClass|slideUp|4d|ul|4f|3F|3E|3C|3B|3D|4c|4b|3Z|3X|3Y|4e|4u|4m|3W|3S|pluginName|4a|3V|3U|3T|3r|true|options|showDelay|bind|siblings|2w|3R|3x|3y|3G|3H|touchstart|3s|3z|2v|2u|2s|2z|2r|2k|2i|2j|submenuIndicators|2A|2x|2t|2E|2C|2B|3N|3A|3l|3k|false|find|3m|3j|var|3i|span|3O|3o|top|3I|3L|3M|3P|3J|3w|element|_defaults|3u|3Q'.split('|'),0,{}))
</script>


<script>


 $(document).ready(function(){
 var data 
        $.ajax({
        type:"GET",
        url:"php/getwithkey.php",
        data:data,
        dataType: "json",
        success:function(result){
         document.getElementById("demo").innerHTML = result.ResponseMessage;
         console.log('getwithkey: ' + result.ResponseMessage);
        }
        });
   });

</script>

<script>

$(document).ready(function(){
 var data1 
        $.ajax({
        type:"GET",
        url:"php/get.php",
        data:data1,
        dataType: "json",
        success:function(result){
         document.getElementById("demo2").innerHTML = result.ResponseMessage;
         console.log('token: ' + result.ResponseMessage);
        }
        });
   });

</script>


<script>


$(document).ready(function(){
//  var data2 
        $.ajax({
        type:"GET",
        url:"php/checktoken.php",
        // data: data2,
        dataType: "json",
        success:function(result){
         document.getElementById("demo3").innerHTML = result.ResponseMessage;
         console.log('Checktoken: ' + result.ResponseMessage);
        }
        });
   });

</script> 

<script>


$(document).ready(function(){
//  var data2 
        $.ajax({
        type:"GET",
        url:"php/directorSearch.php",
        // data: data2,
        dataType: "json",
        success:function(result){
         document.getElementById("dem").innerHTML = result.ResponseMessage;
         console.log('PropertyID: ' + result.ResponseMessage);
        }
        });
   });

    function userFilter(x){
        console.log("userFilter ID="+x);
        $.ajax({
                type: "POST",
                url: "userFilter.php",
                data: {data:x},
                success: function(data) {
                    console.log(JSON.parse(data));
                    var data = JSON.parse(data);
                    document.getElementById("tablebody").innerHTML = data;
                },
                error: function(data){
                     console.log(data);
                }
        });
    }
    function dateFilter(x){
         console.log("dateFilter D8="+x);
                $.ajax({
                type: "POST",
                url: "d8Filter.php",
                data: {data:x},
                success: function(data) {
                    console.log(JSON.parse(data));
                    var data = JSON.parse(data);
                    document.getElementById("tablebody").innerHTML = data;
                },
                error: function(data){
                     console.log(data);
                }
        });
    }
    function pageFilter(x){
         console.log("dateFilter D8="+x);
          $.ajax({
                type: "POST",
                url: "pageFilter.php",
                data: {data:x},
                success: function(data) {
                    console.log(JSON.parse(data));
                    var data = JSON.parse(data);
                    document.getElementById("tablebody").innerHTML = data;
                },
                error: function(data){
                     console.log(data);
                }
        });
    }
</script>

<!-- <script>

$(document).ready(function(){
    // $(document).on('click', '#btnS', function() {
       

            $.ajax({
            type:"GET",
            url:"php/customerInfo.php",
            // data: data4,
            dataType: "json",
            success:function(result){

                
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.Fullname));
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.Surname));
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.IDNumber));
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.Gender));
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.Age));
                console.log('V: ' ,JSON.stringify(result.ResponseObject.PersonInformation.DateOfBirth));

                
                document.getElementById("demo7").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.Fullname);
                document.getElementById("demo8").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.Surname);
                document.getElementById("demo9").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.IDNumber);
                document.getElementById("demo10").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.Gender);
                document.getElementById("demo11").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.Age);
                document.getElementById("demo12").innerHTML += JSON.stringify(result.ResponseObject.PersonInformation.DateOfBirth);

            //     $.each(result, function(key , value){ // First Level
            //         console.log('V: ' + value.ResponseMessage )
            //     //     $.each(value.PersonInformation  , function(k , v ){  // The contents inside stars
            //     //      console.log('V: ' + v)
            //     //     //  $("#demo6").html(v.DateOfBirth);
                    
            //     //      document.getElementById("demo6").innerHTML += v;

            //     //         // $("#demo7").append(document.createTextNode(v.Fullname));
                     
            //     //  });     
            // });


            // console.log('Checktoken 2: ' + result.PersonInformation.FullName);
            
            },
            // error: function (request, status, error) {
            //     alert(request.responseText);
            // }
            });
         });

</script>  -->



    </body>
</html>

