<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" href="logo.svg" type="image/x-icon">
  <meta charset="utf-8">
  <meta name="Description" content="Форма регистрации для курьеров и водителей такси"/>
        <meta name="author" content="company" />

        <meta property="og:site_name" content="Форма регистрации курьеров и водителей такси" /> <!-- website name -->
        <meta property="og:site" content="https://yandexform.ru/reg.php" /> <!-- website link -->
        <meta property="og:title" content="Форма регистрации" /> <!-- title shown in the actual shared post -->
        <meta property="og:description" content="Мы официальный партнер Яндекс.Доставки, подключаем пеших курьеров, автокурьеров и водителей такси.Свободный график и мгновенные выплаты" /> <!-- description shown in the actual shared post -->
        <meta property="og:type" content="form" /> <!-- title shown in the actual shared post -->
        <meta property="og:image" content="images/details-4.png" /> <!-- image link, make sure it's jpg -->
        <meta property="og:url" content="https://yandexform.ru/reg.php" /> <!-- where do you want your post to link to -->
        <meta name="twitter:card" content="images/header-smartphone.png" /> <!-- to have large image post format in Twitter -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Форма регистрации</title>
    <link rel="stylesheet" type="text/css" href="css/modal.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">

    <script src="https://yastatic.net/jquery/3.3.1/jquery.min.js"></script>
    <script src="jquery.min.js"></script>
    <script src="jquery.maskedinput.min.js"></script>
    <script src="modal.js"></script>
   

</head>

 <script type="text/javascript">
        function visual(elem){
             const boxes = document.querySelectorAll(elem);
                boxes.forEach(box => {
                  box.style.display = 'block';
                  box.style.visibility = "visible";
                });
             }
        function not_visual(elem){
             const boxes = document.querySelectorAll(elem);
                boxes.forEach(box => {
                  box.style.display = 'none';
                  box.style.visibility = "hidden";
                });
             }
             function jm(){
                $('[name="feed"]').on('change', function(){     
                     if ($('[name="feed"]').val() == "По рекомендации" ) {
            visual('.ic1');
          }
          else {
              not_visual('.ic1');
          }
            });
                jq();};
        function jq(){

                $('#list').on('change', function(){
        if ($(this).val() == ("Курьером на авто") || ("Водителем такси")) {
           $('#doc').prop('required', true);
    $('#vu_do').prop('required', true);
    $('#data_vu').prop('required', true);
    $('#gos_reg').prop('required', true);
    $('#gos_nom').prop('required', true);
    $('#color_avto').prop('required', true);
        $('#mode').prop('required', true);
    $('#marka').prop('required', true);
    $('#god_vip').prop('required', true);
    $('#sts').prop('required', true);
    $('#vin').prop('required', true);
            $('#ves').prop('required', false);
    $('#dlina').prop('required', false);
    $('#shirina').prop('required', false);
    $('#visota').prop('required', false);
            visual('.ic3');
            visual('.ic4');
            }
        if ($(this).val() == "Пешим курьером" ) {
            $('#doc').prop('required', false);
    $('#vu_do').prop('required', false);
    $('#data_vu').prop('required', false);
    $('#gos_reg').prop('required', false);
    $('#gos_nom').prop('required', false);
    $('#color_avto').prop('required', false);
        $('#mode').prop('required', false);
    $('#marka').prop('required', false);
    $('#god_vip').prop('required', false);
    $('#sts').prop('required', false);
    $('#vin').prop('required', false);
            $('#ves').prop('required', false);
    $('#dlina').prop('required', false);
    $('#shirina').prop('required', false);
    $('#visota').prop('required', false);
            not_visual('.ic3');
            not_visual('.ic4');
            not_visual('.ic5');
          }
        if ($(this).val() == "Курьером на велосипеде/самокате" ) {
            $('#doc').prop('required', false);
    $('#vu_do').prop('required', false);
    $('#data_vu').prop('required', false);
    $('#gos_reg').prop('required', false);
    $('#gos_nom').prop('required', false);
    $('#color_avto').prop('required', false);
            $('#mode').prop('required', false);
    $('#marka').prop('required', false);
    $('#god_vip').prop('required', false);
    $('#sts').prop('required', false);
    $('#vin').prop('required', false);
            $('#ves').prop('required', false);
    $('#dlina').prop('required', false);
    $('#shirina').prop('required', false);
    $('#visota').prop('required', false);
            not_visual('.ic3');
            not_visual('.ic4');
            not_visual('.ic5');
          }
        if ($(this).val() == "Курьером на грузовом авто") {
            $('#doc').prop('required', true);
    $('#vu_do').prop('required', true);
    $('#data_vu').prop('required', true);
    $('#gos_reg').prop('required', true);
    $('#gos_nom').prop('required', true);
    $('#color_avto').prop('required', true);
    $('#mode').prop('required', true);
    $('#marka').prop('required', true);
    $('#god_vip').prop('required', true);
    $('#sts').prop('required', true);
    $('#vin').prop('required', true);
    $('#ves').prop('required', true);
    $('#dlina').prop('required', true);
    $('#shirina').prop('required', true);
    $('#visota').prop('required', true);

            visual('.ic3');
            visual('.ic4');
            visual('.ic5');
          }
        if ($(this).val() == "Мотокурьером(мотоцикл/скутер)") {
                $('#doc').prop('required', true);
                $('#vu_do').prop('required', true);
                $('#data_vu').prop('required', true);
                $('#gos_reg').prop('required', false);
                $('#gos_nom').prop('required', false);
                $('#color_avto').prop('required', false);
                        $('#mode').prop('required', false);
    $('#marka').prop('required', false);
    $('#god_vip').prop('required', false);
    $('#sts').prop('required', false);
    $('#vin').prop('required', false);
        $('#ves').prop('required', false);
    $('#dlina').prop('required', false);
    $('#shirina').prop('required', false);
    $('#visota').prop('required', false);
            $('#m1').html("Обязательное поле");
            $('#m2').html("Обязательное поле");
            $('#m3').html("Обязательное поле");
            visual('.ic3');
             not_visual('.ic4');
            not_visual('.ic5');
          }
            });
            var form = document.getElementById('formID'); // form has to have ID: <form id="formID">
            form.noValidate = true;
            form.addEventListener('submit', function(event) { // listen for form submitting
            if (!event.form.checkValidity()) {
            event.preventDefault(); // dismiss the default functionality
            }}, false);   
            
        };
 </script>
