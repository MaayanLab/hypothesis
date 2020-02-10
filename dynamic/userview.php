<style>
    .rounded-frame{
        border-radius: 10px;
        width: 100%;
        max-width: 260px;
    }
    
    .cssanimation, .cssanimation span {
        animation-duration: 0.6s;
        animation-fill-mode: both;
    }

    .cssanimation span { display: inline-block }

    .fadeInBottom { animation-name: fadeInBottom }
    @keyframes fadeInBottom {
        from {
            opacity: 0;
            transform: translateY(30%);
        }
        to { opacity: 1 }
    }
    
    .flagimg{
        width: 20px;
        margin-top: -2px;
        margin-right: 4px;
    }
    
    .socialmedia div{
        float: left;
        margin-bottom: 10px;
    }
    
    .logo{
        margin-right: 20px;
    }
    
    .follow{
        position: absolute;
        top: 0px;
        right: 20px;
    }
    
    .followbtn{
        border-radius: 3px;
        width: 100px;
    }
    
    .date{
        font-size: 12px;
        font-color: grey;
        margin-bottom: 6px;
    }
    
    .date-pad{
        margin-top: 6px;
        margin-left: 6px;
    }
    
    .username{
        font-size: 32px;
        color: black;
        font-weight: 600;
    }
    
    .realname{
        margin-top: -8px;
        color: black;
        font-size: 22px;
    }
    
    .location{
        margin-bottom: 20px;
    }
    
    .biography{
        margin-top: 30px;
        cursor: pointer;
    }
    #bio{
        height: 200px;
    }
    
    @media only screen and (max-width: 768px) {
        .rounded-frame{
            margin-bottom: 20px;
            border: 3px solid #ffffff;
        }
    }
    
    #content{
        height: 100%;
    }
    
    #content-wrapper{
        height:100%;
    }
    
    #wrapper{
        height: 100%;
    }
    
    body{
        height: 100%;
    }
    .view{
        overflow:hidden;
        height: 120px;
    }
    
    .fadeout {
        position: absolute; 
        bottom: 0em;
        width:100%;
        height: 4em;
        background: -webkit-linear-gradient(
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 100%
        ); 
        background-image: -moz-linear-gradient(
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 100%
        );
        background-image: -o-linear-gradient(
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 100%
        );
        background-image: linear-gradient(
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 100%
        );
        background-image: -ms-linear-gradient(
            rgba(255, 255, 255, 0) 0%,
            rgba(255, 255, 255, 1) 100%
        );
    }
    
    .userdata{
        margin-top: 40px;
    }
    
    .uinput{
        padding:10px;
    }
    
    .label-text{
        margin: 0px;
        font-size: 14px;
    }
    .float-left{
        float: left;
        margin-right: 12px;
    }
    .iwrapper {
        position: relative;
    }
    .fa-input-icon {
        position: absolute; top: 10px; left: 6px;
    }
    .icon-input{
        padding-left: 26px;
    }
    
    .fix-12{
        padding: 0px 10px;
    }
    
    .editbtn{
        width: 180px;
    }
    .require{
        color: red;
        font-size: 18px;
    }
    .input-group{
        margin: 6px 0px;
    }
    #uploadlabel-profilepic{
        
        font-size: 12px;
        text-align: left;
    }
    
    #profilepicker{
        padding: 6px 0px;
    }
    
    .custom-file{
        margin-left: -24px;
        padding: 10px 0px;
    }
    #outputimg img{
        border-radius: 10px;
        width: 100%;
        max-width: 260px;
    }
    
    
</style>

<link rel="stylesheet" href="css/style.css">






