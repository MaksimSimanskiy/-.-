<html>
<head>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <meta charset="utf-8">
          <meta name="description" content="Работа курьером на авто или пешком, также подключаем водителей такси, свободный график,мгновенные выплаты, подработка или работа на каждый день - решать тебе!" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Анкета заполнена</title>
  <link rel="stylesheet" href="modal.css">
  <link rel="stylesheet" type="text/css" href="style.css">
  <script src="modal.js"></script>
</head>

<body class="enbody" link="red" alink = "black">
    <div class="preloader">
  <div class="preloader__row">
    <div class="preloader__item"></div>
    <div class="preloader__item"></div>
  </div>
</div>
<div class = "wrap">
<div class="endform">
    <div class="endlogo"><a href="https://yandexform.ru"><img src="logo.svg" height="80px" width="80px"></a></div>
      <div class="endtitle">Для начала работы изучите инструкцию - <a id = "ins" href = "ins/ИнструкцияБогатей.pdf">Инструкция</a></div>
    </u><div class="endsubtitle"></div>
  </div>
  <button id="show-modal" class="endbtn">Вопросы и ответы</button>
</div>
<script>
  window.onload = function () {
    document.body.classList.add('loaded_hiding');
    window.setTimeout(function () {
      document.body.classList.add('loaded');
      document.body.classList.remove('loaded_hiding');
    }, 500);
  }
</script>    
<script>
  // создаём модальное окно
  var modal = $modal({
    title: 'Вопросы и ответы:',
content: "<b><p>Что делать дальше?</p></b><p>Изучите инструкцию, там подробно указны шаги для начала работы</p><b>"+
  "<p>Инструкция не скачивается</p></b><p>Сотрудники продублируют её в WhatsApp</p>"+
  "<b><p>Можно еще раз заполнить форму?</p></b><p>Не заполняйте форму больше одного раза, если вас не попросит сотрудник</p>"+
  "<b><p>Когда я могу начать работать?</p></b><p>Вы можете начать работу после активации аккаунта в приложении. Для этого необходимо скачать инструкцию и подробно с ней ознакомиться.</p>"+
  "<b><p>Я не нашел свой вопрос в списке</p></b><p>Позвоните или напишите в WhatsApp по номеру +7 928 321-11-33</p>",
});
  // при клике по кнопке #show-modal
  document.querySelector('#show-modal').addEventListener('click', function(e) {
    // отобразим модальное окно
    modal.show();
  });
</script>
</body>
</html>
