<template>
    <section>
        <nav-bar/>
        <section class="flex items-center justify-center pt-20">
            <div class="mx-auto w-full max-w-[550px]">
                <h1>Create your first article</h1>
                <form @submit.prevent="createArticle">
                    <div class="mb-5">
                        <label
                            for="title"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                           Title
                        </label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            v-model="form.title"
                            placeholder="Enter title of article"
                            class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        />
                    </div>
                    <div class="mb-5">
                        <label
                            for="content"
                            class="mb-3 block text-base font-medium text-[#07074D]"
                        >
                            Content
                        </label>
                        <textarea
                            v-model="form.content"
                            rows="7"
                            name="content"
                            id="content"
                            placeholder="Type text for article"
                            class="w-full resize-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"
                        ></textarea>
                    </div>
                    <div>
                        <button
                            class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-base font-semibold text-white outline-none"
                        >
                            Submit
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </section>
</template>

<script>
    import NavBar from "../components/NavBar.vue";

    export default {
        name: 'CreatePage',
        components: { NavBar },
        data() {
            return {
                form: {
                    title: '',
                    content: '',
                },
            }
        },
        methods: {
            async createArticle () {
                const response = await axios.post('/api/articles', this.form)
                console.log()
            }
        }
    }
</script>
