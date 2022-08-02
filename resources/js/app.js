require('./bootstrap')

import { createApp } from 'vue'
import HelloWorld from './components/App'
import VueGoogleMaps from '@fawmi/vue-google-maps'


const app = createApp({})

app.component('hello-world', HelloWorld)
app.use(VueGoogleMaps, {
    load: {
        key: 'AIzaSyD3KIHgynG4jULm9FEWISLvYiv1cMcfheI',
    },
})

app.mount('#app')