mapboxgl.accessToken = 'pk.eyJ1Ijoia2F5by0yNCIsImEiOiJjbG9vYWFuMnQxeWRxMmtwcXl6eDFnYnJ5In0.sFXiFRRhb9wJZFBJWGO6qA';
const map = new mapboxgl.Map({
    container: 'map',
    center:[longitude, latitude],
    zoom:10,
    style: 'mapbox://styles/kayo-24/clood88qv003p01r6f9ht7e56'
});
map.resize();

const marker1 = new mapboxgl.Marker()
.setLngLat([longitude, latitude])
.addTo(map);
