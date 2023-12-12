mapboxgl.accessToken = 'pk.eyJ1Ijoia2F5by0yNCIsImEiOiJjbG9vYWFuMnQxeWRxMmtwcXl6eDFnYnJ5In0.sFXiFRRhb9wJZFBJWGO6qA';
const map = new mapboxgl.Map({
    container: 'map',
    center:[139.69171, 35.6895],
    zoom:10,
    style: 'mapbox://styles/kayo-24/clood88qv003p01r6f9ht7e56'
});
const markers = [];

map.on('click', (data) => 
{
    const coordinates = data.lngLat;
    const markerInputLatitude = document.getElementById('marker-input-latitude');
    const markerInputLongitude = document.getElementById('marker-input-longitude');


    if (markers.length > 0)
        markers[0].remove();

    markers[0] = new mapboxgl.Marker()
        .setLngLat([coordinates.lng, coordinates.lat])
        .addTo(map);

    markerInputLatitude.value = coordinates.lat;
    markerInputLongitude.value = coordinates.lng;

});

function initializeMarker()
{
    const latitude = document.getElementById('map').getAttribute('lat');
    const longitude = document.getElementById('map').getAttribute('lng');

    map.on('load', () => 
    {
        const markerInputLatitude = document.getElementById('marker-input-latitude');
        const markerInputLongitude = document.getElementById('marker-input-longitude');
    
    
        if (markers.length > 0)
            markers[0].remove();
    
        markers[0] = new mapboxgl.Marker()
            .setLngLat([longitude, latitude])
            .addTo(map);
    
        markerInputLatitude.value = latitude;
        markerInputLongitude.value = longitude;
        
        map.flyTo({
            center:[longitude, latitude]
        })
    });
    
}

window.initializeMarker = initializeMarker();