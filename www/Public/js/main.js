$().ready(function (){

  $('#menu-button').on('click', function(){
    var menu = document.getElementById('main-nav');
    menu.classList.toggle("visible");
  })
  $('.dropdownMenu').on('click', function(){
    console.log("ouverture du menu");
    var dropdown = document.getElementById("myDropdownMenu");
    dropdown.classList.toggle("show");
  })

  $('#close-flash').on('click', function(){
    var flash = document.getElementById('flash-msg');
    var container = document.getElementById('row-nav-main');
    container.removeChild(flash);
  })
  setTimeout(function() { 
    var flash = document.getElementById('flash-msg');
    var container = document.getElementById('row-nav-main');
    container.removeChild(flash);
  }, 7000);
  
  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtnMenu')) {
      var dropdowns = document.getElementsByClassName("dropdownMenu-content");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }

  dragAndDrop(document.getElementById('drag-container'))
    window.onclick = function(event) {
        var modal = $('.modal')
        if (event.target.className == 'modal') {
            $('.input-page').remove();
            modal.css('display',"none");
          
        }
    }

});

function dropdown() {
  var dropdown = $(".menu-page-dropdown");
  if(dropdown.css('display') == "none"){
      dropdown.css('display','flex')
  }else{
      dropdown.css('display','none')
  }
}

function dragAndDrop (target) {
  let items = target.getElementsByClassName("pages"), current = null;

  // (B) MAKE ITEMS DRAGGABLE + SORTABLE
  for (let i of items) {
    // (B1) ATTACH DRAGGABLE
    i.draggable = true;

    // (B2) DRAG START - YELLOW HIGHLIGHT DROPZONES
    i.ondragstart = (ev) => {
      current = i;
      for (let it of items) {
        if (it != current) { it.classList.add("hint"); }
      }
    };

    // (B3) DRAG ENTER - RED HIGHLIGHT DROPZONE
    i.ondragenter = (ev) => {
      if (i != current) { i.classList.add("active"); }
    };

    // (B4) DRAG LEAVE - REMOVE RED HIGHLIGHT
    i.ondragleave = () => {
      i.classList.remove("active");
    };

    // (B5) DRAG END - REMOVE ALL HIGHLIGHTS
    i.ondragend = () => { for (let it of items) {
      it.classList.remove("hint");
      it.classList.remove("active");
    }};

    // (B6) DRAG OVER - PREVENT THE DEFAULT "DROP", SO WE CAN DO OUR OWN
    i.ondragover = (evt) => { evt.preventDefault(); };

    // (B7) ON DROP - DO SOMETHING
    i.ondrop = (evt) => {
      evt.preventDefault();
      if (i != current) {
        let currentpos = 0, droppedpos = 0;
        for (let it=0; it<items.length; it++) {
          if (current == items[it]) { currentpos = it; }
          if (i == items[it]) { droppedpos = it; }
        }
        if (currentpos < droppedpos) {
          i.parentNode.insertBefore(current, i.nextSibling);
        } else {
          i.parentNode.insertBefore(current, i);
        }
      }
    };
  }
}