<script>
  $(document).ready(function () {
  let arrData = [];
  
  $.getJSON('json/cars.json', function (data) {
      let arr_bird_type = [];
      $.each(data, function (index, value) {
          arr_bird_type.push(index);
          arrData = data;
      });
      arr_bird_type = Array.from(new Set (arr_bird_type));
      $.each(arr_bird_type, function (index, value) {
          
          $('#mode').append('<option value="' + value + '">' + value + '</option>');
      });        
  });
  $('#mode').change(function () {
      let type = this.options[this.selectedIndex].index;
      console.log(type);
      let filterData = Object.values(arrData).filter(function(index,value) {
          return value == type -1;
      });
      console.log(filterData);
      $('#marka')
          .empty()
          .append('<option value="">Выберите модель авто</option>')
          .prop('disabled', false);
      $.each(filterData, function (index, value) {
          $.each(value, function (index, value) {
          $('#marka').append('<option value="' + value + '">' + value + '</option>');
      });
      });
  });
  
});
$(document).ready(function(){
	$('form').submit(function(){
		$(this).find('input[type=submit], button[type=submit]').prop('disabled', true);
	});
});
</script>
<script>
 $(document).ready(function () {
     
// Загрузка данных из JSON файла
$.getJSON('json/walk.json', function(data) {
  var cities = data;

  // Функция для заполнения datalist городами
  function fillCityList() {
    $('#listcity').empty();
    $.each(cities["Пешим курьером"], function(index, city) {
       
      $('#listcity').append('<option value="' + city.город + '">' + city.город + '</option>');
     
    });
  };
  $("#ins").hover(function(){
        
        $("#down").css("font-weight", "550");
        $("#down").css("color", "#000000");
  });
  $("#listcity").change(function(){
    var selectedCity = $(this).children("option:selected").val();
    var selectedAge = "";
    var selectedOption = $('#list').val();
     $("#down").css("font-weight", "450");
    $("#down").css("color", "#908d8d");
    if (selectedOption === 'Пешим курьером' || selectedOption === 'Курьером на велосипеде/самокате') {
    // Находим соответствующий городу возраст в JSON
    $.each(cities["Пешим курьером"], function(index, value){
      if(value.город == selectedCity){
        selectedAge = value.возраст;
        return false; // Выходим из цикла после нахождения соответствия
      }
   
    });
    // Изменяем текст элемента label с id=age
    $("#age").text(selectedAge);
        $("#age").css("font-weight", "550");
        $("#age").css("color", "#000000");
  }
  });
  // При изменении выбранного пункта в списке
  $('#list').change(function() {
   
    var selectedOption = $(this).val();
    fillCityList();
 $('#city').prop('disabled', false);
 $('#listcity').prop('disabled', false);
  $('#ins').prop('disabled', false);
  $('#ins').text('Инструкция для работы');
 if (selectedOption === 'Водителем такси') {
      $('#ins').attr('onclick', "window.open('https://yandexform.ru/ins/ИнструкцияТакси.pdf','_blank')");
 };
    // Если выбран Пешим курьером или Курьером на велосипеде/самокате
    if (selectedOption === 'Пешим курьером' || selectedOption === 'Курьером на велосипеде/самокате') {
        $('#lictcity').prop('required', true);
      // Заполнить datalist городами
      //$("#city").attr("placeholder", "Выберите город из списка*");
      $('#ins').attr('onclick', "window.open('https://yandexform.ru/ins/ИнструкцияБогатей.pdf','_blank')");
    // $('#city').val('');
      ///$('#listcity').val('');
      // Заблокировать возможность вписывания своего города в input
      //$('#city').prop('readonly', true);

   } else {
         $("#city").attr("placeholder", "Впишите/выберите город*");
         $("#city").focus();
      $('#lictcity').prop('required', false);
      // В противном случае разблокировать input
      $('#city').val('');
      $('#listcity').val('');
      $('#city').prop('readonly', false);
             $("#age").text("Вам должно быть более 18 лет*");
        $("#age").css("font-weight", "500");
        $("#age").css("color", "#908d8d");
    }
  });
});
});

