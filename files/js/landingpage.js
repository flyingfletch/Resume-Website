// Name Greeting for the "Who are you?!" button in the Navbar.
function nameInput() {
    let person = prompt("Please enter your name");
    var welcome;
        var date = new Date();
        var hour = date.getHours();
        if (hour >=5 && hour < 12) {  
            welcome = "Good morning ";  
        } 
        else if (hour >=12 && hour < 18) {  
            welcome = "Good afternoon ";  
        } 
        else if (hour >=18 && hour < 22) {  
            welcome = "Good evening ";  
        } 
        else {
            welcome = "Hello Child of Darkness ";
        }
    alert(welcome + person + "! Thank you for visiting my site!");
}

// For Loop References
    var person = [
        {name: "Carla Pratt", position: "Business Owner", relationship: "Manager", email: "carla@prattlandmusic.com"},
        {name: "Rebekah Lindsley", position: "Voice Teacher", relationship: "Co-worker", email: "rslindsley@gmail.com"},
        {name: "Rachel Mingorance", position: "Office Manager", relationship: "Co-worker", email: "rachelmatprattland@gmail.com"},
        {name: "Robin Brunner", position: "Computer Science Teacher", relationship: "Co-worker", email: "rbrunner@alpinedistrict.org"}
    ];
    refTable(person)
    function refTable(data){
        var table = document.getElementById('refList')
        for (var i = 0; i < data.length; i++) {
            var row = "<tr><td>" + data[i].name + 
                        "</td><td>" + data[i].position + 
                        "</td><td>" + data[i].relationship + 
                        "</td><td>" + data[i].email +
                        "</td></tr>";
            table.innerHTML += row 
        }
    }

// Favorite Activity Validation with jQuery
    function favAct() {
        try {
            var actErr = "";
            var newText = document.getElementById("activity").value;
            if (newText === "") {
                actErr = "Response Required!";
            }
            else if (newText === " ") {
                actErr = "Come on! There must be something you like..."
            }
            else {
                document.getElementById("actResp").innerHTML = newText + " sounds fun!"
            }
            document.getElementById('errorAct').innerHTML = actErr;
        }
        catch (error) {
            document.getElementById("actResp").innerHTML = "Incorrect Input: <b>" + error + "</b>";
        }
    }

// Switch Statement for Day of the Week- Placed in Help Modal
    var day;
    var extraday;
    switch (new Date().getDay()) {
        case 0:
            day = "Sunday.";
            extraday = " Oh how I love second Saturday!";
            break;
        case 1: 
            day = "Monday.";
            extraday = " Back to work!";
            break;
        case 2: 
            day = "Tuesday.";
            extraday = " Twoooooosday!";
            break;
        case 3: 
            day = "Wednesday.";
            extraday = " Hump day baby!";
            break;
        case 4:
            day = "Thursday.";
            extraday = " Worst day of the week!";
            break;
        case 5:
            day = "Friday.";
            extraday = " Thank goodness it is Friday!";
        case 6: 
            day = "Saturday.";
            extraday = " Time for a nap!";
    }
    document.getElementById("dayModal").innerHTML = "Today is " + day + extraday;
            
// Show/Hide extra hobby content with click event.
     $(document).ready(function() {
        $("#hobbies").css({color: "black", border: "2px solid black"});
        // Toggles the selected element's visibility on button click
        $("button#btnToggle").click(function() {
            $("#hobbies").toggle();
        });
     });       

// Keep Copyright in footer as current year.
    let copyrightyear = new Date().getFullYear()
    document.getElementById("copyrightyear").innerHTML = copyrightyear;