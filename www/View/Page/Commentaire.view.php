<div class="containercom">
    <div class="tittle">Anime Only</div>

<div class="boutton">
          <button id="myBtn" class="button">
          Filter
        </button>
        <!-- The Modal -->
        <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-contente">
        <span class="close">&times;</span>
          <p class="modal-button-filter">Filter</p>
          <div class="filter-content-genre"> 
            <p>Shojo</p>
            <p>Seinen</p>
            <p>Shonen</p>
            <p>Kodomo</p>
            <p>Anime</p>
            <p>Tendance</p>
          </div>
          <p class="modal-button-filter">Période</p>
          <div class="filter-content-time"> 
            <button>All Time</button>
            <button>15d</button>
            <button>1m</button>
            <button>3m</button>
            <button>3m</button>
            <button>6m</button>
            <button>1y</button>
            <button>1y</button>
            <button>2y</button>
            <button>3y</button>
          </div>

          <p class="modal-button-filter">Période Personnalisé</p>
          <div class="filter-content-timep"> 
         <div class="flexv">
           <p>Du </p><input type="time">
          </div>    
          <div class="flexv">
           <p>Au </p><input type="time">   
          </div>

          </div>
          <footer class="modal-button-but">
          <button class="button_style"><img id="logo-site" src="../Public/img/cros.svg" />
</button>
<button class="button_style"><img id="logo-site" src="../Public/img/plus.svg" />
</button>
</footer>
        </div>

        </div>
          <button class="button">
            Date
          </button>
          <button class="button">
            Mots Bannis
          </button>
      </div>



<div class="comments">

    <div class="bloque ">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum." </br> de @Jeanne</div>

    <div class="bloque">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. 
        Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</br> de @Alex</div>

    <div class="bloque">"Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.
         Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum."</br> de @jules</div>

        
</div>
<div>

<script>
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("myBtn");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
console.log("test");
</script>
