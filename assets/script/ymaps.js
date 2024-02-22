ymaps.ready(function () {
    const map = new ymaps.Map('map', {
        center: [55.037736, 82.978662],
        zoom: 15,
        controls: ['routePanelControl', 'zoomControl'],
    }, {
        yandexMapDisablePoiInteractivity: false
    });
})