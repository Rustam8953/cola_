ymaps.ready(function() {

    const map = new ymaps.Map('map', {
        center: [54.951798, 83.204180],
        zoom: 15,
        controls: ['routePanelControl']
    }, {
        yandexMapDisablePoiInteractivity: false
    });

    const placemark = new ymaps.Placemark(map.getCenter(), {
        balloonContentBody: `<div class="map-info">
            <div class="map-head" onclick="window.location.href='#'">
                <p>ВКУСНО!</p>
            </div>
            <div class="map-links">
                <a href="tel:">+7(913)006-00-37</a>
                <a href="mailto:">wkusno_wf@mail.ru</a>
            </div>
            <div class="map-subtitle">Продажа напитков</div>
        </div>`,
    },{
        iconLayout: 'default#image',
        iconImageHref: "/assets/img/logo/logo-ball.svg",
        iconImageSize: [30, 44],
        iconImageOffset: [-15, -22]
    });

    map.geoObjects.add(placemark);

    placemark.balloon.open();

    const trafficControl = new ymaps.control.TrafficControl({ state: {
        providerKey: 'traffic#actual',
        trafficShown: false
    }});

    map.controls.add(trafficControl);

    trafficControl.getProvider('traffic#actual').state.set('infoLayerShown', true);

})