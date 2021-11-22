
window.checkAndAttachMapScript = function (callback) {
    let scriptId = "map-api-script";
    let mapAlreadyAttached = !!document.getElementById(scriptId);
 
    if (mapAlreadyAttached) {
       if (window.google) // Script attached but may not finished loading; so check for 'google' object.
          callback();
    }
    else {
       window.mapApiInitialized = callback;
 
       let script = document.createElement('script');
       script.id = scriptId;
       script.src = 'https://maps.googleapis.com/maps/api/js?key=_YOUR_KEY_HERE_&libraries=places,geometry&callback=mapApiInitialized';
       document.body.appendChild(script);
    }
 
    return mapAlreadyAttached;
 }