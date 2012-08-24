          <div class="nav-collapse">
            <ul class="nav">
			<li><a href="http://creativestripe.com/basis/">Главная</a></li>
              <li class="active"><a href="<?=APPDIR?>demo">Демо</a></li>
              <li><a href="<?=APPDIR?>doc">Документация</a></li>
			  <li class="divider-vertical"></li>
			  <li><a href="<?=APPDIR?>downloads/1.1.zip">Скачать</a></li>
			  <li><a href="https://github.com/aydarcreatiestripe/BasisMVCFramework">GitHub</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
<div class="container-fluid">
      <div class="row-fluid">
        <div class="span12">
          <div class="hero-unit">
            <h1>Hello, world!</h1>
            <p>Это тестовое приложение, представляющее собой пример создания простого приложения на Basis Framework. В дистрибутиве фреймворка это приложение представлено в качестве примера. Вы можете изучить его работу и понять как удобно работает Basis.</p>
            <p>Для работы с бд заполните данные в config/bd.php и создайте таблицу SQL<br /><code>CREATE TABLE demo ( id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, name TEXT , posts TEXT  );</code></p>
          </div>
        </div><!--/span-->
      </div><!--/row-->
	  <div class="row-fluid">
  <div class="span12">
    <div class="row-fluid">
      <div class="span4">
	  <div class="row-fluid">
	      <form id="formPost" onSubmit="sendPost(); return false;" class="form-horizontal">
 <fieldset>
    <legend>Оставьте ваш отзыв</legend>
    <div class="control-group">
      <label class="control-label" for="inputName">Ваше имя</label>
      <div class="controls">
        <input name="inputName" required type="text" class="input-xmedium" id="inputName">
      </div>
    </div>
	<div class="control-group">
            <label class="control-label" for="inputPost">Ваш отзыв</label>
            <div class="controls">
              <textarea name="inputPost" required class="input-xmedium" id="inputPost" rows="3"></textarea>
            </div>
          </div>
  </fieldset>
  <div class="form-actions">
            <button type="submit" class="btn btn-primary">Отправить</button>
          </div>
</form>
<script>
function sendPost(){
$.post("<?=APPDIR?>demo/post", $("#formPost").serialize());
document.getElementById('yourName').innerHTML=document.getElementById('inputName').value;
document.getElementById('yourPost').innerHTML=document.getElementById('inputPost').value;
$("#formPost").hide();
$("#your").fadeIn();
}

$(document).ready(function() {
 $("#your").hide();

});
</script>
		 </div>
		 <div id="your" class="row-fluid">
	      <h2 id="yourName">Оставьте ваш отзыв</h2>
	     <p id="yourPost">отзыв</p>
		 </div>
	      </div>
      <div class="span8">
	  <legend>Отзывы о Basis Framework</legend>
	  <div class="row-fluid">
<?php
$count=0;
while($row = $posts->fetch()) {
    $count++;
	echo '<div class="span4">';
	echo '<h3>'.$row['name'].'</h3>';
	echo '<p>'.$row['posts'].'</p>';
	echo '</div>';	
	if( $count == 3 ){
	echo '</div>';
	echo '<div class="row-fluid">';
	$count = 0; 
	}
}
	  ?>
	  
	  
	  
	  </div>
	  </div>
	</div>
  </div>
</div>