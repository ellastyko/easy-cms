import './bootstrap';
import Container from "./foundation/services/container";

// Components
import views from "./views";

// PrimeVue
import PrimeVue from 'primevue/config';
import primeVueComponents from "./components/primevue";

const app = new Container()
    .use(PrimeVue)
    .components({
        ...views,
        ...primeVueComponents
    })
    .mount();
