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
                // Set up Person Objects
            var person = [
                {name: "Carla Pratt", position: "Business Owner", relationship: "Manager", email: "carla@prattlandmusic.com"},
                {name: "Robin Brunner", position: "Computer Science Teacher", relationship: "Co-worker", email: "rbrunner@alpinedistrict.org"},
                {name: "Barbara Nelson", position: "1st Grade Teacher", relationship: "Co-worker", email: "barbaranelson@alpinedistrict.org"}
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
            
            // Keep Copyright in footer as current year.
            let copyrightyear = new Date().getFullYear()
            document.getElementById("copyrightyear").innerHTML = copyrightyear;