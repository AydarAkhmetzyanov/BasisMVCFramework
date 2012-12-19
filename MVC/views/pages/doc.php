 <header class="jumbotron subhead" id="overview">
  <h1>Документация Basis MVC Framework</h1>
  <p class="lead"></p>
  <div class="subnav">
    <ul class="nav nav-pills">
      <li class="active"><a href="#MVC">MVC</a></li>
      <li><a href="#folders">Структура каталогов</a></li>
	  <li><a href="#constants">Константы и стандартные функции</a></li>
      <li><a href="#dbs">Базы данных</a></li>
	  <li><a href="#libs">Библиотеки</a></li>
    </ul>
  </div>
</header>
<section id="MVC">
  <div class="page-header">
    <h2>MVC <small>Концепция работы Basis Framework</small></h2>
  </div>

  
<div class="row"><h2>MVC приложение разделено на 3 логические части</h2>
    <div class="span7">
	
      <h3>Model - Модель </h3>
      <p>Предоставляет данные, а так же методы для работы с данными. Не содержит методы представления информации.</p>
      <h3>View - Представление </h3>
      <p>Отвечает за отображение информации пользователю. Реализует шаблоны для отображения данных, не может содержать бизнес-логики.</p>
	  <h3>Controller - Контроллер </h3>
      <p>Обеспечивает связь между пользователем и системой: контролирует ввод данных пользователем и использует модель и представление для реализации необходимой реакции. Пример: Определяет что пользователь запросил личные сообщения, запрашивает у модели массив сообщений на основе запроса и передает представлению данные.</p>
    </div>
    <div class="span5">
      <img src="http://www.zend-frameworks.com/images/public/mvc.png" />
    </div>
  </div>
  <h2>Реализация MVC в Basis Framework</h2><br />
  <div class="row">
    <div class="span4">
      <h3>Модель</h3>
	  <h5>ROOT/MVC/models/posts.php</h5>
	  <pre class="prettyprint linenums">
&lt;?php
class Posts extends Model
{	
 public static function getPosts(){
  global $creatives_siteDB;
  $STH = $creatives_siteDB->
  query('SELECT name, posts from demo');  
  $STH->setFetchMode(PDO::FETCH_ASSOC);
  return $STH;
 }
}</pre>
      <p>Модель создается для отдельного логического класса. Методы класса являются статичными. Для доступа к модели из контроллера можно вызывать его статичный метод: <code>Posts::getPosts();</code>. </p><p>При этом нет необходимости включать файл модели через include, модель будет автозагружена с использованием встроенного автзагрузчика SPL из папки models.</p>
    </div>
    <div class="span4">
      <h3>Представление</h3>
	  <h5>ROOT/MVC/views/posts.php</h5>
	  <pre class="prettyprint linenums">
&lt;h2&gt;&lt;?=title?&gt;&lt;/h2&gt;
&lt;?php
while($row = $posts->fetch()) {
echo $row['posts'] . '&lt;br /&gt;';
}
?&gt;</pre>
      <p>Представление является php файлом который принимает массив данных и отображает их. </p><p>Для рендеринга представления необходимо вызвать функцию: <code>renderView('page', $data);</code> При этом $data это массив данных который будет отображать представление, в пример кода выше представление выводит <code>$data['posts']</code>. </p><p>Страницу можно собрать из нескольких представлений, при этом используя их повторно на разных страницах.</p>
    <pre class="prettyprint linenums">
renderView('header', $data);
renderView('page', $data);
renderView('footer');</pre>
	</div>
	<div class="span4">
      <div class="span4">
      <h3>Контроллер</h3>
	  <h5>ROOT/MVC/controllers/blog/posts.php</h5>
	  <pre class="prettyprint linenums">
&lt;?php
class PostsController extends Controller {   
 public function show($id=0){
  $data = array();
  $data['title'] = 'Basis Framework';
  $data['posts'] = Posts::getPosts();
  renderView('header', $data);
  renderView('pages/demo', $data);
  renderView('footer');
 }
}
</pre>
      <p>Каждой странице соответствует свой контроллер. </p><p>URL запрос раскладывается следующим образом: <code>site.com/applicationURL/path/to/controller/action/1var/2var</code>. В результате данного запроса загрузится файл: 
	  <code>ROOT/MVC/controllers/path/to/controller.php</code>, в котором вызовется метод с параметрами: <code>public function action($first, $second = 'default')</code>. В случае отсутствия второго параметра, будет задано значение по умолчанию. </p><p>Контроллер должен называется именем файла, без приставки php, с заглавной буквы и добавлением слова Controller: <code>class IndexController extends Controller</code>. При отсутствие имени метода в запросе, загружается метод index(). Если не задан контроллер загружается стандартный, задаваемый в <code>config/main.php</code></p>
	</div>
    </div>
  </div>
  
</section>
<section id="folders">
  <div class="page-header">
    <h2>Структура каталогов <small>Basis задает структуру расположения элементов приложения</small></h2>
  </div>

