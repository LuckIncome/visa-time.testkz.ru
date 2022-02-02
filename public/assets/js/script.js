new Vue({
  el: '#app',
  data() {
    return {
    }
  },
  methods: {
    setlink(event) {
      localStorage.setItem('link', event.target.value)
    },
    getLink() {
      let link = localStorage.getItem('link') 
      window.location.href = link
      localStorage.setItem('link', '/')
    }
  },
  watch: {
  },
  mounted() {
  }
})

let lastScroll = 0;
const defaultOffset = 100;
const header = document.querySelector('.header');

const scrollPosition = () => window.pageYOffset || document.documentElement.scrollTop;
const containHide = () => header.classList.contains('hide');

window.addEventListener('scroll', () => {
  if(scrollPosition() > lastScroll && !containHide() && scrollPosition() > defaultOffset) {
    header.classList.add('hide');
  }
  else if(scrollPosition() < lastScroll && containHide()){
    header.classList.remove('hide');
  }
  lastScroll = scrollPosition();
})

$.mask.definitions['h'] = "[0|1|3|4|5|6|7|9]"
$('[name="phone"]').mask("+7 (h99) 999-99-99");



$('.advantage-slider').slick({
  infinite: true,
  slidesToShow: 5,
  slidesToScroll: 1,
  speed: 500,
  arrows: false,
  autoplay: true,
  autoplaySpeed: 4000,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 4
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 2
      }
    }
  ]
});

$('.services-slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 4000,
  prevArrow: `<div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div>`,
  nextArrow: `<div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div>`,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$('.reviews-slider').slick({
  infinite: true,
  slidesToShow: 1,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 4000,
  prevArrow: `<div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div>`,
  nextArrow: `<div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div>`,
});

$('.blogs-slider').slick({
  infinite: true,
  slidesToShow: 3,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 4000,
  prevArrow: `<div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div>`,
  nextArrow: `<div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div>`,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 767,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

$('.employees-slider').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 1,
  speed: 500,
  autoplay: true,
  autoplaySpeed: 4000,
  prevArrow: `<div class="slider-arrow slider-arrow-left"><i class="bi bi-chevron-left"></i></div>`,
  nextArrow: `<div class="slider-arrow slider-arrow-right"><i class="bi bi-chevron-right"></i></div>`,
  responsive: [
    {
      breakpoint: 1200,
      settings: {
        slidesToShow: 3
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2
      }
    },
    {
      breakpoint: 576,
      settings: {
        slidesToShow: 1
      }
    }
  ]
});

filterSelection("all")
function filterSelection(c) {
  var x, i;
  x = document.getElementsByClassName("filterDiv");
  if (c == "all") c = "";
  for (i = 0; i < x.length; i++) {
    w3RemoveClass(x[i], "show");
    if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
  }
}

function w3AddClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    if (arr1.indexOf(arr2[i]) == -1) {element.className += " " + arr2[i];}
  }
}

function w3RemoveClass(element, name) {
  var i, arr1, arr2;
  arr1 = element.className.split(" ");
  arr2 = name.split(" ");
  for (i = 0; i < arr2.length; i++) {
    while (arr1.indexOf(arr2[i]) > -1) {
      arr1.splice(arr1.indexOf(arr2[i]), 1);     
    }
  }
  element.className = arr1.join(" ");
}


$("#subscribe").submit(function(event) {
  event.preventDefault();
  let form = $(this);
  let action = form.attr("action");
  let type = form.attr("method");
  let fd = new FormData(form[0]);
  let $inputs = form.find("input, select, button, textarea");
  axios.post(action, fd).then(res => {;
      if (res.status === 200) {
          $('#feedbackModal').modal('hide');
          $('#successModal').modal('show');
      }
      $inputs.prop("disabled", false);
      $inputs.val("");
      $inputs.prop("checked",false);
    }).catch((error) => console.log(error.response.data));   
}); 

$("#question").submit(function(event) {
  event.preventDefault();
  let form = $(this);
  let action = form.attr("action");
  let type = form.attr("method");
  let fd = new FormData(form[0]);
  let $inputs = form.find("input, select, button, textarea");
  axios.post(action, fd).then(res => {;
      if (res.status === 200) {
          $('#successModal').modal('show');
      }
      $inputs.prop("disabled", false);
      $inputs.val("");
      $inputs.prop("checked",false);
    }).catch((error) => console.log(error.response.data));   
}); 

$("#feedback").submit(function(event) {
  event.preventDefault();
  let form = $(this);
  let action = form.attr("action");
  let type = form.attr("method");
  let fd = new FormData(form[0]);
  let $inputs = form.find("input, select, button, textarea");
  axios.post(action, fd).then(res => {;
      if (res.status === 200) {
          $('#successModal').modal('show');
      }
      $inputs.prop("disabled", false);
      $inputs.val("");
      $inputs.prop("checked",false);
    }).catch((error) => console.log(error.response.data));   
});