</script>
<script>
function limitInput( k, obj ) {
    switch( k ){
        case 'ru':
            obj.value = obj.value.replace(/[^а-яА-ЯёЁ-]/ig,'');
        break;
        case 'en':
            obj.value = obj.value.replace(/[^a-zA-Z0-9 -]/ig,'');       
        break;
    }
}
</script>
<script>
function CheckSpace(event)
{
   if(event.which ==32)
   {
      event.preventDefault();
      return false;
   }
}
   window.addEventListener("pageshow", () => {
    var form = $('form'); 
    // let the browser natively reset defaults
    form[0].reset();
});
</script>

<body onload="jm()">
<div class="form">
    
     <div class="title"><a href="https://yandexform.ru"><div class="logo"><img src="logo.svg" height="80px" width="80px"></a>
      </div><div class="forma">Форма регистрации</div></div>
      <div class="cut-short"></div>
      <button type='button' id="show-modal" class="btn">Помощь</button>
      <button type='button' id="ins"  onclick="window.open('https://yandexform.ru/ins/ИнструкцияБогатей.pdf','_blank')" class="btn" disabled title="Сначала выберите тип работы" >Инструкция</button>
      <form action="amo/amo.php"id=fordID method="post" accept-charset="UTF-8">
     <div class="input-container ic2">
        <input id="fame" onkeyup="limitInput( 'ru', this );" onkeypress="CheckSpace(event)" class="input" name="fame" type="text" placeholder=" " required />
        <label for="fame" class="placeholder">Фамилия*</label>
        <label for="fame" class="prompt">Пример: Иванов </label>
      </div>
      <div class="input-container ic2">
        <input id="name" onkeyup="limitInput( 'ru', this );" onkeypress="CheckSpace(event)" class="input" name="name" type="text" placeholder=" " required />
        <label for="name" class="placeholder">Имя*</label>
        <label for="name" class="prompt">Пример: Иван </label>
      </div>
      <div class="input-container ic2">
        <input id="otc" onkeyup="limitInput( 'ru', this );" onkeypress="CheckSpace(event)" class="input" name="otc" type="text" placeholder=" " />
        <label for="otc" class="placeholder">Отчество</label>
        <label for="otc" class="prompt">Необязательное поле </label>
      </div>
            <div class="input-container ic2">
        <select id="list" name="working" class="input" required >
            <option value = "" disabled selected="selected" placeholder = " ">Выберите тип работы*</option>
            <option  >Курьером на авто</option>
            <option  >Водителем такси</option>
            <option  >Мотокурьером(мотоцикл/скутер)</option>
          <!-- <option  >Пешим курьером</option>
             <option  >Курьером на велосипеде/самокате</option> -->
            <option  >Курьером на грузовом авто</option>
        </select>
        <label for="list" class="prompt" id="down"  >После выбора вы сможете скачать инструкцию</label>
        
      </div>
     <div class="input-container ic2">
         <div class="edit">
      
          <select  onkeyup="limitInput( 'ru', this );" onchange="this.nextElementSibling.value=this.value" id="listcity" disabled type="text" name="listcity" class="input"  >  
          <option  value = "Город" disabled selected="selected" placeholder = " " >Без указания области</option>
    
      </select>
          <input  id = "city" onkeyup="limitInput( 'ru', this );" class="input" name="cityname" type="text" disabled type="text" autocomplete="on" placeholder="Сперва выберите тип работы*" required />
          
         </div>
