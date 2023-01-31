<template>
    <section>
        <nav-bar/>
        <section class="flex pt-20">
            <landing-sidebar/>
            <div class="flex-1">
                <div class="w-full p-2">
                    <h1>Articles</h1>
                    <div class="flex justify-between pr-5 align-center">
                        <auto-complete v-model="filters.search"/>
                        <dropdown
                            v-model="filters.sortedBy"
                            optionLabel="name"
                            optionValue="value"
                            :options="options"
                            placeholder="Select a City"
                        />
                    </div>
                </div>
                <div class="flex-1 items-center justify-center p-5">
                    <div
                        class=""
                        v-for="article in articles" :key="article.id"
                    >
                        <h1 class="mb-1 font-bold text-3xl flex gap-1 items-baseline font-mono">{{ article.title }}
                            <span class="text-sm text-purple-700">{{ article.author.name }}</span>
                        </h1>
                        <div class="grid max-w-3xl gap-2 py-10 px-8 sm:grid-cols-2 bg-white rounded-md border-t-4 border-purple-400">
                            <p class="text-gray-700 text-base">{{ article.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </section>
</template>

<script>
    import NavBar from "../components/NavBar.vue";
    import LandingSidebar from "../components/LandingSidebar.vue";

    export default {
        name: 'LandingPage',
        components: { NavBar, LandingSidebar },
        mounted() {
            this.getArticles()
        },
        watch: {
            filters: {
                handler() {
                    if (!this.filters.sortedBy) {
                        return;
                    }

                    this.getArticles()
                },
                deep: true
            }
        },
        data() {
            return {
                options: [
                    { name: 'Latest', value: 'desc' },
                    { name: 'Oldest', value: 'asc' }
                ],
                articles: [],
                filters: {
                    search: '',
                    orderBy: 'created_at',
                    sortedBy: 'asc'
                },
            }
        },
        methods: {
            async getArticles () {
                const response = await axios.get('/api/articles', { params: this.filters })
                this.articles = response.data.articles
            }
        }
    }
</script>
