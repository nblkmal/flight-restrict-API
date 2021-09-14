<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Add live realtime data</title>
<meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
<link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
<script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>
<style>
body { margin: 0; padding: 0; }
#map { position: absolute; top: 0; bottom: 0; width: 100%; }
#map-container { position: relative; height: 100%; width: 100%}
</style>
</head>
<body>
    <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.min.js"></script>
    <link rel="stylesheet" href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.2/mapbox-gl-geocoder.css" type="text/css">

    <style>
        .geocoder {
            position: absolute;
            z-index: 1;
            width: 50%;
            left: 50%;
            margin-left: -25%;
            /* top: 20px; */
            bottom: 30px;
        }
        .mapboxgl-ctrl-geocoder {
            min-width: 100%;
        }
        /* #map {
            margin-top: 75px;
        } */

        .rounded {
            border-radius: 15px !important;
        }
    </style>
    <div id="geocoder" class="geocoder"></div>
    <div class="map-container rounded">
        <div id="map" class="rounded"></div>
    </div>


<script>
	mapboxgl.accessToken = 'pk.eyJ1IjoibmJsa21hbCIsImEiOiJja21tMjQ4MGowdTY2MzFwbDFhbzcwOWxuIn0.12e7bTXKOzDN7_5dmbjeiQ';
    const map = new mapboxgl.Map({
        container: 'map',
        style: 'mapbox://styles/mapbox/streets-v11',
        zoom: 0
    });

    // Add the control to the map.
    const geocoder = new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl
    });

    document.getElementById('geocoder').appendChild(geocoder.onAdd(map));

    map.on('load', async () => {
        // Get the initial location of the International Space Station (ISS).
        const geojson = await getLocation();
        // Add the ISS location as a source.
        map.addSource('iss', {
            type: 'geojson',
            data: geojson
        });
        // Add the rocket symbol layer to the map.
        map.addLayer({
            'id': 'iss',
            'type': 'symbol',
            'source': 'iss',
            'layout': {
                // This icon is a part of the Mapbox Streets style.
                // To view all images available in a Mapbox style, open
                // the style in Mapbox Studio and click the "Images" tab.
                // To add a new image to the style at runtime see
                // https://docs.mapbox.com/mapbox-gl-js/example/add-image/
                'icon-image': 'rocket-15'
            }
        });

        // Update the source from the API every 2 seconds for single drone
        const updateSource = setInterval(async () => {
            const geojson = await getLocation(updateSource);
            map.getSource('iss').setData(geojson);
        }, 2000);

        async function getLocation(updateSource) {
            // Make a GET request to the API and return the location of the ISS.
            try {
                const response = await fetch(
                    'https://drone.xtvt.live/api/available-drones',
                    {
                        method: 'GET',
                        credentials: 'same-origin',
                        headers: {
                            'Accept': 'application/json',
                            "Authorization": "Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiI5MzBhOGU4Ni05MjI5LTRlZDctYTVjYy05Nzc1Y2VlMmNlNDEiLCJqdGkiOiI0MGIyZTgzZDAzNmZiZGMxZjc0ODE3NWM2NThlODhjYTVkNWM2MDcyN2RlMDgzOGNlM2Y4MGYwYzJiZGU4OWY4MDg5OTI1MDQyMTVlM2RiMyIsImlhdCI6MTYxNjczODc1OC4yOTg0MTksIm5iZiI6MTYxNjczODc1OC4yOTg0MjEsImV4cCI6MTY0ODI3NDc1OC4yOTIyNTEsInN1YiI6IjciLCJzY29wZXMiOltdfQ.zauG84dKccecPwa633DIt29mQhnlxUJYwIsD8y2EOA-PW0Do3OVIaTpGN1AqofW3vhOV_k3wQwVQ9xvHwWA2rADWL7yfc7k0COcfBBjyPiOA28qaiqtgKsCzhOcf3wkbw1HaQXmtKSKZl9eiXK6Ke_j_BYp9XCbJP6Jpr1i62Pc2ZC9q8taFkTQ8Pe_BgqAfLGhLS3lorK4yjnG9K8axMoiq5DMwE3fuSxd9kjSNi-ALMZ98oQEtRYsf6xxMu_0NCp-NDMudCO-KdbhA4RwqFOC5RNmWvfFjpUrxqSd78vvwa3cRdk_kT7HTcZ4DseB8PX34V92WtDEQMifXtxRVT8jAsHdY9ymENMA94dIio1lU1fRibILhqBUMfyZSCWyRx9_b9z0n3vWJOTzd700gj42NkTQ9w6g581h8sRH1-P-19yuH789ZJroFu2KKWmmiiz7vPajoBcW2KCnY3gaUb5l6E8T4sq6mJybxv3yh8Dn5zFk324Z-D_IUkSp8MEMMHU1ZiUKxF8sqXi4e_CVQ9agiLMK3SL-1gEcI8wCa0qitPJ7JSNNC8vUACf04go_J5m0BxUL-PdI5qaPhfAGBBubap5duv4qsDyS9p0s0TaKhWECY29Lh0DgIIv-LkaziQ-kpYXLDu8i_FlWJcpvvI44-7aG4TDGDAMLJmZbhbtw"
                        }
                    },
                );
                var lng;
                var lat;
                var key;
                // var geojson;
                const data = await response.json()
                const keys = Object.keys(data['data'])
                console.log("Total Drone :"+keys.length)

                for (var i = 0; i < keys.length; i++)
                {
                    this["key"+i] = keys[i]
                    this["lat"+i] = data['data'][this["key"+i]][i]['latitude']
                    this["lng"+i] = data['data'][this["key"+i]][i]['longitude']
                    console.log(this["key"+i])

                    var str ="account"+ i+" = undefined";
                    //Declaring and Setting dynamic variable to undefined using eval
                    eval(str);
                    console.log(str)
                }

                // for (var j = 0; j < keys.length; j++)
                // {
                //     console.log(this["geojson"+j])
                    // return this["geojson"+j];
                // }
                
                // Fly the map to the location.
                // map.flyTo({
                //     center: [lng, lat],
                //     speed: 0.5
                // });
                
                // Return the location of the ISS as GeoJSON.
                return {
                        'type': 'FeatureCollection',
                        'features': [
                            {
                                'type': 'Feature',
                                'geometry': {
                                    'type': 'Point',
                                    'coordinates': [this["lng"+i], this["lat"+i]]
                                }
                            }
                        ]
                    };
            } catch (err) {
                // If the updateSource interval is defined, clear the interval to stop updating the source.
                if (updateSource) clearInterval(updateSource);
                throw new Error(err);
            }
        }
    });
</script>

</body>
</html>