<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    
    if (strpos(getcwd(), 'user') !== false) {
      require '../dbconfig.php';
    }
    elseif (strpos(getcwd(), 'dynamic') !== false) {
      require 'dbconfig.php';
    }
    else{
      require 'dynamic/dbconfig.php';
    }
    
    if(!isset($_SESSION)){
      session_start();
    }
    
    $userprofile = $_GET["u"];
    
    $currentuser = $_SESSION["userid"];
    
    $sql = "SELECT id, uid, username, firstname, lastname, profilepic, affiliation, description, date, profession, city, state, country, twitter, github, linkedin, website
            FROM user WHERE uid = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $userprofile);
    $stmt->execute();
    
    $stmt->bind_result($data[0], $data[1], $data[2], $data[3], $data[4], $data[5], $data[6], $data[7], $data[8], $data[9], $data[10], $data[11], $data[12], $data[13], $data[14], $data[15], $data[16]);
    $stmt->fetch();
    
    if(($currentuser == $userprofile) && isset($_GET["edit"])){
?>

<div class="row">
    <div class="col-xs-12 col-sm-3 text-center">
        <div class="cssanimation sequence fadeInBottom">
        <div id="outputimg" class="row">
            <img width=230 id="profilepicture" class="img-profile rounded-frame" src="<?php echo $data[5]; ?>">
        </div>
        
        <div class="custom-file">
          <input id="profile-img" type="file" class="custom-file-input s3upload" aria-describedby="inputGroupFileAddon01" onchange="previewImage(this);">
          <label class="custom-file-label" for="profile-img">Choose File</label>
        </div>
        
        <div class="date date-pad d-none d-sm-block"><i class="fas fa-calendar"></i> Joined on <span class="datefield"><?php echo $data[8];?></span></div>
        </div>
    </div>

<div class="col-xs-12 col-sm-9">
    <h3>Edit User Information</h3>
    <br>
    <div class="row">
        <div class="col-12">
            <label class="label pe-form-field__label label-text required">User Name<font class="require">*</font></label>
            <input type="text" placeholder="User Name" maxlength="50" class="form-control" id="uname" value="<?php echo $data[2]; ?>">
            <input id="cuser" type="hidden" value="<?php echo $currentuser;?>">
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 uinput">
            <label class="label pe-form-field__label label-text required">First Name<font class="require">*</font></label>
            <input type="text" placeholder="First Name" maxlength="50" class="form-control" id="fname" value="<?php echo $data[3]; ?>">
        </div>
        <div class="col-xs-12 col-sm-6 uinput">
            <label class="pe-form-field__label label-text required">Last Name<font class="require">*</font></label>
            <input type="text" placeholder="Last Name" maxlength="50" class="form-control" id="lname" value="<?php echo $data[4]; ?>">
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-sm-6 uinput">
            <label class="label pe-form-field__label label-text required">Current Position</label>
            <input type="text" placeholder="Title" maxlength="50" class="form-control" id="cpos" value="<?php echo $data[9]; ?>">
        </div>
        <div class="col-xs-12 col-sm-6 uinput">
            <label class="pe-form-field__label label-text required">Affiliation</label>
            <input type="text" placeholder="Institution" maxlength="50" class="form-control" id="affi" value="<?php echo $data[6]; ?>">
        </div>
    </div>
    
    
    <div class="row">
        
        <div class="col-xs-12 col-sm-4 uinput">
            <label class="label pe-form-field__label label-text required">Country</label>
            <input id="countrycode" type="hidden" value="<?php echo $data[12]; ?>">
            <select id="countryselection" class="form-control country-select">
    <option disabled value> -- select country -- </option>
    <option value="US">United States</option>
    <option value="CN">China</option>
    <option value="GB">United Kingdom</option>
    <option value="RU">Russian Federation</option>
    <option value="IT">Italy</option>
    <option value="KR">Korea, Republic of</option>
    <option value="DE">Germany</option>
    <option value="ES">Spain</option>
    <option value="JP">Japan</option>
    <option value="FR">France</option>
    <option value="IL">Israel</option>
    <option disabled>_________</option>
    <option value="AF">Afghanistan</option>
    <option value="AX">Åland Islands</option>
    <option value="AL">Albania</option>
    <option value="DZ">Algeria</option>
    <option value="AS">American Samoa</option>
    <option value="AD">Andorra</option>
    <option value="AO">Angola</option>
    <option value="AI">Anguilla</option>
    <option value="AQ">Antarctica</option>
    <option value="AG">Antigua and Barbuda</option>
    <option value="AR">Argentina</option>
    <option value="AM">Armenia</option>
    <option value="AW">Aruba</option>
    <option value="AU">Australia</option>
    <option value="AT">Austria</option>
    <option value="AZ">Azerbaijan</option>
    <option value="BS">Bahamas</option>
    <option value="BH">Bahrain</option>
    <option value="BD">Bangladesh</option>
    <option value="BB">Barbados</option>
    <option value="BY">Belarus</option>
    <option value="BE">Belgium</option>
    <option value="BZ">Belize</option>
    <option value="BJ">Benin</option>
    <option value="BM">Bermuda</option>
    <option value="BT">Bhutan</option>
    <option value="BO">Bolivia, Plurinational State of</option>
    <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
    <option value="BA">Bosnia and Herzegovina</option>
    <option value="BW">Botswana</option>
    <option value="BV">Bouvet Island</option>
    <option value="BR">Brazil</option>
    <option value="IO">British Indian Ocean Territory</option>
    <option value="BN">Brunei Darussalam</option>
    <option value="BG">Bulgaria</option>
    <option value="BF">Burkina Faso</option>
    <option value="BI">Burundi</option>
    <option value="KH">Cambodia</option>
    <option value="CM">Cameroon</option>
    <option value="CA">Canada</option>
    <option value="CV">Cape Verde</option>
    <option value="KY">Cayman Islands</option>
    <option value="CF">Central African Republic</option>
    <option value="TD">Chad</option>
    <option value="CL">Chile</option>
    <option value="CX">Christmas Island</option>
    <option value="CC">Cocos (Keeling) Islands</option>
    <option value="CO">Colombia</option>
    <option value="KM">Comoros</option>
    <option value="CG">Congo</option>
    <option value="CD">Congo, the Democratic Republic of the</option>
    <option value="CK">Cook Islands</option>
    <option value="CR">Costa Rica</option>
    <option value="CI">Côte d'Ivoire</option>
    <option value="HR">Croatia</option>
    <option value="CU">Cuba</option>
    <option value="CW">Curaçao</option>
    <option value="CY">Cyprus</option>
    <option value="CZ">Czech Republic</option>
    <option value="DK">Denmark</option>
    <option value="DJ">Djibouti</option>
    <option value="DM">Dominica</option>
    <option value="DO">Dominican Republic</option>
    <option value="EC">Ecuador</option>
    <option value="EG">Egypt</option>
    <option value="SV">El Salvador</option>
    <option value="GQ">Equatorial Guinea</option>
    <option value="ER">Eritrea</option>
    <option value="EE">Estonia</option>
    <option value="ET">Ethiopia</option>
    <option value="FK">Falkland Islands (Malvinas)</option>
    <option value="FO">Faroe Islands</option>
    <option value="FJ">Fiji</option>
    <option value="FI">Finland</option>
    <option value="GF">French Guiana</option>
    <option value="PF">French Polynesia</option>
    <option value="TF">French Southern Territories</option>
    <option value="GA">Gabon</option>
    <option value="GM">Gambia</option>
    <option value="GE">Georgia</option>
    <option value="GH">Ghana</option>
    <option value="GI">Gibraltar</option>
    <option value="GR">Greece</option>
    <option value="GL">Greenland</option>
    <option value="GD">Grenada</option>
    <option value="GP">Guadeloupe</option>
    <option value="GU">Guam</option>
    <option value="GT">Guatemala</option>
    <option value="GG">Guernsey</option>
    <option value="GN">Guinea</option>
    <option value="GW">Guinea-Bissau</option>
    <option value="GY">Guyana</option>
    <option value="HT">Haiti</option>
    <option value="HM">Heard Island and McDonald Islands</option>
    <option value="VA">Holy See (Vatican City State)</option>
    <option value="HN">Honduras</option>
    <option value="HK">Hong Kong</option>
    <option value="HU">Hungary</option>
    <option value="IS">Iceland</option>
    <option value="IN">India</option>
    <option value="ID">Indonesia</option>
    <option value="IR">Iran, Islamic Republic of</option>
    <option value="IQ">Iraq</option>
    <option value="IE">Ireland</option>
    <option value="IM">Isle of Man</option>
    <option value="JM">Jamaica</option>
    <option value="JE">Jersey</option>
    <option value="JO">Jordan</option>
    <option value="KZ">Kazakhstan</option>
    <option value="KE">Kenya</option>
    <option value="KI">Kiribati</option>
    <option value="KP">Korea, Democratic People's Republic of</option>
    <option value="KW">Kuwait</option>
    <option value="KG">Kyrgyzstan</option>
    <option value="LA">Lao People's Democratic Republic</option>
    <option value="LV">Latvia</option>
    <option value="LB">Lebanon</option>
    <option value="LS">Lesotho</option>
    <option value="LR">Liberia</option>
    <option value="LY">Libya</option>
    <option value="LI">Liechtenstein</option>
    <option value="LT">Lithuania</option>
    <option value="LU">Luxembourg</option>
    <option value="MO">Macao</option>
    <option value="MK">Macedonia, the former Yugoslav Republic of</option>
    <option value="MG">Madagascar</option>
    <option value="MW">Malawi</option>
    <option value="MY">Malaysia</option>
    <option value="MV">Maldives</option>
    <option value="ML">Mali</option>
    <option value="MT">Malta</option>
    <option value="MH">Marshall Islands</option>
    <option value="MQ">Martinique</option>
    <option value="MR">Mauritania</option>
    <option value="MU">Mauritius</option>
    <option value="YT">Mayotte</option>
    <option value="MX">Mexico</option>
    <option value="FM">Micronesia, Federated States of</option>
    <option value="MD">Moldova, Republic of</option>
    <option value="MC">Monaco</option>
    <option value="MN">Mongolia</option>
    <option value="ME">Montenegro</option>
    <option value="MS">Montserrat</option>
    <option value="MA">Morocco</option>
    <option value="MZ">Mozambique</option>
    <option value="MM">Myanmar</option>
    <option value="NA">Namibia</option>
    <option value="NR">Nauru</option>
    <option value="NP">Nepal</option>
    <option value="NL">Netherlands</option>
    <option value="NC">New Caledonia</option>
    <option value="NZ">New Zealand</option>
    <option value="NI">Nicaragua</option>
    <option value="NE">Niger</option>
    <option value="NG">Nigeria</option>
    <option value="NU">Niue</option>
    <option value="NF">Norfolk Island</option>
    <option value="MP">Northern Mariana Islands</option>
    <option value="NO">Norway</option>
    <option value="OM">Oman</option>
    <option value="PK">Pakistan</option>
    <option value="PW">Palau</option>
    <option value="PS">Palestinian Territory, Occupied</option>
    <option value="PA">Panama</option>
    <option value="PG">Papua New Guinea</option>
    <option value="PY">Paraguay</option>
    <option value="PE">Peru</option>
    <option value="PH">Philippines</option>
    <option value="PN">Pitcairn</option>
    <option value="PL">Poland</option>
    <option value="PT">Portugal</option>
    <option value="PR">Puerto Rico</option>
    <option value="QA">Qatar</option>
    <option value="RE">Réunion</option>
    <option value="RO">Romania</option>
    <option value="RW">Rwanda</option>
    <option value="BL">Saint Barthélemy</option>
    <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
    <option value="KN">Saint Kitts and Nevis</option>
    <option value="LC">Saint Lucia</option>
    <option value="MF">Saint Martin (French part)</option>
    <option value="PM">Saint Pierre and Miquelon</option>
    <option value="VC">Saint Vincent and the Grenadines</option>
    <option value="WS">Samoa</option>
    <option value="SM">San Marino</option>
    <option value="ST">Sao Tome and Principe</option>
    <option value="SA">Saudi Arabia</option>
    <option value="SN">Senegal</option>
    <option value="RS">Serbia</option>
    <option value="SC">Seychelles</option>
    <option value="SL">Sierra Leone</option>
    <option value="SG">Singapore</option>
    <option value="SX">Sint Maarten (Dutch part)</option>
    <option value="SK">Slovakia</option>
    <option value="SI">Slovenia</option>
    <option value="SB">Solomon Islands</option>
    <option value="SO">Somalia</option>
    <option value="ZA">South Africa</option>
    <option value="GS">South Georgia and the South Sandwich Islands</option>
    <option value="SS">South Sudan</option>
    <option value="LK">Sri Lanka</option>
    <option value="SD">Sudan</option>
    <option value="SR">Suriname</option>
    <option value="SJ">Svalbard and Jan Mayen</option>
    <option value="SZ">Swaziland</option>
    <option value="SE">Sweden</option>
    <option value="CH">Switzerland</option>
    <option value="SY">Syrian Arab Republic</option>
    <option value="TW">Taiwan, Province of China</option>
    <option value="TJ">Tajikistan</option>
    <option value="TZ">Tanzania, United Republic of</option>
    <option value="TH">Thailand</option>
    <option value="TL">Timor-Leste</option>
    <option value="TG">Togo</option>
    <option value="TK">Tokelau</option>
    <option value="TO">Tonga</option>
    <option value="TT">Trinidad and Tobago</option>
    <option value="TN">Tunisia</option>
    <option value="TR">Turkey</option>
    <option value="TM">Turkmenistan</option>
    <option value="TC">Turks and Caicos Islands</option>
    <option value="TV">Tuvalu</option>
    <option value="UG">Uganda</option>
    <option value="UA">Ukraine</option>
    <option value="AE">United Arab Emirates</option>
    <option value="UM">United States Minor Outlying Islands</option>
    <option value="UY">Uruguay</option>
    <option value="UZ">Uzbekistan</option>
    <option value="VU">Vanuatu</option>
    <option value="VE">Venezuela, Bolivarian Republic of</option>
    <option value="VN">Viet Nam</option>
    <option value="VG">Virgin Islands, British</option>
    <option value="VI">Virgin Islands, U.S.</option>
    <option value="WF">Wallis and Futuna</option>
    <option value="EH">Western Sahara</option>
    <option value="YE">Yemen</option>
    <option value="ZM">Zambia</option>
    <option value="ZW">Zimbabwe</option>
</select>

        </div>
        <div class="col-xs-12 col-sm-4 uinput">
            <label class="pe-form-field__label label-text required">State</label>
            <input type="text" placeholder="State" maxlength="50" class="form-control" id="state" value="<?php echo $data[11]; ?>">
        </div>
        <div class="col-xs-12 col-sm-4 uinput">
            <label class="pe-form-field__label label-text required">City</label>
            <input type="text" placeholder="City" maxlength="50" class="form-control" id="city" value="<?php echo $data[10]; ?>">
        </div>
    </div>
    
    <div class="row">
        <div class="col-12 uinput">
            <label class="label pe-form-field__label label-text required">Biography</label>
            <textarea type="text" placeholder="Description of research interests" maxlength="2000" class="form-control" id="bio"><?php echo $data[7]; ?></textarea>
        </div>
    </div>
    
    <div class="row">
        <div class="col-xs-12 col-md-4 uinput">
            <label class="label pe-form-field__label label-text required">GitHub URL</label>
            <div class="iwrapper">
                <i class="fab fa-github fa-input-icon"></i>
                <input type="text" placeholder="Profile URL" maxlength="100" class="form-control icon-input" id="github" value="<?php echo $data[14]; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-md-4 uinput">
            <label class="label pe-form-field__label label-text required">LinkedIn URL</label>
            <div class="iwrapper">
                <i class="fab fa-linkedin fa-input-icon"></i>
                <input type="text" placeholder="Profile URL" maxlength="100" class="form-control icon-input" id="linkedin" value="<?php echo $data[15]; ?>">
            </div>
        </div>
        <div class="col-xs-12 col-md-4 uinput">
            <label class="label pe-form-field__label label-text required">Twitter URL</label>
            <div class="iwrapper">
                <i class="fab fa-twitter fa-input-icon"></i>
                <input type="text" placeholder="Profile URL" maxlength="100" class="form-control icon-input" id="twitter" value="<?php echo $data[13]; ?>">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col fix-12">
            <label class="label pe-form-field__label label-text required">Website URL</label>
            <div class="iwrapper">
                <i class="fas fa-globe fa-input-icon"></i>
                <input type="text" placeholder="Website URL" maxlength="100" class="form-control icon-input" id="website" value="<?php echo $data[16]; ?>">
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col fix-12 text-right">
            <hr>
            
            <button target="profile-img" class="btn btn-primary s3btn" after="updateuser();">Save</button>
        
        </div>
    </div>
    
</div>
</div>

<?php
}
else{
?>

      <div class="row">
        <div class="col-xs-12 col-sm-3 text-center">
            <div class="cssanimation sequence fadeInBottom">
            <img width=230 id="profilepicture" class="img-profile rounded-frame" src="<?php echo $data[5]; ?>">
            <div class="date date-pad d-none d-sm-block"><i class="fas fa-calendar"></i> Joined on <span class="datefield"><?php echo $data[8];?></span></div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-9">
            <div class="username"><?php echo $data[2];?></div>
            <div class="realname"><?php echo $data[3];?> <?php echo $data[4];?></div>
            <div class="date d-sm-none"><i class="fas fa-calendar"></i> Joined on <span class="datefield"><?php echo $data[8];?></span></div>
            
            
            <div class="socialmedia row">
                <div class="col">
                    
                    <?php 
                    if(strlen($data[13]) > 1){
                    ?>
                    <div class="twitter logo">
                        <a href="<?php echo $data[13];?>" target="_blank"><i class="fab fa-twitter"></i></a>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if(strlen($data[15]) > 1){
                    ?>
                    <div class="linkedin logo">
                        <a href="<?php echo $data[15];?>" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if(strlen($data[14]) > 1){
                    ?>
                    <div class="github logo">
                        <a href="<?php echo $data[14];?>" target="_blank"><i class="fab fa-github"></i></a>
                    </div>
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if(strlen($data[16]) > 1){
                    ?>
                    <div class="website">
                        <a href="<?php echo $data[16];?>" target="_blank"><?php echo $data[16];?></a>
                    </div>
                    <?php
                    }
                    ?>
                    
                </div>
            </div>
            
            <?php 
            if(strlen($data[9]) > 1){
            ?>
            <div class="profession"><?php echo $data[9];?></div>
            <?php
            }
            ?>
            
            <?php 
            if(strlen($data[6]) > 1){
            ?>
            <div class="affiliation">@ <?php echo $data[6];?></div>
            <?php
            }
            ?>
            
            <?php 
            if(strlen($data[12]) > 1){
            ?>
            <div class="location"><img class="flagimg" src="images/flags/4x3/<?php echo strtolower($data[12]);?>.svg"><?php echo $data[10];?>, <?php echo $data[11];?>, <?php echo $data[12];?></div>
            <?php
            }
            ?>
            <div class="biography view slide"><h3>About</h3><?php echo $data[7];?><div class="fadeout"></div></div>
            <?php 
            if(strlen($data[7]) > 1){
            ?>
            
            <?php
            }
            ?>
            
            <?php
            if($userprofile == $_SESSION["userid"]){
                echo "<div class=\"follow\"><button onclick=\"editprofile();\" class=\"btn btn-primary editbtn\" type=\"button\"><i class=\"fas fa-edit\"></i> Edit Profile</button></div>";
            }
            else{
                echo "<div class=\"follow\"><button class=\"btn btn-primary followbtn\" type=\"button\">+ Follow</button></div>";
            }
            ?>
        </div>
</div>

<?php include "dynamic/user/following.php"; ?>

<div class="row">

    <div class="col-12 userdata">
      <div class="tabs-menu">
        <input type="radio" id="tab1" name="tab-control">
        <input type="radio" id="tab2" name="tab-control" checked>
        <input type="radio" id="tab3" name="tab-control">
        <ul class="ullist">
          <li title="Methods" class="menuli"> <label for="tab1" role="button"><i class="fas fa-chart-area"></i> <span>Methods</span></label></li>
          <li title="Predictions" class="menuli"><label for="tab2" role="button"><i class="fas fa-lightbulb"></i> <span>Predictions</span></label></li>
          <li title="Datasets" class="menuli"><label for="tab3" role="button"><i class="fas fa-database"></i> <span>Datasets</span></label></li>
        </ul>
        <div class="slider">
            <div class="indicator"></div>
        </div>
        
        <div class="content content-sub">
          <section>
            <h2>Methods</h2>
            <?php include "user/listmethods.php"; ?>
          </section>
          <section>
            <h2>Predictions</h2>
            <?php include "user/listpredictions.php"; ?>
          </section>
          <section>
            <h2>Datasets</h2>
            <?php include "user/listdatasets.php"; ?>
          </section>
        </div>
        
    </div>
  </div>

</div>

<?php
}

?>



