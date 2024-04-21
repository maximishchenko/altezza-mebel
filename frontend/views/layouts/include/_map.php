
<script src="https://api-maps.yandex.ru/2.1/?apikey=<?= Yii::$app->params['mapApiKey']; ?>&lang=ru_RU" type="text/javascript"></script>

<style>
    .map__block {
        width: 100%;
        height: 400px
    }
</style>
<div class="map__block" id="map__block"></div>

<script>

// Single Yandex Map
function initSingleMap(){
  
  
  var officeMap = new ymaps.Map("map__block", {
      center: ["44.1138554","43.0883107"],
      zoom: 9,
      controls: [],
  });
  var myPlacemark = new ymaps.Placemark(["44.1138554","43.0883107"], null, {
	preset: 'islands#redDotIcon'
  });
  officeMap.geoObjects.add(myPlacemark);
  officeMap.behaviors.disable('scrollZoom');
  officeMap.behaviors.disable('drag');
}		    
</script>

<script type="text/javascript">
    document.addEventListener("DOMContentLoaded", () => {
        ymaps.ready(initSingleMap);
    });
</script>