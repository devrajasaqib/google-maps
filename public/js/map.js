let map;
function initMap() {
    const myLatlng = { lat: 52.48455820688032, lng: -1.892727804532411 };
    map = new google.maps.Map(document.getElementById("map"), {
      zoom: 8,
      center: myLatlng,
    });
    
    map.addListener('click', async function(event) {
        const isEnabled = document.getElementById('enable-btn').checked;
        if(isEnabled) {
            addMarker(event.latLng);
            saveMarker(event.latLng);
        }
    });
    fetchMarkers();
}

// Add a marker function
async function addMarker(location) {
    new google.maps.Marker({
        position: location,
        map: map
    });
}

function saveMarker(location) {
    axios.post('/api/markers', {
        latitude: location.lat(),
        longitude: location.lng()
    })
    .then(response => {
        console.log(response.data.message);
    })
    .catch(error => {
        console.error('There was an error saving the marker!', error);
    });
}

// Fetch markers function
function fetchMarkers() {
    axios.get('/api/markers')
    .then(response => {
        response.data.forEach(markerData => {
            var location = new google.maps.LatLng(markerData.latitude, markerData.longitude);
            addMarker(location);
        });
    })
    .catch(error => {
        console.error('There was an error fetching the markers!', error);
    });
}

  window.initMap = initMap;