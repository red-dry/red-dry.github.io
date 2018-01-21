getLoc()

function hover(right){
  $('.content-search').hover(
    function(){
      $('.close').css('right', right)},
    function(){
      $('.close').css('right', '1px')
  })
}

var inputV = ''

$('.search').click(function(){
  $('input').addClass('input-active')
  $('.close').css('right', '-10px')
  hover('-10px')
  var api = 'https://api.openweathermap.org/data/2.5/weather?'
  var value = $('input').val()
  api += "q=" + value + '&units=metric&APPID=e0f5c0ec0ea41cd0c1af0988eb40b68b'
  inputV = value
  
  getWeather(api)
})

$('.close').click(function(){
  $('input').removeClass('input-active')
  hover('1px')
  $(this).css('right', '1px')
  if(inputV != ''){
    getLoc()
  }
  $('input').val('')
})

function getLoc(){
  if(navigator.geolocation){
  navigator.geolocation.getCurrentPosition(function(position){
      var api = 'https://api.openweathermap.org/data/2.5/weather?'
      var lat = position.coords.latitude
      var lon = position.coords.longitude
          api += "lat=" + lat + "&lon=" + lon + '&units=metric&APPID=e0f5c0ec0ea41cd0c1af0988eb40b68b'

      getWeather(api)
    });
  } 
}

function getWeather(api){
  $.getJSON(api, function(keys){
   var city = keys.name
   var id = keys.weather[0].id
   var weather = keys.weather[0].description
   var temp = (keys.main.temp).toFixed(1)   
   
   if(keys != undefined){
     $('.content-weath').css('transform', 'scale(.65)')
     $('.content-weath').css('opacity', '0')
   }
   setTimeout(function(){composition(city, id, weather, temp)},600)  
  })
}

function composition(city, id, weather, temp){
  var uCity = $('.content-weath-loc p')
  var uTemp = $('.content-weath-temp .temp')
  var uWeather = $('.content-weath-main p')
  var uIcon = $('.icon')
  var uSyst = $('.syst')
  
  uCity.text(city)
  uTemp.text(temp)
  uWeather.text(weather)
  uIcon.html(getPic(id))
  
  uSyst.off('click')
  uSyst.text('c')
  uSyst.on('click', function(){
    var text = $(this).text()
    var far = 0
    far = ((9/5)*temp + 32).toFixed(1)
    if(text === 'c'){
      uSyst.text('f')
      uTemp.text(far)
    }else if(text === 'f'){
      uSyst.text('c')
      uTemp.text(temp)
    }
  })
  
  function getPic(id){
    switch (true){
      case id == 800:
        return '<div class="sun"><div class="rays"></div></div>'
      case id == 801:
        return '<div class="cloud"></div><div class="cloud"></div><div class="sun"><div class="rays"></div></div>'
      case (id >= 300 && id <= 321):
        return '<div class="cloud"><div class="flake"></div><div class="rain"></div>'
      case (id >= 802 && id <= 804):
        return '<div class="cloud"></div><div class="cloud"></div>'  
      case (id >= 502 && id <= 531):
        return '<div class="cloud"></div><div class="rain"></div>'
      case (id >= 500 && id <= 501):
        return '<div class="cloud"></div><div class="sun"><div class="rays"></div></div><div class="rain"></div>'
      case (id >= 200 && id <= 232):
        return '<div class="cloud"></div><div class="lightning"><div class="bolt"></div><div class="bolt"></div></div>'
      case (id >= 600 && id <= 622):
        return '<div class="cloud"></div><div class="snow"><div class="flake"></div><div class="flake"></div></div>'  
    }
  }
  
  $('.content-weath').css('transform', 'scale(1)')
  $('.content-weath').css('opacity', '1')
}