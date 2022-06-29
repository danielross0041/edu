//editor.document.designMode = "On";



function transform(option, argument) {

  editor.document.execCommand(option, false, argument);

}



function myFunction() {

  var dots = document.getElementById("dots");

  var moreText = document.getElementById("more");

  var btnText = document.getElementById("myBtn");



  if (dots.style.display === "none") {

    dots.style.display = "inline";

    btnText.innerHTML = "show"; 

    moreText.style.display = "none";

  } else {

    dots.style.display = "none";

    btnText.innerHTML = "less"; 

    moreText.style.display = "inline";

  }

}



$('.responsive').slick({

  dots: true,

  infinite: true,

  speed: 300,

  slidesToShow: 4,

  slidesToScroll: 4,

  responsive: [

    {

      breakpoint: 1024,

      settings: {

        slidesToShow: 3,

        slidesToScroll: 3,

        infinite: true,

        dots: true

      }

    },

    {

      breakpoint: 600,

      settings: {

        slidesToShow: 2,

        slidesToScroll: 2

      }

    },

    {

      breakpoint: 480,

      settings: {

        slidesToShow: 1,

        slidesToScroll: 1

      }

    }

    // You can unslick at a given breakpoint now by adding:

    // settings: "unslick"

    // instead of a settings object

  ]

});







function openCity(evt, cityName) {

  // Declare all variables

  var i, tabcontent, tablinks;



  // Get all elements with class="tabcontent" and hide them

  tabcontent = document.getElementsByClassName("tabcontent");

  for (i = 0; i < tabcontent.length; i++) {

    tabcontent[i].style.display = "none";

  }



  // Get all elements with class="tablinks" and remove the class "active"

  tablinks = document.getElementsByClassName("tablinks");

  for (i = 0; i < tablinks.length; i++) {

    tablinks[i].className = tablinks[i].className.replace(" active", "");

  }



  // Show the current tab, and add an "active" class to the button that opened the tab

  document.getElementById(cityName).style.display = "block";

  evt.currentTarget.className += " active";

}





var acc = document.getElementsByClassName("accordion");

var i;



for (i = 0; i < acc.length; i++) {

  acc[i].addEventListener("click", function() {

    this.classList.toggle("active");

    var panel = this.nextElementSibling;

    if (panel.style.maxHeight) {

      panel.style.maxHeight = null;

    } else {

      panel.style.maxHeight = panel.scrollHeight + "px";

    }

  });

}







/* When the user clicks on the button, 

toggle between hiding and showing the dropdown content */

$(".dropbtn").click(function(){

  var drp = $(this).closest(".dropdown").find(".myDropdown")



  if( drp.css('display') == 'block'){

    drp.hide();

  }

  else{

    drp.show();

  }



}) 



// Close the dropdown if the user clicks outside of it

window.onclick = function(event) {

  if (!event.target.matches('.dropbtn')) {

    var dropdowns = document.getElementsByClassName("dropdown-content");

    var i;

    for (i = 0; i < dropdowns.length; i++) {

      var openDropdown = dropdowns[i];

      if (openDropdown.classList.contains('show')) {

        openDropdown.classList.remove('show');

      }

    }

  }

}









window.console = window.console || function(t) {};

 if (document.location.search.match(/type=embed/gi)) {

    window.parent.postMessage("resize", "*");

  }





// Gallery

// 



$(document).ready(function(){



    $(".filter-button").click(function(){

        var value = $(this).attr('data-filter');

        

        if(value == "all")

        {

            //$('.filter').removeClass('hidden');

            $('.filter').show('1000');

        }

        else

        {

//            $('.filter[filter-item="'+value+'"]').removeClass('hidden');

//            $(".filter").not('.filter[filter-item="'+value+'"]').addClass('hidden');

            $(".filter").not('.'+value).hide('3000');

            $('.filter').filter('.'+value).show('3000');

            

        }

    });

    

    if ($(".filter-button").removeClass("active")) {

$(this).removeClass("active");

}

$(this).addClass("active");



});

//COUNT WORDS IN TEXTAREA
function countChar(val) {
  var len = val.value.length;
    $('#charNum').text(len);
  //}
};


jQuery(document).ready(function($){
   $(".btnrating").click(function(){
    var data = $(this).data("attr")
    
    $(this).closest(".rating-ability-wrapper").find("input").val(data)
    $(this).closest(".rating-ability-wrapper").find(".btnrating").removeClass("btn-warning")
    $(this).addClass("btn-warning")
    
});

//PICK VALUE FOR STAR RATING
$('.star').fontstar({},function(value,self){

      console.log("hello "+value);
});



//   $(".btnrating").on('click',(function(e) {
  
//   var previous_value = $("#selected_rating").val();
  
//   var selected_value = $(this).attr("data-attr");
//   $("#selected_rating").val(selected_value);
  
//   $(".selected-rating").empty();
//   $(".selected-rating").html(selected_value);
  
//   for (i = 1; i <= selected_value; ++i) {
//   $("#rating-star-"+i).toggleClass('btn-warning');
//   $("#rating-star-"+i).toggleClass('btn-default');
//   }
  
//   for (ix = 1; ix <= previous_value; ++ix) {
//   $("#rating-star-"+ix).toggleClass('btn-warning');
//   $("#rating-star-"+ix).toggleClass('btn-default');
//   }
  
//   }));
  
//  $(document).ready(function(){
//   $(".btn").click(function(){
//     var name = $(this).attr("name");
//     alert(name);
//   });
// });   
});
















