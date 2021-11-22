

window.Vue = require('vue').default;

import axios from 'axios';
import Vue from 'vue';
import * as VueGoogleMaps from 'vue2-google-maps';
Vue.use(VueGoogleMaps,{
   load:{
      key: 'AIzaSyBVrk0FvBvAxcdheOWnPRq6hlITYAl-WKo'
   }
});

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
const app = new Vue({
    el: '#app',
    data(){
       return{
          resturants:[],
          infoWindowOptions:{
            pixelOffset:{
               width:0,
               height:-35
            }
          },
          infoWindowPosition_:{},
         activeResturant:{},
          infoWindowOpened:false,
       }
    },
    created(){
       console.log("here it is..");
       console.log(this.activeResturant);
       axios.get('api/resturant').then((response)=>{
          this.resturants = response.data;
          console.log(this.resturants);
       }).catch((err)=>
          console.error(err)
       );
    },
    computed:{
       mapCenter(){
          if(!this.resturants.length){
             return{
                lat:10,
                lng:10
             }
          }
          return {
             lat:parseFloat(this.resturants[0].latitude),
             lng:parseFloat(this.resturants[0].longitude)
          }
       }
    },
    methods:{
      getPosition(r){
         return{
            lat:parseFloat(r.latitude),
            lng:parseFloat(r.longitude)
         }
       },
       infoWindowPosition(){
        
         return {
            lat: parseFloat(this.activeResturant.latitude),
            lng: parseFloat(this.activeResturant.longitude),
         }
       },
       handleMarkerClicked(r){
          this.activeResturant = r;
          console.log("see the next");
          console.log(this.activeResturant);
          console.log(parseFloat(this.activeResturant.latitude));
          this.infoWindowOpened = true;
       },
       handleInfoWindowClose(){
          this.activeResturant = {};
          this.infoWindowOpened = false;
       },
       handleCreateNewResturant(e){
          
          this.resturants.push({
             name:"placeholder",
             hours:"00:00:00",
             city:"city",
             state:"state",
             latitude:e.latLng.lat(),
             longitude:e.latLng.lng(),
            
          });
          console.log("current lat => " +e.latLng.lat()+ " lng => "+e.latLng.lng());
       }
    }
    
   
});
