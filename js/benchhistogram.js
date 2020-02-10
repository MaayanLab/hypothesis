$( document ).ready(function() {
    $.post("dynamic/api/getprediction.php?domain=phenotype", function(data){
      drawD3(data);
    });
});

function drawD3(data) {
    $("#d3content").html("");
    var scores = [];
    var names = [];
    var rank = [];
    var pid = [];
    var user = [];
    var info = [];
    var date = [];
    var pics = [];
    
    data = JSON.parse(data);
    
    data["predictions"].forEach(function(element){
      names.push(element["name"]);
      scores.push(element["score"]);
      pid.push(element["key"]);
      user.push(element["username"]);
      date.push(element["date"]);
      pics.push(element["userpicture"]);
    });
    
    
    var tooltip = d3.select("body").append("div").attr("class", "toolTip");
    
    var margin = { top: 10, right: 10, bottom: 20, left: 30 }
        , width = 1000 - margin.left - margin.right // Use the window's width 
        , height = 160 - margin.top - margin.bottom; // Use the window's height

    // 1. Add the SVG to the page and employ #2
    var svg = d3.select("#d3content").append("svg")
        .attr("id", "svg_bars")
        .attr("viewBox", "0 0 1000 160")
        .attr("width", width + margin.left + margin.right)
        .attr("height", height + margin.top + margin.bottom)
        .append("g")
        .attr("transform", "translate(" + margin.left + "," + margin.top + ")");
    
    var barscale = height/(1+Math.max.apply(Math, scores));
    
    var barwidth = width/scores.length;
    
    for (var i = 0; i < scores.length; i++) {
        var startLine = i * barwidth
        var endLine = (i + 1) * barwidth+1
        
        var bar = svg.append("rect")
            .attr("class", "bar")
            .attr("id", "rank"+(i+1))
            .attr("x", startLine)
            .attr("y", height)
            .attr("width", barwidth)
            .attr("height", 0)
            .attr('fill', 'dodgerblue')
            .style("stroke-width", 1)
            .style("stroke", "#000000")
            .on("mouseover", function(){
                index = this.getAttribute("id").replace("rank", "")-1;
                var rect = this.getBoundingClientRect();
                
                tooltip
                  .style("display", "inline-block")
                  .html("<div class=\"row\"><div class=\"col-3\"><img src=\"images/speedometer.svg\" width=36><span class=\"score\">"+scores[index]+"</span></div><div class=\"col-9\">"+names[index]+"<br><div class=\"innerToolTip\"><img width=35 src=\""+pics[index]+"\" class=\"round-img profile-pic\"> <span class=\"small\">"+user[index]+"</span></div></div></div>")
                  .transition()
                    .delay(0)
                    .duration(100)
                    .style("opacity",1)
                    .style('pointer-events', 'none')
                  .transition()
                    .delay(0)
                    .duration(400)
                    .style("left", rect.left - 50 + "px")
                    .style("top", window.pageYOffset + rect.top -100 + "px");
        
            })
            .on("mouseout", function(){ 
                //tooltip.style("display", "none");}
                tooltip.transition()
                    .delay(0)
                    .duration(300)
                    .style("opacity",0)
                    .style('pointer-events', 'none');
             
            });
        
        console.log(startLine, endLine, barscale);
        var transition = bar.transition().duration(200);
        transition.delay(200).attr("y", height - scores[i]*barscale).attr("height", scores[i]*barscale);
    }
    
    svg.append("line")          // attach a line
        .style("stroke", "black")  // colour the line
        .attr("stroke-width", 3)
        .attr("x1", 0)     // x position of the first end of the line
        .attr("y1", height)      // y position of the first end of the line
        .attr("x2", barwidth*scores.length)     // x position of the second end of the line
        .attr("y2", height);
    
    svg.append("line")          // attach a line
        .style("stroke", "black")  // colour the line
        .attr("stroke-width", 3)
        .attr("x1", -15)     // x position of the first end of the line
        .attr("y1", 0)      // y position of the first end of the line
        .attr("x2", -15)     // x position of the second end of the line
        .attr("y2", height);

    svg.append("line")          // attach a line
        .style("stroke", "black")  // colour the line
        .attr("stroke-width", 3)
        .attr("x1", -20)     // x position of the first end of the line
        .attr("y1", 0)      // y position of the first end of the line
        .attr("x2", -10)     // x position of the second end of the line
        .attr("y2", 0);

    svg.append("line")          // attach a line
        .style("stroke", "black")  // colour the line
        .attr("stroke-width", 3)
        .attr("x1", -20)     // x position of the first end of the line
        .attr("y1", height)      // y position of the first end of the line
        .attr("x2", -10)     // x position of the second end of the line
        .attr("y2", height);

    svg.append("text")
        .style("text-anchor", "middle")
        .style("font", "18px arial")
        .text("score")
        .attr("transform", function(d) {
            return "rotate(-90)" 
        })
        .attr("y", -20)
        .attr("x", -65);
}





