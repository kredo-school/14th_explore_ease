mapboxgl.accessToken = 'pk.eyJ1Ijoia2F5by0yNCIsImEiOiJjbG9vYWFuMnQxeWRxMmtwcXl6eDFnYnJ5In0.sFXiFRRhb9wJZFBJWGO6qA';
const map = new mapboxgl.Map({
    container: 'map',
    center:[139.69171, 35.6895],
    zoom:10,
    style: 'mapbox://styles/kayo-24/clood88qv003p01r6f9ht7e56'
});
map.resize();
map.on('click', (data) => 
{
    const coordinates = data.lngLat;

    new mapboxgl.Marker()
        .setLngLat([coordinates.lng, coordinates.lat])
        .addTo(map);
});