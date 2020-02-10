
<style>
    .col-fixed {
        position:relative;
        min-height:1px;
        padding-right:15px;
        padding-left:15px;
        float:left;
        width:100%;
        padding: 10px;
    }
    .col-fluid { position:relative;
        min-height:1px;
        padding-right:15px;
        padding-left:15px;
        float:left;
        width:100%;
    }
    .contact{
        padding-top: 5px;
        padding-bottom: 5px;
    }
    .contact:hover{
        background-color: #eeeeee;
        cursor: pointer;
    }
    .contact:active{
        background-color: #dddddd;
    }
    
    .newsfeed{
        padding: 30px;
        padding-top: 6px;
        border: none;
        padding-bottom: 0px;
    }
    
    .message_body{
        padding: 10px;
        padding-bottom: 0px;
    }
    
    #newsfeedcontent{
        max-width: 1800px !important;
    }
    
    .newsfeed .username{
        font-weight: bold;
        font-size: 14px;
    }
    
    .grey{
        color: lightgrey;
        float: right;
        margin-top: 4px;
    }
    
    .compose_message{
        margin-left: 5px;
        margin-bottom: 14px;
    }
    
    .compose_message .compose_body{
        padding: 10px;
    }
    
    .message_entry{
        margin-top: -26px;
    }
    
    .message_title{
        margin-bottom: 12px;
        font-weight: bold;
    }
    
    .message_recipient{
        margin-top: 24px;
        margin-bottom: 8px;
        pointer-events: none;
    }
    
    .fillrow{
        width: 100%;
    }
    
    .message_filter{
        font-size: 12px !important;
        float: left;
        margin-right: 4px;
        margin-bottom: 4px;
    }
    
    .pulse{
        animation: shadow-pulse 0.6s 1;
    }
    
    .sent{
        background-color: #ddffdd;
        margin-left: 60px;
    }
    
    .form_warning{
        margin-top: 8px;
        margin-bottom: 0px;
        padding:10px;
    }
    
    .removebtn{
        cursor: pointer;
    }
    
    @media (min-width: 768px) and (max-width: 992px) {
        .col-fixed { width:180px; }
        .col-fluid { width:calc(100% - 180px);}
    }
     
    @media (min-width: 992px) and (max-width: 1199px) {
        .col-fixed { width:180px; }
        .col-fluid { width:calc(100% - 180px);}
    }
     
    @media (min-width: 1200px) {
        .col-fixed { width:180px; }
        .col-fluid { width:calc(100% - 180px);}
    }
    
    @keyframes shadow-pulse{
        0% {
          box-shadow: 0 0 0 0px rgba(0, 0, 0, 0.2);
        }
        100% {
          box-shadow: 0 0 0 15px rgba(0, 0, 0, 0);
        }
    }
    
    .input-container {
      display: flex;
      width: 100%;
      margin-bottom: 15px;
    }

    /* Style the form icons */
    .profile {
      padding: 0px;
      color: grey;
      height: 34px;
      width: 40px;
      text-align: center;
      margin-top: 26px;
    }

    /* Style the input fields */
    .input-field {
      width: 100%;
      padding: 10px;
      outline: none;
      background-color: white !important;
    }

    .input-field:focus {
      border: 2px solid dodgerblue;
    }
    * {box-sizing: border-box;}

    #contactlist{
        
    }
    
    #waiting{
    }
    
    #searchresults{
    }
    
    .mail{
        max-height: 110px;
    }
    .compose_body{
        padding-top: 10px;
    }
    #showmessagecontainer{
        padding-top: 50px;
        height: 100vh - 100px;
    }
    .contact-col{
        border-right: 1px solid lightgrey;
    }
    .newsfeed{
        margin-top: 10px;
        margin-left: -10px;
    }
</style>

            
            <div class="row">
                
                <div class="col-auto contact-col">
                    <div id="listcontactscontainer" class="col-fixed d-md-inline-block d-none" style="height: 100%;">
                        <?php include "messaging/listcontacts.php"; ?>
                    </div>
                </div>
                
                
                <div class="col flex-grow">
                
                    <div class="col-12 compose_body" id="create_message">
                        <h6>Compose Message</h6>
                        <form>
                        
                        <div class="row">
                            <div class="col-3 vis_focus">
                                
                                <div id="recipient_c" class="input-container">
                                    <div class="profile" id="profile"><i class="fa fa-user icon"></i></div>
                                    <input type="text" class="input-field form-control bg-light border-0 small message_recipient" id="recipient" placeholder="Select recipient in friend list" aria-label="recipient" aria-describedby="basic-addon2">
                                </div>
                                
                                <?php
                                    if(!isset($_SESSION)){
                                      session_start();
                                    }
                                    
                                    echo "<input type=\"hidden\" id=\"userid\" value=\"".$_SESSION["userid"]."\">";
                                ?>
                                
                                <input type="hidden" id="recipient_id" value="">
                                
                                <button class="btn btn-primary fillrow" type="button" onclick="sendMessage()">
                                  Send
                                  <i class="fas fa-envelope"></i>
                                </button>
                                
                            </div>
                            <div class="col-sm-9 col-md-9 col-lg-9 message_entry">
                                <input type="text" class="form-control bg-light border-0 small message_title" id="mtitle" placeholder="Title" aria-label="Title" aria-describedby="basic-addon2">
                                <textarea id="form10" class="md-textarea form-control bg-light border-0 small  vis_focus" rows="3" placeholder="What's on your mind?"></textarea>
                            </div>
                        </div>
                        </form>
                    </div>
                    <div id="showmessagecontainer" class="compose_body col-12">
                        <?php include "messaging/showmessages.php"; ?>
                    </div>
                
                </div>
            </div>



