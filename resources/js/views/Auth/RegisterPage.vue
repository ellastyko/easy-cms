<template>
    <section>
        <nav-bar/>
        <section class="flex items-center justify-center pt-20">
            <Form
                @submitted="register"
                name
                password-confirmation
            />
        </section>
    </section>
</template>

<script>
import NavBar from "../../components/NavBar.vue";
import Form from "../../components/Form.vue";
import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export default {
    name: "RegisterPage",
    components: { NavBar, Form },
    data() {
        return {
            options: {
                autoClose: 2000,
                position: toast.POSITION.TOP_RIGHT,
                pauseOnHover: true,
            },
        }
    },
    methods: {
        register(form) {
            axios
                .post('/register', form)
                .then(response => window.location.href = '/admin')
                .catch(error => toast.error(error.response.data.message, this.options))
        }
    }
}
</script>