<div class="row">
    <pre>
	<strong>config/</strong> > содержит файлы конфигурации фреймворка и библиотек
	<strong>config/db.php</strong> > объекты pdo с настройками соединений к бд
	<strong>config/main.php</strong> > общие настройки приложения
	<strong>core</strong> > файлы ядра Basis Framework
	<strong>core/autoloader.class.php</strong> > класс SPL автозагрузчика
	<strong>core/bootstrap.php</strong> > подгружает файлы фреймворка, описывает и запускает основные функции ядра
	<strong>core/controller.class.php</strong> > Класс расиширяемый контроллерами
	<strong>core/model.class.php</strong> > Класс расиширяемый моделями
	<strong>css/</strong> > Папка для стилей приложения
	<strong>data/</strong> > Папка для хранения файлов с данными
	<strong>img/</strong> > Папка изображений интерфейса
	<strong>js/</strong> > Папка JS скриптов
	<strong>library/</strong> > Папка подключаемых библиотек
	<strong>MVC/</strong> > Папка моделей, контроллеров и представлений
	<strong>MVC/views/</strong>
	<strong>MVC/controllers/</strong>
	<strong>MVC/models/</strong>
	<strong>tmp/</strong> > Временные файлы
	<strong>tmp/upload</strong> > Загружаемые файлы
	<strong>.htaccess</strong> > файл конфигурации веб сервера
	<strong>index.php</strong> > Точка входа, определение системных констант, подгрузка остальных модулей</pre>
</div>
  
  
</section>
<section id="constants">
  <div class="page-header">
    <h2>Константы и стандартные функции <small></small></h2>
  </div>

<div class="row">
    <div class="span12">
	<h2>Константы</h2>
	<table class="table table-striped">
<thead>
    <tr>
      <th>Константа</th>
      <th>Где определена</th>
	  <th>Определение</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><strong>TIMESTART</strong></td>
      <td>index.php</td>
	  <td>Содержит время старта приложения и позволяет подсчитать врмея выполнения скрипта с помощью кода <code>round(timeMeasure()-TIMESTART, 6)</code>.</td>
    </tr>
	<tr>
      <td><strong>APPDIR, APPURLDIR</strong></td>
      <td>index.php</td>
	  <td>URL к приложению https://site.ru/app/</td>
    </tr>
	<tr>
      <td><strong>DS</strong></td>
      <td>index.php</td>
	  <td>Разделитель директорий "/" или "\"</td>
    </tr>
	<tr>
      <td><strong>ROOT</strong></td>
      <td>index.php</td>
	  <td>Полный физический путь к папке приложения</td>
    </tr>
	<tr>
      <td><strong>CONTROLLER</strong></td>
      <td>bootstrap.php</td>
	  <td>Имя в нижнем регистре текущего контроллера без окончания ".controller". Пример: "index"</td>
    </tr>
  </tbody>
</table>
	<h2>Функции</h2>
<table class="table table-striped">
<thead>
    <tr>
      <th>Функции</th>
      <th>Где определена</th>
	  <th>Определение</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><strong>function renderView<br />($template_name, $_templateData=array())</strong></td>
      <td>core/bootstrap.php</td>
	  <td>Включает на страницу представление. $_templateData принимает массив с параметрами, доступными представлению</td>
    </tr>
	<tr>
      <td><strong>function redirect<br />($target)</strong></td>
      <td>core/bootstrap.php</td>
	  <td>Позволяет перенапривить пользователя на другую страницу. Например: <code>redirect('posts/show');</code></td>
    </tr>
  </tbody>
</table>	
	</div> 
</div>
  
  
</section>
<section id="dbs">
  <div class="page-header">
    <h2>Базы данных <small>Работа с источниками данных</small></h2>
  </div>

<div class="row">
    <div class="span12">
	<p>Фреймворк не навязывает вам методы работы с базой данных, вы можете подключить самостоятельно ActiveRecord или Doctrine. По умолчанию, в файле db.php конфигурции фреймворка включена строка создания DBO объекта и соединения с базой данных. Для доступа к этой переменной из модели вы можете ввести <code>global $db</code>, где db имя объекта PDO созданного в config/db.php.</p>
	<p>Если вы не желаете использовать данный метод соединения, вы можете очистить содержимое db.php и вставить свой код работы с источником данных.</p>
	</div>
</div>
  
  
</section>
<section id="libs">
  <div class="page-header">
    <h2>Библиотеки <small>Описание стандартных библиотек и добавление сторонних</small></h2>
  </div>

<div class="row">
    <div class="span12">
	<p>Все библиотеки находятся в папке library, библиотеки это простые классы, которые автозагружаются при попытке вызова их статичных методов. Бибиотека должна называтся именем своего класса с добавлением .class.php</p>
	<h2>Далее список стандартных Библиотек</h2>
	<h3>HTML</h3><small>Библиотека для упращения работы с представлениями.</small>
	<table class="table table-striped">
<thead>
    <tr>
      <th>Метод</th>
	  <th>Определение</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td><strong>public static function includeJS<br />($fileName)</strong></td>
	  <td>Добавление на страницу скрипта из папки js. Пример метода в представлении: <code>&lt;?= HTML::includeJS('bootstrap.min');?&gt;</code></td>
    </tr>
	 <tr>
      <td><strong>public static function includeCSS<br />($fileName)</strong></td>
	  <td>Добавление на страницу стилей из папки css. Пример метода в представлении: <code>&lt;?= HTML::includeCSS('bootstrap.css');?&gt;</code></td>
    </tr>
  </tbody>
</table>	
	<p></p>
	</div>
</div>
  
  
</section>