$( document ).ready(function() {
   fixdates();
   fixfiles();
   
    document.querySelectorAll('.ascroll').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();

            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
   
   $('#predicttable').DataTable({
        columnDefs: [ {
                orderable: false,
                targets:   0
            },
            {width: "30px", targets: 0 }
         ],
        order: [[ 0, "asc" ]],
        dom: 'frtipB'
   });
   
   //retrieveColor();
   updateActiveHeader();
    $('.count').each(function () {
        
        $(this).prop('Counter',0).animate({
            Counter: $(this).text()
        }, {
            duration: 500,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });
    
    if($("#countrycode").length){
      if($("#countrycode").val().length == 2){
          var countrycode = $("#countrycode").val();
          $("#countryselection option[value="+countrycode+"]").attr('selected','selected');
      }
    }
});

function fixdates(){
     $( ".datefield" ).each(function( index ) {
        var options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        var thedate  = new Date($( this ).html());
        var thedate = new Date(thedate.getTime()-thedate.getTimezoneOffset()*60*1000);
        
        $( this ).html(thedate.toLocaleString("en-US"));
    });
     
}

function fixfiles(){
     $( ".filesize" ).each(function( index ) {
        $( this ).html(humanFileSize($( this ).html(), true));
    });
}

function retrieveColor(){
    
    var img = document.getElementById("profilepicture");
    
    if(typeof(img) != 'undefined' && img != null){
            var vibrant = new Vibrant(img);
            var swatches = vibrant.swatches();
            for (var swatch in swatches){
                if (swatches.hasOwnProperty(swatch) && swatches[swatch]){
                    console.log(swatch, swatches[swatch].getHex());
                }
            }
            
            $(".username").first().css("color", swatches["Vibrant"].getHex());
            
            /*
             * Results into:
             * Vibrant #7a4426
             * Muted #7b9eae
             * DarkVibrant #348945
             * DarkMuted #141414
             * LightVibrant #f3ccb4
             */
    }
}

var $divView = $('div.view');
var innerHeight = $divView.removeClass('view').height();
$divView.addClass('view');
  
$('.slide').click(function() {
    $('.fadeout').toggle();
    $('div.view').animate({
      height: (($divView.height() == 120)? innerHeight  : "120px")
    }, 100);
    return false;
});

//$('.country-select').find("option").each(function( index ) {
    //$( this ).attr("data-thumbnail", "images/flags/4x3/"+$( this ).val()+".svg");
    //$( this ).html( "<img width=20 src=\"images/flags/4x3/"+$( this ).val()+".svg\">"+$( this ).html());
//});

function editprofile(){
    location.href = location.href + "&edit=1";
}

function updateActiveHeader(){
    var activeloc = findGetParameter("nav");
    $(".nav-item").each(function (index){
        $(this).removeClass("active");
    });
    if(activeloc == null){
        $("#home_link").addClass("active");
    }
    $("#"+activeloc+"_link").addClass("active");
}

function findGetParameter(parameterName) {
    var result = null,
        tmp = [];
    location.search
        .substr(1)
        .split("&")
        .forEach(function (item) {
          tmp = item.split("=");
          if (tmp[0] === parameterName) result = decodeURIComponent(tmp[1]);
        });
    return result;
}

