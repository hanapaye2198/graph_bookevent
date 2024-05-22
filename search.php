<?php
@include 'header.php';
@include 'conn.php'; ?>
<style>
     .dropdown {
          position: relative;
          display: inline-block;
     }

     .search-input {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          margin-bottom: 5px;
     }

     #myDropdown {
          width: 100%;
          padding: 10px;
          border: 1px solid #ccc;
          border-radius: 5px;
          background-color: #fff;
          position: absolute;
          top: 100%;
          left: 0;
          z-index: 999;
          display: none;
     }

     #myDropdown option {
          padding: 10px;
          border-bottom: 1px solid #ccc;
     }

     #myDropdown option:hover {
          background-color: #f1f1f1;
     }

     .show {
          display: block;
     }
</style>

<body>
     <h1>Search</h1>
     <div class="dropdown">
          <input type="text" class="search-input" placeholder="Search...">
          <select id="myDropdown">
               <option value="">Select an option</option>
               <option value="option">ASdjiakljd 1</option>
               <option value="option">asdasdasd 2</option>
               <option value="option">asdasd 3</option>
               <option value="option">asd 4</option>
               <option value="option">asd 5</option>
          </select>
     </div>
</body>
<script>
     // Get the elements
     var dropdown = document.getElementById("myDropdown");
     var searchInput = document.querySelector(".search-input");

     // Add event listener to the search input
     searchInput.addEventListener("input", function() {
          var filter = searchInput.value.toLowerCase();
          var options = dropdown.getElementsByTagName("option");

          // Loop through all the options and hide those that don't match the search input
          for (var i = 0; i < options.length; i++) {
               var text = options[i].text.toLowerCase();
               if (text.indexOf(filter) > -1) {
                    options[i].style.display = "";
               } else {
                    options[i].style.display = "none";
               }
          }
     });

     // Add event listener to the select element
     dropdown.addEventListener("click", function() {
          this.classList.toggle("show");
     });

     // Close the dropdown if the user clicks outside of it
     window.addEventListener("click", function(event) {
          if (!event.target.matches("#myDropdown")) {
               dropdown.classList.remove("show");
          }
     });
</script>