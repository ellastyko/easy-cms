import { createApp } from 'vue/dist/vue.esm-bundler.js';

class Container {

    constructor(rootComponent = null) {
        this.app = createApp(rootComponent ? rootComponent : {})
    }

    components(views) {
        Object.entries(views).forEach((element) => {
            this.app.component(element[0], element[1])
        });

        return this;
    }

    use(el) {
        this.app.use(el)

        return this;
    }

    mount(el = '#app') {
        this.app.mount(el)

        return this.app;
    }
}

export default Container;