<label for="cityname" class="prompt">Город работы.Обязательно поле</label>
      </div>
      <div class="input-container ic2">
        <input id="dateb" name="dateb" class="input" type="date" min="1900-01-01"  placeholder="Дата рождения" required/>
        <label id = "age" for="dateb" class="prompt"></label>
      </div>
      <div class="input-container ic2">
        <input id="number" name="number" class="input" type="text" placeholder=" " required/>
        <label for="number"  class="placeholder">Номер телефона для связи*</label>
        <label for="number" class="prompt"  >Обязательное поле</label>
      </div>

      <div class="input-container ic2">
              <select id="list" name="feed" class="input">
            <option value = "Сайт" disabled selected="selected" placeholder = " ">Как вы о нас узнали?</option>
            <option  >Поиск авито</option>
            <option  >По рекомендации</option>
            <option  >Реклама в ВК</option>
            <option  >Реклама в ОК</option>
                                   <option  >Реклама на иных сайтах</option>
            <option  >Поиск Яндекс/Google</option>
            <option  >Соц.сети</option>
            <option  >Тикток</option>
            <option  >Телеграмм</option>
        </select>
        <label for="feed" class="prompt"  >Необязательное поле</label>
        </div>
        <div class="input-container ic1">
        <input id="rec" name="rec" class="input" type="text" placeholder=" "/>
        <label for="rec"  class="placeholder">Кто вам порекомедовал нас(ФИО)?</label>
        <label for="rec" class="prompt"  >Порекомендовавший получит вознаграждение</label>
      </div>
        <div class="input-container ic3">
            <input id="doc" name = "doc" class="input" type="text" placeholder=" " />
            <label for="doc" class="placeholder">Номер водительского удостоверения</label>
            <label for="doc" id = "m1" class="prompt" >Обязательное поле*</label>
        </div>
        <div class="input-container ic3">
            <input id="data_vu" name = "data_vu" class="input" type="date" placeholder="Дата выдачи ВУ " />
            <label for="data_vu" id = "m2" class="prompt">Дата выдачи ВУ*</label>
        </div>
        <div class="input-container ic3">
            <input id="vu_do" name = "vu_do" class="input" type="date" placeholder="ВУ действует до " />
            <label for="vu_do" id = "m3" class="prompt">ВУ действует до*</label>
        </div>
        <div class="input-container ic4">
            <select id="mode" name = "mode" class="input" type="text" placeholder=" " />
            <option value=''>Выберите марку авто</option>
          </select>
            <label for="mode" class="prompt">Обязательное поле*</label>
      </div>
      <div class="input-container ic4">
            <select id="marka" name = "marka" class="input" disabled type="text" placeholder=" " />
            <option value=''>Сначала выберите марку авто</option>
            </select>
            <label for="marka" class="prompt">Обязательное поле*</label>
  </div>
        <div class="input-container ic4">
        <select id="color_avto" class="input" name="color_avto" >
            <option value = "" disabled selected="selected" >Выберите цвет авто</option>
            <option  value="Белый">Белый</option>
            <option  value="Желтый">Желтый</option>
            <option  value="Бежевый">Бежевый</option>
            <option  value="Черный">Черный</option>
            <option  value="Голубой">Голубой</option>
            <option  value="Серый">Серый</option>
            <option  value="Красный">Красный</option>
            <option  value="Оранжевый">Оранжевый</option>
            <option  value="Синий">Синий</option>
            <option  value="Зеленый">Зеленый</option>
            <option  value="Коричневый">Коричневый</option>
            <option  value="Фиолетовый">Фиолетовый</option>
            <option  value="Розовый">Розовый</option>
        </select>
        <label for="color_avto" class="prompt">Обязательное поле*</label>  
      </div>
            <div class="input-container ic4">
            <input id="god_vip" name = "god_vip" class="input" min="1970" type="number" placeholder=" " />
            <label for="god_vip" class="placeholder">Год выпуска автомобиля*</label>
            <label for="god_vip" class="prompt">например: 2012</label>
      </div>
                <div class="input-container ic4">
            <input id="gos_nom" name = "gos_nom" class="input" type="text" placeholder=" " />
            <input id="gos_reg" name = "gos_reg" class="input" type="number" placeholder="Регион" />
            <label for="gos_nom" class="placeholder">Гос.номер авто*</label>
            <label for="gos_nom" class="prompt">пример: К826РО,впишите регион справа</label>
         
      </div>
         <div class="input-container ic4">
            <input id="vin" name = "vin" class="input" type="text" placeholder=" " />
            <label for="vin" class="placeholder">VIN номер*</label>
            <label for="vin" class="prompt">например: XTA219020N0835452</label>
      </div>
             <div class="input-container ic4">
            <input id="sts" name ="sts" class="input" type="text" placeholder=" " />
            <label for="sts" class="placeholder">Номер СТС*</label>
            <label for="sts" class="prompt">например: 9928 382114</label>
      </div>
                 <div class="input-container ic5">
            <input id="dlina" name = "dlina" class="input"  type="number" placeholder=" " />
            <label for="dlina" class="placeholder">Длина грузового отсека*</label>
            <label for="dlina" class="prompt">например(в сантиметрах): 170</label>
      </div>
                <div class="input-container ic5">
            <input id="shirina" name = "shirina" class="input"  type="number" placeholder=" " />
            <label for="shirina" class="placeholder">Ширина грузового отсека*</label>
            <label for="shirina" class="prompt">например(в сантиметрах): 100 </label>
      </div>
    <div class="input-container ic5">
            <input id="visota" name = "visota" class="input"  type="number" placeholder=" " />
            <label for="visota" class="placeholder">Высота грузового отсека*</label>
            <label for="visota" class="prompt">например(в сантиметрах): 90</label>
      </div>
        <div class="input-container ic5">
            <input id="ves" name = "ves" class="input"  type="number" placeholder=" " />
            <label for="ves" class="placeholder">Грузоподъемность*</label>
            <label for="ves" class="prompt">например(в килограммах): 300 </label>
      </div>
      <div class="input-container ic2">
            <input type="checkbox" id="scales" class = "scales" name="scales" >
      <noindex><label for="scales" class="check" >Я даю своё согласие на обработку персональных данных для регистрации в сервисе Яндекс.Доставка/Такси</label><noindex>
      </div>
      <input hidden  name ="refer" value="<?php echo $_SERVER['HTTP_REFERER'] ?>" id='reerrer'  >
      <noindex><button type="submit"  class="submit">Отправить</button><noindex>
      </form>
    </div>
    <script>
    var blackList = ['область', 'край','Область', 'Край'];
    document.getElementById("city").onkeyup = function() {
	var expr = new RegExp(blackList.join('|'));
	if (this.value.search(expr) !== -1) {
	this.value = 'Только город!';
    };
};
</script>
 <script>
  // получаем элемент input
  var input = document.getElementById('dateb');

  // вычисляем текущую дату
  var today = new Date();

  // вычитаем 16 лет из текущей даты
  var maxDate = new Date(today.getFullYear() - 18, today.getMonth(), today.getDate());

  // преобразуем дату в строку в формате, который ожидает атрибут max
  var maxDateStr = maxDate.toISOString().slice(0, 10);

  // устанавливаем максимальное значение для атрибута max
  input.setAttribute('max', maxDateStr);
    // получаем элемент label
  var label = document.getElementById('age');

  // устанавливаем текстовое содержимое элемента label
  label.textContent += ' Минимальная дата рождения ' + maxDateStr;
  $(document).ready(function(){
    var currentYear = new Date().getFullYear();
    $('#god_vip').attr('max', currentYear);
});

 </script>
     <script>
      $(document).ready(function($){
        $.mask.definitions['h'] = "[9]"
      $("#number").mask("+7h999999999");
      $.mask.definitions['K'] = "[WERTYUPASDFGHJKLZXCVBNMwertyupasdfghjklzxcvbnm1234567890]";
      $('#vin').mask('KKKKKKKKKKKKKKKKK');
      $('#doc').mask('99 ** 999999');
      $.mask.definitions['Z'] = "[АВЕКМНОРСТУХавекмнорстух]";
      
      $('#gos_nom').mask('Z999ZZ');
      $('#sts').mask('99 99 999999');
      });
    </script>
    <script>
      // создаём модальное окно
      var modal = $modal({
        title: 'Как заполнять форму:',
  content: '<ul><li>Заполните форму один раз, повторно заполнять можно лишь по просьбе сотрудника<li>Вводите данные на русском языке<li>Данные должны быть актуальными<li>Выбирайте город из выпадающего списка, если его нет введите свой<li>При выборе типа работы Пеший курьер город вписать нельзя, выберите из списка<li>После заполнения формы ознакомьтесь с инструкцией для работы<li>Если у вас есть проблемы с заполнением свяжитесь с нами по номеру 8(800)222-90-03</ul>',
});
      // при клике по кнопке #show-modal
      document.querySelector('#show-modal').addEventListener('click', function(e) {
        // отобразим модальное окно
        modal.show();
      });
    </script>
</body>
</html>
